/**
 * Garten2000+mehr – Seasonal System
 *
 * Responsibilities:
 *  1. Detect current season by date
 *  2. Persist/restore manual season override via localStorage
 *  3. Apply season via html[data-season] attribute
 *  4. Render a non-intrusive season-switcher widget
 *  5. Run canvas-based particle effects per season
 *     (snow / leaves / blossoms / sparkles)
 *
 * Design contract:
 *  - Does NOT modify header, footer, navigation or brand colours.
 *  - Particles are skipped when prefers-reduced-motion is set.
 *  - Particle count is halved on mobile.
 *  - Set window.G2K_SEASONAL_EFFECTS = false to disable effects globally.
 */

'use strict';

/* ============================================================
   CONFIGURATION
   ============================================================ */

const SEASON_STORAGE_KEY = 'g2k_season';

/** Mobile breakpoint (px) – mirrors the CSS breakpoint in seasonal.css */
const MOBILE_BREAKPOINT = 768;
/** Fraction of particles to show on mobile screens */
const MOBILE_PARTICLE_RATIO = 0.45;

/** @type {Record<string, {label:string, icon:string, months:number[]}>} */
const SEASONS = {
  spring: { label: 'Frühling', icon: '🌸', months: [3, 4, 5] },
  summer: { label: 'Sommer',   icon: '☀️', months: [6, 7, 8] },
  autumn: { label: 'Herbst',   icon: '🍂', months: [9, 10, 11] },
  winter: { label: 'Winter',   icon: '❄️', months: [12, 1, 2] },
};

/* ============================================================
   SEASON DETECTION & MANAGEMENT
   ============================================================ */

/**
 * Returns the calendar season for the current date.
 * @returns {'spring'|'summer'|'autumn'|'winter'}
 */
function detectSeasonByDate() {
  const month = new Date().getMonth() + 1; // 1–12
  if (month >= 3 && month <= 5)  return 'spring';
  if (month >= 6 && month <= 8)  return 'summer';
  if (month >= 9 && month <= 11) return 'autumn';
  return 'winter';
}

/**
 * Returns the active season from localStorage or auto-detection.
 * @returns {'spring'|'summer'|'autumn'|'winter'}
 */
function getActiveSeason() {
  try {
    const stored = localStorage.getItem(SEASON_STORAGE_KEY);
    if (stored && SEASONS[stored]) return stored;
  } catch (_) { /* private browsing – ignore */ }
  return detectSeasonByDate();
}

/**
 * Applies a season to the document and optionally persists it.
 * @param {'spring'|'summer'|'autumn'|'winter'} season
 * @param {boolean} [save=true]
 */
function applySeason(season, save) {
  if (typeof save === 'undefined') save = true;
  if (!SEASONS[season]) return;

  document.documentElement.setAttribute('data-season', season);

  if (save) {
    try {
      localStorage.setItem(SEASON_STORAGE_KEY, season);
    } catch (_) { /* ignore */ }
  }

  // Update particles (only if canvas already initialised)
  if (particleState.canvas) {
    scheduleParticleRestart(season);
  }

  // Notify other components
  document.dispatchEvent(
    new CustomEvent('seasonchange', { detail: { season } })
  );
}

/* ============================================================
   SEASON SWITCHER WIDGET
   ============================================================ */

