<?php
declare(strict_types=1);

$page    = $_GET['page'] ?? 'home';
$allowed = ['home', 'kontakt', 'ueber-uns', 'jobs', 'impressum', 'datenschutz'];

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
      <h1>Natur erleben.<br>Freude verschenken.</h1>
      <p class="hero-claim">
        Willkommen im Gartenfachgeschäft Garten2000+mehr. Wir freuen uns über Ihr Interesse
        an unserem floralen Angebot. Verschaffen Sie sich einen ersten Eindruck auf unserer
        Website. Erleben Sie bei uns in Handewitt die Möglichkeit, mit Blumen, Pflanzen und
        Dekorationen Freude zu bereiten – als Geschenk oder für das eigene gemütliche Zuhause.
      </p>
      <div class="hero-actions">
        <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-accent">Kontakt</a>
        <a href="https://www.google.com/maps/dir/?api=1&destination=Altholzkrug+40,+24976+Handewitt"
           class="btn btn-primary" target="_blank" rel="noopener noreferrer">
          Anfahrt
        </a>
        <a href="#oeffnungszeiten" class="btn btn-ghost">Öffnungszeiten</a>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 2: SPLIT SECTIONS
       ============================================= -->

  <!-- a) Pflanzen -->
  <section class="split-section section">
    <div class="container">
      <div class="split-inner">
        <div class="split-image reveal">
          <img src="<?= htmlspecialchars(asset_url('img/plants-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Große Auswahl an Pflanzen" loading="lazy">
        </div>
        <div class="split-text reveal reveal-delay-1">
          <h2>Unsere Pflanzen</h2>
          <p>
            Von der zarten Zimmerpflanze bis zur robusten Hecke – bei uns finden Sie eine große
            Auswahl an Pflanzen für jeden Anlass und jeden Ort.
          </p>
          <div>
            <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary">Mehr erfahren</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- b) Floristik & Geschenke -->
  <section class="split-section section reverse" style="background-color:var(--soft);">
    <div class="container">
      <div class="split-inner">
        <div class="split-image reveal">
          <img src="<?= htmlspecialchars(asset_url('img/floristik-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Floristik und Blumensträuße" loading="lazy">
        </div>
        <div class="split-text reveal reveal-delay-1">
          <h2>Floristik &amp; Geschenke</h2>
          <p>
            Frische Blumensträuße, festliche Gestecke und kreative Geschenkideen – wir gestalten
            mit Ihnen den perfekten Moment.
          </p>
          <div>
            <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary">Jetzt anfragen</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- c) Deko & Wohnen -->
  <section class="split-section section">
    <div class="container">
      <div class="split-inner">
        <div class="split-image reveal">
          <img src="<?= htmlspecialchars(asset_url('img/deko-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Deko und Wohnaccessoires" loading="lazy">
        </div>
        <div class="split-text reveal reveal-delay-1">
          <h2>Deko &amp; Wohnen</h2>
          <p>
            Saisonale Dekorationen, Wohnaccessoires und Lifestyle-Produkte – schaffen Sie eine
            gemütliche Atmosphäre, drinnen wie draußen.
          </p>
          <div>
            <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary">Kontakt aufnehmen</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
       SECTION 3: CIRCULAR GALLERY
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
       SECTION 4: ÖFFNUNGSZEITEN + KARTE
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
       SECTION 5: KONTAKT-TEASER
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
