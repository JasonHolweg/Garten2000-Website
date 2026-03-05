/**
 * Garten2000+mehr – Main JavaScript
 */

'use strict';

/* ============================================================
   UTILITIES
   ============================================================ */

const prefersReducedMotion = () =>
  window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const lerp = (a, b, t) => a + (b - a) * t;

/* ============================================================
   1. MOBILE NAV TOGGLE
   ============================================================ */

function initMobileNav() {
  const toggle = document.getElementById('nav-toggle');
  const nav = document.getElementById('main-nav');
  const backdrop = document.getElementById('nav-backdrop');

  if (!toggle || !nav) return;

  const focusableSelectors =
    'a[href], button:not([disabled]), input, textarea, select, [tabindex]:not([tabindex="-1"])';

  function getFocusableElements() {
    return Array.from(nav.querySelectorAll(focusableSelectors));
  }

  function openNav() {
    nav.classList.add('is-open');
    toggle.setAttribute('aria-expanded', 'true');
    toggle.setAttribute('aria-label', 'Navigation schließen');
    if (backdrop) {
      backdrop.classList.add('is-active');
      backdrop.removeAttribute('aria-hidden');
    }
    document.body.style.overflow = 'hidden';

    // Focus first focusable element
    const focusable = getFocusableElements();
    if (focusable.length) {
      setTimeout(() => focusable[0].focus(), 50);
    }
  }

  function closeNav() {
    nav.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Navigation öffnen');
    if (backdrop) {
      backdrop.classList.remove('is-active');
      backdrop.setAttribute('aria-hidden', 'true');
    }
    document.body.style.overflow = '';
    toggle.focus();
  }

  function trapFocus(e) {
    if (!nav.classList.contains('is-open')) return;
    const focusable = getFocusableElements();
    if (!focusable.length) return;

    const first = focusable[0];
    const last = focusable[focusable.length - 1];

    if (e.key === 'Tab') {
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    }

    if (e.key === 'Escape') {
      closeNav();
    }
  }

  toggle.addEventListener('click', () => {
    const isOpen = nav.classList.contains('is-open');
    isOpen ? closeNav() : openNav();
  });

  if (backdrop) {
    backdrop.addEventListener('click', closeNav);
  }

  document.addEventListener('keydown', trapFocus);

  // Close nav when a nav link is clicked (mobile)
  nav.querySelectorAll('.nav-link').forEach((link) => {
    link.addEventListener('click', () => {
      if (nav.classList.contains('is-open')) closeNav();
    });
  });
}

/* ============================================================
   2. SCROLL REVEAL
   ============================================================ */

function initScrollReveal() {
  if (prefersReducedMotion()) {
    // Make all reveal elements visible immediately
    document.querySelectorAll('.reveal').forEach((el) => {
      el.classList.add('visible');
    });
    return;
  }

  const revealEls = document.querySelectorAll('.reveal');
  if (!revealEls.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
  );

  revealEls.forEach((el) => observer.observe(el));
}

/* ============================================================
   3. SMOOTH SCROLL
   ============================================================ */

function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', (e) => {
      const href = anchor.getAttribute('href');
      if (href === '#') return;
      const target = document.querySelector(href);
      if (!target) return;
      e.preventDefault();

      const headerHeight =
        document.getElementById('site-header')?.offsetHeight || 72;

      const top =
        target.getBoundingClientRect().top + window.scrollY - headerHeight - 8;

      if (prefersReducedMotion()) {
        window.scrollTo({ top });
      } else {
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });
}

/* ============================================================
   4. TOAST SYSTEM
   ============================================================ */

let toastContainer = null;

function getToastContainer() {
  if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.className = 'toast-container';
    toastContainer.setAttribute('role', 'region');
    toastContainer.setAttribute('aria-live', 'polite');
    toastContainer.setAttribute('aria-label', 'Benachrichtigungen');
    document.body.appendChild(toastContainer);
  }
  return toastContainer;
}

/**
 * Show a toast notification.
 * @param {string} message
 * @param {'success'|'error'} type
 * @param {number} [duration=4000]
 */
function showToast(message, type = 'success', duration = 4000) {
  const container = getToastContainer();

  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.setAttribute('role', 'alert');

  const text = document.createElement('span');
  text.textContent = message;
  toast.appendChild(text);

  container.appendChild(toast);

  // Auto-remove
  const removeTimer = setTimeout(() => {
    removeToast(toast);
  }, duration);

  // Click to dismiss
  toast.addEventListener('click', () => {
    clearTimeout(removeTimer);
    removeToast(toast);
  });
}

