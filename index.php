<?php
declare(strict_types=1);

$page    = $_GET['page'] ?? 'home';
$allowed = ['home', 'kontakt', 'ueber-uns', 'jobs', 'impressum', 'datenschutz', 'sortiment', 'inspiration', 'beratung'];

if (!in_array($page, $allowed, true)) {
    http_response_code(404);
    // Graceful 404 fallback
    $pageTitle       = '404 – Seite nicht gefunden | Garten2000+mehr';
    $pageDescription = 'Die angeforderte Seite wurde nicht gefunden.';
    include __DIR__ . '/partials/head.php';
    include __DIR__ . '/partials/header.php';
    ?>
    <main id="main-content">
      <div class="page-hero">
        <div class="container">
          <h1>404 – Seite nicht gefunden</h1>
          <p>Die gewünschte Seite existiert leider nicht.</p>
        </div>
      </div>
      <div class="container" style="padding-block:3rem;text-align:center;">
        <a href="<?= htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary">Zur Startseite</a>
      </div>
    </main>
    <?php
    include __DIR__ . '/partials/footer.php';
    ?>
    <script src="<?= htmlspecialchars(asset_url('js/main.js'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($mainJsVersion) ?>"></script>
    </body>
    </html>
    <?php
    exit;
}

// Delegate non-home pages
if ($page !== 'home') {
    include __DIR__ . '/pages/' . $page . '.php';
    exit;
}

// ---- Home page ----
$pageTitle       = 'Garten2000+mehr – Ihr Gartencenter in Handewitt';
$pageDescription = 'Pflanzen, Blumen, Floristik und Dekoration im Gartenfachgeschäft Garten2000+mehr in Handewitt.';
$canonicalPath   = '/';