function initSeasonSwitcher() {
  const wrapper = document.createElement('div');
  wrapper.className = 'season-switcher';
  wrapper.setAttribute('role', 'region');
  wrapper.setAttribute('aria-label', 'Saison wechseln');

  const currentSeason = getActiveSeason();

  /* ---- Toggle button ---- */
  const btn = document.createElement('button');
  btn.className = 'season-switcher-btn';
  btn.type = 'button';
  btn.setAttribute('aria-expanded', 'false');
  btn.setAttribute('aria-controls', 'season-switcher-dropdown');
  setToggleLabel(btn, currentSeason);
  wrapper.appendChild(btn);

  /* ---- Dropdown panel ---- */
  const dropdown = document.createElement('div');
  dropdown.className = 'season-switcher-dropdown';
  dropdown.id = 'season-switcher-dropdown';
  dropdown.setAttribute('role', 'menu');

  Object.entries(SEASONS).forEach(function(entry) {
    const key   = entry[0];
    const meta  = entry[1];
    const opt = buildOption(key, meta.label, meta.icon, key === currentSeason);
    dropdown.appendChild(opt);
  });

  const divider = document.createElement('div');
  divider.className = 'season-option-divider';
  dropdown.appendChild(divider);

  const autoOpt = buildOption('auto', 'Automatisch', '🔄', false);
  dropdown.appendChild(autoOpt);

  wrapper.appendChild(dropdown);
  document.body.appendChild(wrapper);

  /* ---- Interactions ---- */
  btn.addEventListener('click', function(e) {
    e.stopPropagation();
    const isOpen = wrapper.classList.contains('is-open');
    wrapper.classList.toggle('is-open', !isOpen);
    btn.setAttribute('aria-expanded', String(!isOpen));
    if (!isOpen) {
      const firstOpt = dropdown.querySelector('.season-option');
      if (firstOpt) { firstOpt.focus(); }
    }
  });

  dropdown.addEventListener('click', function(e) {
    const opt = e.target.closest('[data-season]');
    if (!opt) return;

    const chosen = opt.dataset.season;
    let applied;

    if (chosen === 'auto') {
      try { localStorage.removeItem(SEASON_STORAGE_KEY); } catch (_) {}
      applied = detectSeasonByDate();
      applySeason(applied, false);
    } else {
      applied = chosen;
      applySeason(applied, true);
    }

    setToggleLabel(btn, applied);
    dropdown.querySelectorAll('.season-option').forEach(function(o) {
      o.classList.toggle('is-active', o.dataset.season === applied);
    });

    close();
  });

  document.addEventListener('click', close);

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && wrapper.classList.contains('is-open')) {
      close();
      btn.focus();
    }
  });

  function close() {
    wrapper.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
  }
}

function buildOption(seasonKey, label, icon, active) {
  const opt = document.createElement('button');
  opt.className = 'season-option' + (active ? ' is-active' : '');
  opt.type = 'button';
  opt.dataset.season = seasonKey;
  opt.setAttribute('role', 'menuitem');
  opt.innerHTML =
    '<span aria-hidden="true">' + icon + '</span> ' + label;
  return opt;
}

function setToggleLabel(btn, season) {
  const meta = SEASONS[season];
  if (!meta) return;
  btn.innerHTML =
    '<span aria-hidden="true">' + meta.icon + '</span>' +
    ' ' + meta.label +
    ' <span class="season-switcher-caret" aria-hidden="true">▾</span>';
}

/* ============================================================
   PARTICLE SYSTEM
   ============================================================ */

const EFFECTS_ENABLED = window.G2K_SEASONAL_EFFECTS !== false;
const reducedMotion    = window.matchMedia('(prefers-reduced-motion: reduce)');

/** Shared mutable state for the particle system. */
const particleState = {
  canvas:    null,
  ctx:       null,
  particles: [],
  rafId:     null,
  season:    null,
  restartTimer: null,
};

/* ---- Canvas ---- */

function createParticleCanvas() {
  const canvas = document.createElement('canvas');
  canvas.id = 'seasonal-canvas';
  canvas.setAttribute('aria-hidden', 'true');
  resizeCanvas(canvas);
  window.addEventListener('resize', function() { resizeCanvas(canvas); }, { passive: true });
  document.body.insertBefore(canvas, document.body.firstChild);
  particleState.canvas = canvas;
  particleState.ctx    = canvas.getContext('2d');
}

function resizeCanvas(canvas) {
  canvas.width  = window.innerWidth;
  canvas.height = window.innerHeight;
}

/* ---- Particle count ---- */

const PARTICLE_COUNTS = { spring: 36, summer: 28, autumn: 42, winter: 55 };

function getParticleCount(season) {
  const base = PARTICLE_COUNTS[season] || 30;
  return window.innerWidth <= MOBILE_BREAKPOINT ? Math.ceil(base * MOBILE_PARTICLE_RATIO) : base;
}

/* ---- Particle factories ---- */

