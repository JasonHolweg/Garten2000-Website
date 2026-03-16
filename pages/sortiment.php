<?php
declare(strict_types=1);

$pageTitle       = 'Sortiment – Garten2000+mehr';
$pageDescription = 'Pflanzen, Floristik, Deko und mehr – entdecken Sie das vielfältige Sortiment von Garten2000+mehr in Handewitt auf über 20.000 m².';
$canonicalPath   = '/?page=sortiment';

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/header.php';

$categories = [
    [
        'icon'  => '🌿',
        'title' => 'Zimmerpflanzen',
        'intro' => 'Bringen Sie Natur in Ihr Zuhause – von der robusten Grünpflanze bis zum tropischen Hingucker.',
        'items' => [
            'Monstera & Philodendron', 'Kakteen & Sukkulenten', 'Farne & Orchideen',
            'Bromelien & Tillandsia', 'Efeututen & Schlingpflanzen', 'Feigenbäume & Drachenbäume',
            'Bonsai & Ziergehölze', 'Kräuter für die Fensterbank',
        ],
    ],
    [
        'icon'  => '🌸',
        'title' => 'Balkon- & Terrassenpflanzen',
        'intro' => 'Farbe, Duft und Leben auf Ihrem Balkon – jahreszeitlich wechselnde Auswahl für jeden Standort.',
        'items' => [
            'Geranien & Pelargonien', 'Petunien & Surfinia', 'Begonien & Fuchsien',
            'Lavendel & Rosmarin', 'Kletterrosen & Clematis', 'Hänge-Lobelien & Verbenen',
            'Sommerblumen-Mischungen', 'Kübelpflanzen & Oleander',
        ],
    ],
    [
        'icon'  => '🌳',
        'title' => 'Gartenpflanzen, Stauden & Gehölze',
        'intro' => 'Für Ihren Garten – von der bodendeckenden Staude bis zum stattlichen Zierbaum.',
        'items' => [
            'Stauden & Bodendecker', 'Rosen (Strauch-, Kletterrosen)', 'Heckenpflanzen & Buchsbaum',
            'Obstbäume & Beerenobst', 'Koniferen & Rhododendren', 'Ziergehölze & Bäume',
            'Wasserpflanzen & Teichpflanzen', 'Gräser & Bambus',
        ],
    ],
    [
        'icon'  => '🌼',
        'title' => 'Floristik & Blumen',
        'intro' => 'Wir gestalten für Sie – frische Sträuße, festliche Gestecke und Arrangements für jeden Anlass.',
        'items' => [
            'Frische Schnittblumen', 'Brautsträuße & Hochzeitsgestecke', 'Trauerfloristik',
            'Geburtstagsgestecke', 'Advents- & Weihnachtsgestecke', 'Osterarrangements',
            'Trockenblumen & Pampasgras', 'Blumenkränze & Türschmuck',
        ],
    ],
    [
        'icon'  => '🎁',
        'title' => 'Deko, Geschenke & Zubehör',
        'intro' => 'Entdecken Sie unsere Welt aus Wohnaccessoires, Gartengeräten und saisonaler Dekoration.',
        'items' => [
            'Töpfe, Pflanzgefäße & Körbe', 'Erde, Dünger & Pflanzenschutz', 'Gartengeräte & Werkzeug',
            'Lichterketten & Laternen', 'Weihnachtsdeko & Adventskränze', 'Ostern- & Frühjahrsdekoration',
            'Gartenmöbel & Deko-Figuren', 'Gutscheine & Geschenkideen',
        ],
    ],
    [
        'icon'  => '🌱',
        'title' => 'Saisonal',
        'intro' => 'Was die Jahreszeit bringt – frisch aus unserer Gärtnerei und von ausgewählten Lieferanten.',
        'items' => [
            'Frühjahr: Osterpflanzen, Primeln, Tulpen', 'Sommer: Sommerblumen, Kräuter, Obst',
            'Herbst: Chrysanthemen, Kürbisse, Zierkürbisse', 'Winter: Weihnachtssterne, Tannenbäume, Adventskränze',
            'Gemüsepflanzen & Anzuchtsets', 'Blumenzwiebeln & Grassamen',
            'Saisonale Schnittblumen', 'Natürliche Weihnachtsdekoration',
        ],
    ],
];
?>

<main id="main-content">

  <!-- Page Hero -->
  <div class="page-hero">
    <div class="container">
      <span class="seasonal-badge" style="margin-bottom:1rem;">🌿 Pflanzenwelt entdecken</span>
      <h1>Unser Sortiment</h1>
      <p>Über 20.000 m² voller Pflanzen, Floristik, Deko und Gartenfreude – alles aus einer Hand in Handewitt.</p>
    </div>
  </div>

  <!-- Intro -->
  <section class="section" aria-label="Sortimentsübersicht">
    <div class="container">
      <p class="about-intro reveal">
        Bei Garten2000+mehr finden Sie alles, was Ihr Herz für Garten, Balkon und Zuhause begehrt.
        Unser Team berät Sie persönlich und mit echter Fachkenntnis – kein Onlineshop,
        sondern echtes Erleben vor Ort. Kommen Sie vorbei und lassen Sie sich inspirieren.
      </p>

      <!-- Categories -->
      <div class="product-categories">
        <?php foreach ($categories as $idx => $cat): ?>
          <div class="product-category-section reveal">
            <div class="product-category-header">
              <span class="product-category-icon" aria-hidden="true"><?= htmlspecialchars($cat['icon'], ENT_QUOTES, 'UTF-8') ?></span>
              <div>
                <h2 style="margin:0;font-size:var(--font-size-xl);"><?= htmlspecialchars($cat['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p style="color:var(--text-muted);margin:0.25rem 0 0;"><?= htmlspecialchars($cat['intro'], ENT_QUOTES, 'UTF-8') ?></p>
              </div>
            </div>
            <div class="product-items-grid">
              <?php foreach ($cat['items'] as $item): ?>
                <div class="product-item-chip"><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php if ($idx < count($categories) - 1): ?>
            <hr style="border:none;border-top:1px solid var(--soft);margin:var(--space-2xl) 0;">
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div><!-- /.container -->
  </section>

  <!-- CTA Band -->
  <div class="cta-band" aria-label="Besuchen Sie uns">
    <div class="container">
      <h2 class="reveal">Sehen ist besser als Lesen</h2>
      <p class="reveal">
        Unser Sortiment wechselt mit den Jahreszeiten. Am besten kommen Sie einfach vorbei –
        wir freuen uns auf Sie!
      </p>
      <div class="cta-band-actions reveal">
        <a href="<?= htmlspecialchars(site_url('?page=beratung'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-accent">Beratung anfragen</a>
        <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost">Kontakt & Anfahrt</a>
      </div>
    </div>
  </div>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="<?= htmlspecialchars(asset_url('js/main.js'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($mainJsVersion) ?>"></script>
</body>
</html>