$heroImagePath = 'assets/img/hero-1.svg';
$heroCandidates = glob(__DIR__ . '/assets/img/hero.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE) ?: [];
if ($heroCandidates) {
  natsort($heroCandidates);
  $heroImagePath = 'assets/img/' . basename((string) array_values($heroCandidates)[0]);
}

$galleryFiles = glob(__DIR__ . '/assets/img/gallery/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE) ?: [];
natsort($galleryFiles);
$galleryItems = [];
foreach (array_values($galleryFiles) as $index => $filePath) {
  $galleryItems[] = [
    'src' => 'assets/img/gallery/' . basename($filePath),
    'alt' => 'Sortimentsfoto ' . ($index + 1),
  ];
}
if (!$galleryItems) {
  $galleryItems = [
    ['src' => 'assets/img/gallery-1.svg', 'alt' => 'Pflanzen'],
    ['src' => 'assets/img/gallery-2.svg', 'alt' => 'Floristik'],
    ['src' => 'assets/img/gallery-3.svg', 'alt' => 'Deko'],
    ['src' => 'assets/img/gallery-4.svg', 'alt' => 'Garten'],
    ['src' => 'assets/img/gallery-5.svg', 'alt' => 'Geschenke'],
    ['src' => 'assets/img/gallery-6.svg', 'alt' => 'Saisonal'],
    ['src' => 'assets/img/gallery-7.svg', 'alt' => 'Balkon'],
    ['src' => 'assets/img/gallery-8.svg', 'alt' => 'Indoor'],
  ];
}
$galleryItemsJson = htmlspecialchars((string) json_encode($galleryItems, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), ENT_QUOTES, 'UTF-8');

include __DIR__ . '/partials/head.php';
include __DIR__ . '/partials/header.php';
?>

<div id="intro" role="dialog" aria-label="Jubiläumsintro">
  <div class="intro-leaves" id="introLeaves" aria-hidden="true"></div>
  <div class="intro-content">
    <div class="intro-badge">✦ Jubiläum ✦</div>
    <div class="intro-fifty" aria-label="50">50</div>
    <div class="intro-jahre">Jahre</div>
    <img src="<?= htmlspecialchars(asset_url('img/logo.png'), ENT_QUOTES, 'UTF-8') ?>" alt="Garten2000+mehr" class="intro-logo" loading="eager" decoding="async">
    <div class="intro-tagline">Handewitt · Seit 1976 · Mit Leidenschaft</div>
    <button class="intro-skip" id="introSkip" aria-label="Intro überspringen">
      Überspringen →
    </button>
  </div>
</div>

<main id="main-content">

  <!-- =============================================
       SECTION 1: HERO
       ============================================= -->
  <section class="hero" aria-label="Willkommen"
       style="background-image: url('<?= htmlspecialchars($heroImagePath, ENT_QUOTES, 'UTF-8') ?>');">
    <div class="hero-content reveal">
      <span class="hero-eyebrow">Gartenfachgeschäft in Handewitt</span>
      <h1>Ihr Garten.<br>Unsere Leidenschaft.</h1>
      <p class="hero-claim">
        Seit 1976 begleiten wir Menschen in Handewitt und der Region dabei, ihren
        Garten, Balkon und ihr Zuhause mit Pflanzen, Floristik und Deko zu gestalten –
        persönlich, kompetent und mit echtem Herzblut.
      </p>
      <div class="hero-actions">
        <a href="<?= htmlspecialchars(site_url('?page=sortiment'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-accent">Sortiment entdecken</a>
        <a href="https://www.google.com/maps/dir/?api=1&destination=Altholzkrug+40,+24976+Handewitt"
           class="btn btn-primary" target="_blank" rel="noopener noreferrer">
          Anfahrt
        </a>
        <a href="#oeffnungszeiten" class="btn btn-ghost">Öffnungszeiten</a>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 2: TRUST BAR
       ============================================= -->
  <section class="trust-bar" aria-label="Unsere Eckdaten">
    <div class="container">
      <div class="trust-items">
        <div class="trust-item">
          <span class="trust-number">50</span>
          <span class="trust-label">Jahre Erfahrung</span>
        </div>
        <div class="trust-item">
          <span class="trust-number">20.000 m²</span>
          <span class="trust-label">Ausstellungsfläche</span>
        </div>
        <div class="trust-item">
          <span class="trust-number">Seit 1976</span>
          <span class="trust-label">Familienunternehmen</span>
        </div>
        <div class="trust-item">
          <span class="trust-number">Regional</span>
          <span class="trust-label">Verwurzelt in Handewitt</span>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 3: CATEGORY GRID
       ============================================= -->
  <section class="categories-section" aria-label="Unser Sortiment">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Entdecken Sie unser Sortiment</h2>
        <p class="section-subtitle reveal">Von der Zimmerpflanze bis zur Gartengestaltung – alles aus einer Hand</p>
      </div>
      <div class="category-grid">

        <a href="<?= htmlspecialchars(site_url('?page=sortiment'), ENT_QUOTES, 'UTF-8') ?>" class="category-card reveal">
          <div class="category-card-img">
            <img src="<?= htmlspecialchars(asset_url('img/plants-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Pflanzen & Baumschule" loading="lazy">
          </div>
          <div class="category-card-body">
            <h3>Pflanzen &amp; Baumschule</h3>
            <p>Zimmerpflanzen, Stauden, Gehölze, Kräuter und Bäume – eine riesige Vielfalt für drinnen und draußen.</p>
            <span class="category-card-link">Zur Pflanzenwelt</span>
          </div>
        </a>

        <a href="<?= htmlspecialchars(site_url('?page=sortiment'), ENT_QUOTES, 'UTF-8') ?>" class="category-card reveal reveal-delay-1">
          <div class="category-card-img">
            <img src="<?= htmlspecialchars(asset_url('img/floristik-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Floristik & Geschenke" loading="lazy">
          </div>
          <div class="category-card-body">
            <h3>Floristik &amp; Geschenke</h3>
            <p>Frische Sträuße, festliche Gestecke und kreative Geschenkideen – handgefertigt mit Leidenschaft.</p>
            <span class="category-card-link">Zur Floristik</span>
          </div>
        </a>

        <a href="<?= htmlspecialchars(site_url('?page=sortiment'), ENT_QUOTES, 'UTF-8') ?>" class="category-card reveal reveal-delay-2">
          <div class="category-card-img">
            <img src="<?= htmlspecialchars(asset_url('img/deko-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Deko & Wohnen" loading="lazy">
          </div>
          <div class="category-card-body">
            <h3>Deko &amp; Wohnen</h3>
            <p>Saisonale Dekorationen, Lichterketten und Wohnaccessoires für ein gemütliches Zuhause.</p>
            <span class="category-card-link">Zur Deko-Welt</span>
          </div>
        </a>

      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 4: INSPIRATION TEASER
       ============================================= -->
  <section class="inspiration-teaser" aria-label="Gartenideen und Inspiration">
    <div class="container">
      <div class="inspiration-inner">
        <div class="inspiration-text reveal">
          <span class="eyebrow">Frühjahr 2026</span>
          <h2>Lass dich für dein grünes Zuhause inspirieren</h2>
          <p>
            Ob Balkonkasten, Staudenbeet oder Wohnzimmerdschungel – wir zeigen Ihnen,
            wie Pflanzen und Deko echte Wohlfühlatmosphäre schaffen. Holen Sie sich
            Ihre Ideen direkt bei uns vor Ort.
          </p>
          <div class="flex-wrap-gap">
            <a href="<?= htmlspecialchars(site_url('?page=inspiration'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary">Ideen entdecken</a>
            <a href="<?= htmlspecialchars(site_url('?page=beratung'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost-dark">Beratung anfragen</a>
          </div>
        </div>
        <?php
        // Pick up to 3 gallery photos for the mosaic; fall back to SVGs
        $mosaicPhotos = array_slice(array_values($galleryItems), 0, 3);
        if (count($mosaicPhotos) < 3) {
          $mosaicPhotos = [
            ['src' => 'assets/img/gallery-1.svg', 'alt' => 'Pflanzen'],
            ['src' => 'assets/img/gallery-2.svg', 'alt' => 'Floristik'],
            ['src' => 'assets/img/gallery-3.svg', 'alt' => 'Deko'],
          ];
        }
        ?>
        <div class="inspiration-mosaic reveal reveal-delay-1" aria-hidden="true">
          <?php foreach ($mosaicPhotos as $photo): ?>
            <div class="mosaic-item">
              <img src="<?= htmlspecialchars($photo['src'], ENT_QUOTES, 'UTF-8') ?>"
                   alt="<?= htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8') ?>"
                   loading="lazy">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 5: ABOUT TEASER
       ============================================= -->
  <section class="about-teaser" aria-label="Über uns">
    <div class="container">
      <div class="about-teaser-inner">
        <div class="about-teaser-text reveal">
          <span class="eyebrow">Familienunternehmen seit 1976</span>
          <h2>Mehr als nur ein Gartencenter</h2>
          <blockquote>
            „Was mein Vater auf dem Wochenmarkt begann, ist heute auf über 20.000 m²
            gewachsen – doch das Wichtigste ist geblieben: echte Beratung und echte
            Leidenschaft für Pflanzen."
          </blockquote>
          <p style="color:var(--text-muted);">Jan Holweg, Geschäftsführer</p>
          <div class="about-teaser-facts">
            <div class="about-fact">Herbert Holweg gründet das Unternehmen im April 1976</div>
            <div class="about-fact">Heute über 20.000 m² Ausstellungsfläche in Handewitt</div>
            <div class="about-fact">5 von 15 Mitarbeitern sind Familienmitglieder</div>
            <div class="about-fact">Anerkannter Ausbildungsbetrieb seit 2004</div>
            <div class="about-fact">Kostenlose E-Auto-Ladestationen auf dem Gelände</div>
          </div>
          <a href="<?= htmlspecialchars(site_url('?page=ueber-uns'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary" style="margin-top:var(--space-md);">Unsere Geschichte</a>
        </div>
        <div class="reveal reveal-delay-2">
          <div class="split-image" style="aspect-ratio:3/4;">
            <img src="<?= htmlspecialchars(asset_url('img/team-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Das Team von Garten2000+mehr" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 6: CIRCULAR GALLERY
       ============================================= -->
  <section class="section-gallery" aria-label="Sortiment Einblicke">
    <div class="container text-center">
      <h2 class="section-title reveal">Einblicke in unser Sortiment</h2>
      <p class="section-subtitle reveal" style="margin-inline:auto;">Entdecken Sie unsere Vielfalt</p>
    </div>
    <div class="circular-gallery" id="circular-gallery"
         role="img"
         aria-label="Bildergalerie mit Sortimentsfotos"
         data-items='<?= $galleryItemsJson ?>'>
    </div>
  </section>

  <!-- =============================================
       SECTION 7: ÖFFNUNGSZEITEN + KARTE
       ============================================= -->
  <section class="hours-section section-soft section" id="oeffnungszeiten" aria-label="Öffnungszeiten und Anfahrt">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Öffnungszeiten &amp; Anfahrt</h2>
        <p class="section-subtitle reveal">Besuchen Sie uns in Handewitt</p>
      </div>

      <div class="hours-grid">
        <!-- Opening hours card -->
        <div class="hours-card reveal">
          <h3>Unsere Öffnungszeiten</h3>
          <p class="hours-live-status" data-open-status aria-live="polite">Status wird geladen …</p>
          <table class="hours-table">
            <tbody>
              <tr>
                <td>Montag – Freitag</td>
                <td>09:00 – 18:00 Uhr</td>
              </tr>
              <tr>
                <td>Samstag</td>
                <td>09:00 – 16:00 Uhr</td>
              </tr>
              <tr>
                <td>Sonntag</td>
                <td>10:00 – 12:00 Uhr</td>
              </tr>
            </tbody>
          </table>
          <div class="map-actions" style="margin-top:1.5rem;">
            <a href="https://www.google.com/maps/dir/?api=1&destination=Altholzkrug+40,+24976+Handewitt"
               class="btn btn-primary" target="_blank" rel="noopener noreferrer">
              Route planen
            </a>
            <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost-dark">Kontakt</a>
          </div>
        </div>

        <!-- Map -->
        <div class="reveal reveal-delay-2">
          <div class="map-wrapper">
            <iframe
              src="https://maps.google.com/maps?q=Altholzkrug+40,+24976+Handewitt&output=embed"
              title="Standort Garten2000+mehr auf Google Maps"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              allowfullscreen>
            </iframe>
          </div>
          <address style="margin-top:.75rem;font-style:normal;font-size:.9rem;color:var(--text-muted);">
            Altholzkrug 40, 24976 Handewitt, Deutschland
          </address>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 8: KONTAKT-TEASER
       ============================================= -->
  <section class="contact-teaser" aria-label="Kontakt aufnehmen">
    <div class="container">
      <h2 class="reveal">Wir sind für Sie da</h2>
      <p class="reveal" style="color:rgba(247,244,238,.8);font-size:1.1rem;margin-bottom:1.5rem;">
        Haben Sie Fragen zu unserem Sortiment oder möchten Sie etwas bestellen?
        Wir freuen uns auf Ihren Anruf oder Ihre Nachricht.
      </p>
      <a href="tel:+494619330" class="phone-number reveal" aria-label="Telefonnummer anrufen">
        +49 461 93300
      </a>
      <a href="mailto:info@garten2000-handewitt.de" class="email-link reveal">
        info@garten2000-handewitt.de
      </a>
      <div class="contact-teaser-actions reveal">
        <a href="tel:+494619330" class="btn btn-accent">
          Jetzt anrufen
        </a>
        <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost">
          Zum Kontaktformular
        </a>
      </div>
    </div>
  </section>

</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="<?= htmlspecialchars(asset_url('js/main.js'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($mainJsVersion) ?>"></script>
</body>
</html>