function rnd(min, max) { return min + Math.random() * (max - min); }

function makeSnowflake() {
  return {
    type: 'winter',
    x:    rnd(0, window.innerWidth),
    y:    rnd(-window.innerHeight, 0),
    r:    rnd(2, 6),
    vy:   rnd(0.5, 1.8),
    vx:   rnd(-0.4, 0.4),
    op:   rnd(0.35, 0.9),
    wob:  rnd(0, Math.PI * 2),
    wob_s:rnd(0.01, 0.025),
  };
}

function makeLeaf() {
  return {
    type:   'autumn',
    x:      rnd(0, window.innerWidth),
    y:      rnd(-window.innerHeight, 0),
    size:   rnd(8, 18),
    vy:     rnd(0.7, 1.6),
    vx:     rnd(-1, 1),
    rot:    rnd(0, Math.PI * 2),
    rot_s:  rnd(0.02, 0.05),
    op:     rnd(0.45, 0.85),
    hue:    rnd(12, 40),
  };
}

function makeBlossom() {
  return {
    type:  'spring',
    x:     rnd(0, window.innerWidth),
    y:     rnd(-window.innerHeight, 0),
    size:  rnd(4, 9),
    vy:    rnd(0.3, 0.9),
    vx:    rnd(-0.8, 0.8),
    rot:   rnd(0, Math.PI * 2),
    rot_s: rnd(0.012, 0.03),
    op:    rnd(0.35, 0.65),
    wob:   rnd(0, Math.PI * 2),
    wob_s: rnd(0.008, 0.018),
  };
}

function makeSparkle() {
  return {
    type:    'summer',
    x:       rnd(0, window.innerWidth),
    y:       rnd(0, window.innerHeight),
    r:       rnd(1.5, 3.5),
    op:      0,
    max_op:  rnd(0.25, 0.55),
    fade_v:  rnd(0.006, 0.015),
    dir:     1,
    delay:   Math.floor(rnd(0, 180)),
  };
}

const FACTORIES = {
  winter: makeSnowflake,
  autumn: makeLeaf,
  spring: makeBlossom,
  summer: makeSparkle,
};

/* ---- Updaters ---- */

function updateSnowflake(p) {
  p.wob += p.wob_s;
  p.x   += p.vx + Math.sin(p.wob) * 0.35;
  p.y   += p.vy;
  if (p.y > window.innerHeight + 20) {
    p.y = rnd(-60, -10);
    p.x = rnd(0, window.innerWidth);
  }
}

function updateLeaf(p) {
  p.rot += p.rot_s;
  p.x   += p.vx;
  p.y   += p.vy;
  if (p.y > window.innerHeight + 30 || p.x < -40 || p.x > window.innerWidth + 40) {
    p.y = rnd(-60, -10);
    p.x = rnd(0, window.innerWidth);
  }
}

function updateBlossom(p) {
  p.wob += p.wob_s;
  p.rot += p.rot_s;
  p.x   += p.vx + Math.sin(p.wob) * 0.5;
  p.y   += p.vy;
  if (p.y > window.innerHeight + 20) {
    p.y = rnd(-50, -10);
    p.x = rnd(0, window.innerWidth);
  }
}

function updateSparkle(p) {
  if (p.delay > 0) { p.delay--; return; }
  p.op += p.fade_v * p.dir;
  if (p.op >= p.max_op)  { p.op = p.max_op; p.dir = -1; }
  else if (p.op <= 0)    {
    p.op  = 0;
    p.dir = 1;
    p.x   = rnd(0, window.innerWidth);
    p.y   = rnd(0, window.innerHeight);
    p.delay = Math.floor(rnd(30, 120));
  }
}

const UPDATERS = { winter: updateSnowflake, autumn: updateLeaf, spring: updateBlossom, summer: updateSparkle };

/* ---- Drawers ---- */

function drawSnowflake(ctx, p) {
  ctx.beginPath();
  ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
  ctx.fillStyle = 'rgba(220,235,255,' + p.op + ')';
  ctx.fill();
}