function removeToast(toast) {
  toast.classList.add('removing');
  toast.addEventListener(
    'animationend',
    () => {
      toast.remove();
    },
    { once: true }
  );
}

window.showToast = showToast;

/* ============================================================
   5. CIRCULAR GALLERY
   ============================================================ */

function initCircularGallery() {
  const container = document.querySelector('.circular-gallery');
  if (!container) return;

  // Build items list
  let items = [];

  const dataAttr = container.dataset.items;
  if (dataAttr) {
    try {
      items = JSON.parse(dataAttr);
    } catch (e) {
      console.warn('circular-gallery: invalid data-items JSON', e);
    }
  }

  // Fall back to existing child img elements
  if (!items.length) {
    container.querySelectorAll('img').forEach((img) => {
      items.push({ src: img.src, alt: img.alt || '' });
    });
  }

  if (!items.length) return;

  // Reduced motion: render as static grid
  if (prefersReducedMotion()) {
    container.classList.add('static-grid');
    container.innerHTML = '';
    items.forEach(({ src, alt }) => {
      const div = document.createElement('div');
      div.className = 'gallery-item';
      const img = document.createElement('img');
      img.src = src;
      img.alt = alt;
      img.loading = 'lazy';
      div.appendChild(img);
      container.appendChild(div);
    });
    return;
  }

  // Clear container and build gallery elements
  container.innerHTML = '';

  const itemCount = items.length;
  const elements = items.map(({ src, alt }) => {
    const div = document.createElement('div');
    div.className = 'gallery-item';
    const img = document.createElement('img');
    img.src = src;
    img.alt = alt;
    img.loading = 'lazy';
    img.draggable = false;
    div.appendChild(img);
    container.appendChild(div);
    return div;
  });

  // Config
  const radius = 350;
  const itemWidth = 200;
  const itemHeight = 150;
  const scrollSpeed = 2.3;
  const scrollEase = 0.09;
  const borderRadius = 0.07; // fraction of width

  let currentAngle = 0;   // actual rendered angle
  let targetAngle = 0;    // desired angle (lerped toward)
  let isDragging = false;
  let dragStartX = 0;
  let dragStartAngle = 0;
  let lastScrollY = window.scrollY;
  let rafId = null;

  function getContainerCenter() {
    const rect = container.getBoundingClientRect();
    return { x: rect.width / 2, y: rect.height / 2 };
  }

  function updateItems(angle) {
    const center = getContainerCenter();
    const angleStep = (Math.PI * 2) / itemCount;

    elements.forEach((el, i) => {
      const theta = angleStep * i + angle;
      const x = Math.sin(theta) * radius;
      const z = Math.cos(theta) * radius;

      // Depth: z ranges from -radius to +radius
      // Normalize to 0-1 (front = 1, back = 0)
      const depth = (z + radius) / (radius * 2);
      const scale = 0.55 + depth * 0.55;
      const zIndex = Math.round(depth * 100);

      const posX = center.x + x - (itemWidth * scale) / 2;
      const posY = center.y - (itemHeight * scale) / 2;

      const opacity = 0.3 + depth * 0.7;

      el.style.cssText = `
        width: ${itemWidth * scale}px;
        height: ${itemHeight * scale}px;
        transform: translate(${posX}px, ${posY}px);
        z-index: ${zIndex};
        opacity: ${opacity};
        border-radius: ${itemWidth * scale * borderRadius}px;
        transition: none;
      `;
    });
  }

  function animate() {
    currentAngle = lerp(currentAngle, targetAngle, scrollEase);
    updateItems(currentAngle);
    rafId = requestAnimationFrame(animate);
  }

  // Scroll handler
  function onScroll() {
    const delta = window.scrollY - lastScrollY;
    lastScrollY = window.scrollY;
    const containerRect = container.getBoundingClientRect();
    // Only react to scroll when gallery is visible
    if (
      containerRect.bottom > 0 &&
      containerRect.top < window.innerHeight
    ) {
      targetAngle += (delta / 300) * scrollSpeed;
    }
  }

  // Drag handlers (mouse)
  function onMouseDown(e) {
    isDragging = true;
    dragStartX = e.clientX;
    dragStartAngle = targetAngle;
    container.style.cursor = 'grabbing';
  }

  function onMouseMove(e) {
    if (!isDragging) return;
    const dx = e.clientX - dragStartX;
    targetAngle = dragStartAngle + dx * 0.005;
  }

  function onMouseUp() {
    isDragging = false;
    container.style.cursor = 'grab';
  }

  // Touch handlers
  function onTouchStart(e) {
    isDragging = true;
    dragStartX = e.touches[0].clientX;
    dragStartAngle = targetAngle;
  }

  function onTouchMove(e) {
    if (!isDragging) return;
    const dx = e.touches[0].clientX - dragStartX;
    targetAngle = dragStartAngle + dx * 0.005;
  }

  function onTouchEnd() {
    isDragging = false;
  }

  // Slow auto-rotate
  let lastTime = null;
  function autoRotate(time) {
    if (!isDragging) {
      if (lastTime !== null) {
        const dt = time - lastTime;
        targetAngle += (dt / 1000) * 0.4; // ~0.4 rad/s
      }
      lastTime = time;
    } else {
      lastTime = null;
    }
  }

  // Override animate to include auto-rotate
  function mainLoop(time) {
    autoRotate(time);
    currentAngle = lerp(currentAngle, targetAngle, scrollEase);
    updateItems(currentAngle);
    rafId = requestAnimationFrame(mainLoop);
  }

  container.addEventListener('mousedown', onMouseDown);
  document.addEventListener('mousemove', onMouseMove);
  document.addEventListener('mouseup', onMouseUp);
  container.addEventListener('touchstart', onTouchStart, { passive: true });
  container.addEventListener('touchmove', onTouchMove, { passive: true });
  container.addEventListener('touchend', onTouchEnd);
  window.addEventListener('scroll', onScroll, { passive: true });

  // Start
  updateItems(currentAngle);
  rafId = requestAnimationFrame(mainLoop);
}

