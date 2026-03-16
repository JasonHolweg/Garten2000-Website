<?php
declare(strict_types=1);

$pageTitle       = 'Gartenideen & Inspiration – Garten2000+mehr';
$pageDescription = 'Gartenideen, Pflanztipps und saisonale Inspiration aus dem Gartencenter Garten2000+mehr in Handewitt.';
$canonicalPath   = '/?page=inspiration';

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/header.php';

$galleryFiles = glob(__DIR__ . '/../assets/img/gallery/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE) ?: [];
natsort($galleryFiles);
$galleryItems = [];
foreach (array_values($galleryFiles) as $idx => $filePath) {
    $galleryItems[] = [
        'src' => 'assets/img/gallery/' . basename($filePath),
        'alt' => 'Gartenbild ' . ($idx + 1),
    ];
}
if (!$galleryItems) {
    $galleryItems = [
        ['src' => 'assets/img/gallery-1.svg', 'alt' => 'Pflanzen'],
        ['src' => 'assets/img/gallery-2.svg', 'alt' => 'Floristik'],
        ['src' => 'assets/img/gallery-3.svg', 'alt' => 'Deko'],
        ['src' => 'assets/img/gallery-4.svg', 'alt' => 'Garten'],
        ['src' => 'assets/img/gallery-5.svg', 'alt' => 'Saisonal'],
        ['src' => 'assets/img/gallery-6.svg', 'alt' => 'Balkon'],
    ];
}

$ideas = [
    [
        'title' => 'Der bepflanzte Balkon',
        'text'  => 'Auch auf kleinem Raum entsteht ein grünes Paradies. Kombinieren Sie Hängeblumen wie Petunien und Fuchsien mit Kräutern und einem Sichtschutz aus Bambus oder Efeu. Wir helfen Ihnen bei der Auswahl passender Pflanzen und Gefäße.',
        'img'   => 'gallery-7.svg',
        'tag'   => 'Balkon & Terrasse',
    ],
    [
        'title' => 'Stauden-Beet das ganze Jahr',
        'text'  => 'Mit der richtigen Auswahl an Stauden blüht Ihr Garten von April bis Oktober. Frühblüher wie Lenzrosen und Scilla, gefolgt von Salvia, Lavendel und Herbstanemonen schaffen ein natürliches Farbspiel ohne viel Aufwand.',
        'img'   => 'gallery-8.svg',
        'tag'   => 'Garten & Beete',
    ],
    [
        'title' => 'Zimmerdschungel mit Stil',
        'text'  => 'Große Monstera, hängende Pothos und majestätische Fiddle-Leaf-Figs machen jedes Zimmer zu einem grünen Wohnzimmer. Kombinieren Sie verschiedene Blattformen und -farben für eine lebendige, entspannte Atmosphäre.',
        'img'   => 'gallery-1.svg',
        'tag'   => 'Indoor & Wohnen',
    ],
    [
        'title' => 'Kräutergarten auf der Fensterbank',
        'text'  => 'Basilikum, Rosmarin, Minze, Thymian und Schnittlauch – frische Kräuter aus dem eigenen Anbau sind nicht nur praktisch, sondern auch wunderschön. Wir beraten Sie gerne über Standort, Pflege und die besten Kombis.',
        'img'   => 'gallery-2.svg',
        'tag'   => 'Kräuter & Nutzgarten',
    ],
    [
        'title' => 'Herbst-Deko mit Naturmaterialien',
        'text'  => 'Kürbisse in Orange und Weiß, Chrysanthemen, Weinreben und Trockenblumen – der Herbst ist die schönste Jahreszeit für natürliche Dekoration. Lassen Sie sich von unserer saisonalen Ausstellung inspirieren.',
        'img'   => 'gallery-3.svg',
        'tag'   => 'Saisonal & Deko',
    ],
    [
        'title' => 'Wintergarten & Weihnacht',
        'text'  => 'Adventskränze, Weihnachtssterne, funkelnde Lichterketten und lebende Tannenbäume – in unserer eigenen Lichterketten-Abteilung finden Sie alles für eine festliche Atmosphäre, die von Herzen kommt.',
        'img'   => 'gallery-4.svg',
        'tag'   => 'Weihnachten & Winter',
    ],
];

$photoSlice = array_slice($galleryItems, 0, 6);
?>

<main id="main-content">

  <!-- Page Hero -->
  <div class="page-hero">
    <div class="container">
      <span class="seasonal-badge" style="margin-bottom:1rem;">🌸 Frühjahr 2026</span>
      <h1>Gartenideen &amp; Inspiration</h1>
      <p>Lassen Sie sich inspirieren – für Balkon, Garten, Wohnzimmer und besondere Momente.</p>
    </div>
  </div>

  <!-- Ideas Grid -->
  <section class="section" aria-label="Gartenideen">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Ideen für jede Jahreszeit</h2>
        <p class="section-subtitle reveal">Nicht jede Idee braucht einen großen Garten – Leidenschaft reicht.</p>
      </div>

      <div class="idea-cards">
        <?php foreach ($ideas as $idea): ?>
          <div class="idea-card reveal">
            <div class="idea-card-img">
              <img src="<?= htmlspecialchars(asset_url('img/' . $idea['img']), ENT_QUOTES, 'UTF-8') ?>"
                   alt="<?= htmlspecialchars($idea['title'], ENT_QUOTES, 'UTF-8') ?>"
                   loading="lazy">
            </div>
            <div class="idea-card-body">
              <span class="seasonal-badge" style="font-size:.7rem;padding:.2rem .7rem;margin-bottom:.5rem;"><?= htmlspecialchars($idea['tag'], ENT_QUOTES, 'UTF-8') ?></span>
              <h3><?= htmlspecialchars($idea['title'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p><?= htmlspecialchars($idea['text'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div><!-- /.container -->
  </section>

  <!-- Photo Gallery -->
  <?php if ($photoSlice): ?>
  <section class="section" style="background-color:var(--soft);" aria-label="Impressionen aus unserem Gartencenter">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Aus unserem Gartencenter</h2>
        <p class="section-subtitle reveal">Echte Einblicke – so sieht es bei uns aus.</p>
      </div>
      <div class="photo-grid reveal">
        <?php foreach ($photoSlice as $photo): ?>
          <div class="photo-grid-item">
            <img src="<?= htmlspecialchars($photo['src'], ENT_QUOTES, 'UTF-8') ?>"
                 alt="<?= htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8') ?>"
                 loading="lazy">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Tips Section -->
  <section class="section" aria-label="Pflegetipps">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Unsere Pflegetipps</h2>
        <p class="section-subtitle reveal">Kleine Handgriffe mit großer Wirkung</p>
      </div>
      <div class="jobs-grid" style="margin-top:0;">
        <div class="job-card reveal">
          <h3 style="color:var(--primary);">🌞 Richtig gießen</h3>
          <p style="color:var(--text-muted);">
            Die meisten Zimmerpflanzen mögen es lieber etwas trockener als zu nass.
            Testen Sie die Erde mit dem Finger – ist die obere Schicht trocken, darf gegossen werden.
            Morgens gießen ist besser als abends.
          </p>
        </div>
        <div class="job-card reveal reveal-delay-1">
          <h3 style="color:var(--primary);">🌱 Richtig düngen</h3>
          <p style="color:var(--text-muted);">
            In der Wachstumsphase (Frühjahr bis Herbst) brauchen Pflanzen Nährstoffe.
            Ein flüssiger Volldünger alle 2 Wochen reicht für die meisten Arten.
            Im Winter pausieren.
          </p>
        </div>
        <div class="job-card reveal reveal-delay-2">
          <h3 style="color:var(--primary);">✂️ Richtig schneiden</h3>
          <p style="color:var(--text-muted);">
            Saubere Schnitte heilen schneller und verhindern Pilzkrankheiten.
            Rosen und Heckenpflanzen im Frühjahr zurückschneiden –
            so blühen sie üppiger und bleiben gesund.
          </p>
        </div>
        <div class="job-card reveal reveal-delay-3">
          <h3 style="color:var(--primary);">🌧️ Saisonal vorbereiten</h3>
          <p style="color:var(--text-muted);">
            Kübelpflanzen vor dem ersten Frost einräumen. Stauden können stehen bleiben –
            sie bieten Vögeln Winterfutter und schützen den Boden.
            Erde im Herbst mit Kompost anreichern.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Band -->
  <div class="cta-band" aria-label="Besuchen Sie uns">
    <div class="container">
      <h2 class="reveal">Persönliche Beratung vor Ort</h2>
      <p class="reveal">
        Ideen aus dem Internet sind schön – aber nichts geht über echte Pflanzen, echte
        Menschen und echte Beratung. Kommen Sie zu uns nach Handewitt.
      </p>
      <div class="cta-band-actions reveal">
        <a href="<?= htmlspecialchars(site_url('?page=beratung'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-accent">Beratung & Service</a>
        <a href="<?= htmlspecialchars(site_url('?page=sortiment'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost">Sortiment entdecken</a>
      </div>
    </div>
  </div>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="<?= htmlspecialchars(asset_url('js/main.js'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($mainJsVersion) ?>"></script>
</body>
</html>