function drawLeaf(ctx, p) {
  ctx.save();
  ctx.translate(p.x, p.y);
  ctx.rotate(p.rot);
  ctx.beginPath();
  ctx.moveTo(0, -p.size);
  ctx.bezierCurveTo( p.size * 0.8, -p.size * 0.5,  p.size * 0.6, p.size * 0.3, 0, p.size);
  ctx.bezierCurveTo(-p.size * 0.6,  p.size * 0.3, -p.size * 0.8, -p.size * 0.5, 0, -p.size);
  ctx.fillStyle = 'hsla(' + p.hue + ',78%,42%,' + p.op + ')';
  ctx.fill();
  ctx.restore();
}

function drawBlossom(ctx, p) {
  ctx.save();
  ctx.translate(p.x, p.y);
  ctx.rotate(p.rot);
  for (let i = 0; i < 5; i++) {
    const angle = (i / 5) * Math.PI * 2;
    ctx.beginPath();
    ctx.ellipse(
      Math.cos(angle) * p.size * 0.52,
      Math.sin(angle) * p.size * 0.52,
      p.size * 0.48, p.size * 0.28,
      angle, 0, Math.PI * 2
    );
    ctx.fillStyle = 'rgba(240,145,190,' + p.op + ')';
    ctx.fill();
  }
  ctx.restore();
}

function drawSparkle(ctx, p) {
  if (p.delay > 0 || p.op <= 0) return;
  ctx.beginPath();
  ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
  ctx.fillStyle = 'rgba(255,218,60,' + p.op + ')';
  ctx.fill();
}

const DRAWERS = { winter: drawSnowflake, autumn: drawLeaf, spring: drawBlossom, summer: drawSparkle };

/* ---- Animation loop ---- */

function tick() {
  const s   = particleState;
  if (!s.canvas || !s.ctx || !s.particles.length) return;

  const season  = document.documentElement.getAttribute('data-season');
  const update  = UPDATERS[season];
  const draw    = DRAWERS[season];
  if (!update || !draw) return;

  s.ctx.clearRect(0, 0, s.canvas.width, s.canvas.height);
  s.particles.forEach(function(p) { update(p); draw(s.ctx, p); });
  s.rafId = requestAnimationFrame(tick);
}

function startParticles(season) {
  stopParticles();
  const factory = FACTORIES[season];
  if (!factory) return;

  particleState.season    = season;
  particleState.particles = Array.from({ length: getParticleCount(season) }, factory);
  particleState.canvas.classList.add('is-active');
  particleState.rafId = requestAnimationFrame(tick);
}

function stopParticles() {
  if (particleState.rafId) {
    cancelAnimationFrame(particleState.rafId);
    particleState.rafId = null;
  }
  particleState.particles = [];
  if (particleState.canvas) {
    particleState.ctx.clearRect(0, 0, particleState.canvas.width, particleState.canvas.height);
    particleState.canvas.classList.remove('is-active');
  }
}

function scheduleParticleRestart(season) {
  if (particleState.restartTimer) {
    clearTimeout(particleState.restartTimer);
  }
  stopParticles();
  particleState.restartTimer = setTimeout(function() {
    startParticles(season);
  }, 300);
}

/* ============================================================
   MAIN INIT
   ============================================================ */

document.addEventListener('DOMContentLoaded', function() {
  const season = getActiveSeason();

  // Apply season (the inline <head> script may have already set it,
  // but we re-apply to ensure switcher state is synced).
  document.documentElement.setAttribute('data-season', season);

  // Season switcher widget
  initSeasonSwitcher();

  // Particle effects
  if (EFFECTS_ENABLED && !reducedMotion.matches) {
    createParticleCanvas();
    startParticles(season);

    // Pause while tab is hidden (save CPU)
    document.addEventListener('visibilitychange', function() {
      if (document.hidden) {
        stopParticles();
      } else {
        const s = document.documentElement.getAttribute('data-season') || season;
        startParticles(s);
      }
    });

    // Respect if the user later enables reduced-motion
    reducedMotion.addEventListener('change', function(e) {
      if (e.matches) {
        stopParticles();
        if (particleState.canvas) {
          particleState.canvas.style.display = 'none';
        }
      }
    });
  }
});