/* ============================================================
   6. CONTACT FORM
   ============================================================ */

function initContactForm() {
  const form = document.getElementById('contact-form');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Basic client-side validation
    const name = form.querySelector('[name="name"]')?.value.trim();
    const email = form.querySelector('[name="email"]')?.value.trim();
    const subject = form.querySelector('[name="subject"]')?.value.trim();
    const message = form.querySelector('[name="message"]')?.value.trim();
    const dsgvo = form.querySelector('[name="dsgvo"]')?.checked;

    if (!name || !email || !subject || !message) {
      showToast('Bitte füllen Sie alle Pflichtfelder aus.', 'error');
      return;
    }

    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRe.test(email)) {
      showToast('Bitte geben Sie eine gültige E-Mail-Adresse ein.', 'error');
      return;
    }

    if (!dsgvo) {
      showToast('Bitte stimmen Sie der Datenschutzerklärung zu.', 'error');
      return;
    }

    // Submit via fetch
    const formData = new FormData(form);
    formData.set('action', 'send');

    const submitBtn = form.querySelector('[type="submit"]');
    const origText = submitBtn?.textContent;
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = 'Wird gesendet…';
    }

    try {
      const res = await fetch(form.action || window.location.href, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
      });

      const text = await res.text();
      // Look for JSON flag injected by PHP
      const successMatch = text.match(/FORM_SUCCESS:\s*(true|false)/);
      const errorMatch = text.match(/FORM_ERROR:\s*"([^"]+)"/);

      if (successMatch && successMatch[1] === 'true') {
        showToast(
          'Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns bald!',
          'success'
        );
        form.reset();
      } else if (errorMatch) {
        showToast(errorMatch[1], 'error');
      } else if (res.ok) {
        showToast(
          'Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns bald!',
          'success'
        );
        form.reset();
      } else {
        showToast('Es gab einen Fehler. Bitte versuchen Sie es erneut.', 'error');
      }
    } catch (err) {
      console.error('Form submission error:', err);
      showToast('Es gab einen Netzwerkfehler. Bitte versuchen Sie es erneut.', 'error');
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.textContent = origText;
      }
    }
  });
}

/* ============================================================
   7. STICKY HEADER SCROLL EFFECT
   ============================================================ */

function initHeaderScroll() {
  const header = document.getElementById('site-header');
  if (!header) return;

  const onScroll = () => {
    if (window.scrollY > 20) {
      header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.35)';
    } else {
      header.style.boxShadow = '';
    }
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

/* ============================================================
   8. HANDLE PHP FORM RESULT (for toast on page load after redirect)
   ============================================================ */

function handleFormResult() {
  // Check for inline script flags from PHP
  if (typeof window.__FORM_SUCCESS !== 'undefined' && window.__FORM_SUCCESS) {
    showToast(
      'Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns bald!',
      'success'
    );
  }
  if (typeof window.__FORM_ERROR !== 'undefined' && window.__FORM_ERROR) {
    showToast(window.__FORM_ERROR, 'error');
  }
}

/* ============================================================
   INIT
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {
  initMobileNav();
  initScrollReveal();
  initSmoothScroll();
  initCircularGallery();
  initContactForm();
  initHeaderScroll();
  handleFormResult();
});
