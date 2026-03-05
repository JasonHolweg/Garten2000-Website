<?php
declare(strict_types=1);

$pageTitle       = 'Über uns – Garten2000+mehr';
$pageDescription = 'Die Geschichte von Garten2000+mehr in Handewitt – seit 1976 Ihr Gartenfachgeschäft mit Tradition und Leidenschaft.';
$canonicalPath   = '/?page=ueber-uns';

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/header.php';

$timelineItems = [
    [
        'date'  => 'April 1976',
        'title' => 'Gründung',
        'text'  => 'Herbert Holweg gründet das Unternehmen. Pflanzenverkauf auf Wochenmärkten und Gartengestaltung bilden den Anfang einer langen Erfolgsgeschichte.',
        'img'   => 'timeline-1.svg',
        'alt'   => 'Gründung 1976',
        'accent' => false,
    ],
    [
        'date'  => '1978',
        'title' => 'Bau der Rundhalle',
        'text'  => 'Am heutigen Standort in Handewitt entsteht die charakteristische Rundhalle – Grundstein für ein stetig wachsendes Gartencenter.',
        'img'   => 'timeline-2.svg',
        'alt'   => 'Rundhalle 1978',
        'accent' => false,
    ],
    [
        'date'  => 'Heute',
        'title' => 'Über 20.000 m² Fläche',
        'text'  => 'Garten2000+mehr erstreckt sich heute über mehr als 20.000 m² und bietet ein umfangreiches Sortiment an Pflanzen, Floristik und Deko. Kontinuierliche Weiterentwicklung ist unser Anspruch.',
        'img'   => 'timeline-3.svg',
        'alt'   => 'Heutige Fläche',
        'accent' => true,
    ],
    [
        'date'  => 'Familienbetrieb',
        'title' => 'Familienunternehmen mit Herz',
        'text'  => '5 von 15 Vollbeschäftigten sind Familienmitglieder. Kein Einkaufsverbund – individuelle Aktionen und persönliche Beratung stehen bei uns im Mittelpunkt.',
        'img'   => 'team-1.svg',
        'alt'   => 'Das Team',
        'accent' => false,
    ],
    [
        'date'  => 'Ab 2005',
        'title' => 'Übergabe an Jan Holweg',
        'text'  => 'Jan Holweg übernimmt die Unternehmensführung und treibt Ausbau und Umbau des Betriebs engagiert voran.',
        'img'   => 'timeline-4.svg',
        'alt'   => 'Übergabe 2005',
        'accent' => false,
    ],
    [
        'date'  => '24.05.2011',
        'title' => 'Herbert Holweg geht in Rente',
        'text'  => 'Gründer Herbert Holweg tritt in den Ruhestand, bleibt dem Unternehmen jedoch beratend verbunden.',
        'img'   => 'timeline-5.svg',
        'alt'   => 'Ruhestand 2011',
        'accent' => false,
    ],
    [
        'date'  => 'Seit 2004',
        'title' => 'Ausbildungsbetrieb',
        'text'  => 'Garten2000+mehr ist anerkannter Ausbildungsbetrieb und gibt jungen Menschen die Chance, eine fundierte gärtnerische Ausbildung zu absolvieren.',
        'img'   => 'timeline-6.svg',
        'alt'   => 'Ausbildungsbetrieb seit 2004',
        'accent' => true,
    ],
    [
        'date'  => '21.03.2016',
        'title' => 'Herbert Holweg verstorben',
        'text'  => 'Der Gründer Herbert Holweg verstirbt. Sein Lebenswerk lebt im Geiste seiner Familie und aller Mitarbeiter weiter.',
        'img'   => 'timeline-7.svg',
        'alt'   => 'Gedenken an Herbert Holweg',
        'accent' => false,
    ],
    [
        'date'  => '01.04. – 03.04.2016',
        'title' => '40. Firmengeburtstag',
        'text'  => 'Mit einem großen Fest feiert Garten2000+mehr 40 Jahre Unternehmensgeschichte – ein Meilenstein für die ganze Region.',
        'img'   => 'timeline-8.svg',
        'alt'   => '40. Jubiläum',
        'accent' => true,
    ],
    [
        'date'  => '2017',
        'title' => 'Neuer Raum für Lichterketten',
        'text'  => 'Ein eigener Bereich für Lichterketten und festliche Beleuchtung entsteht – eine funkelnde Erweiterung des Sortiments.',
        'img'   => 'timeline-9.svg',
        'alt'   => 'Lichterketten 2017',
        'accent' => false,
    ],
    [
        'date'  => '2018',
        'title' => 'Mehr Solar & Elektromobilität',
        'text'  => 'Ausbau der Solaranlagen auf dem Gelände. Ab Januar können Kunden zu den Öffnungszeiten ihre Elektroautos kostenlos laden.',
        'img'   => 'timeline-10.svg',
        'alt'   => 'Solar und E-Auto-Laden 2018',
        'accent' => false,
    ],
    [
        'date'  => '2020',
        'title' => 'Rundweg in der Dekoabteilung',
        'text'  => 'Ein neu gestalteter Rundweg lädt zum entspannten Stöbern durch die Dekoabteilung ein und macht den Einkauf zum Erlebnis.',
        'img'   => 'timeline-11.svg',
        'alt'   => 'Rundweg 2020',
        'accent' => false,
    ],
    [
        'date'  => '2023',
        'title' => 'Investitionen in die Zukunft',
        'text'  => 'Vier neue Elektro-Ladestationen, neue Gutschein-Münzen (alte behalten natürlich ihren Wert) und moderne Sicherheitskameras stärken den Betrieb für die Zukunft.',
        'img'   => 'timeline-12.svg',
        'alt'   => 'Neuerungen 2023',
        'accent' => true,
    ],
];
?>

<main id="main-content">

  <!-- Page Hero -->
  <div class="page-hero">
    <div class="container">
      <h1>Über uns</h1>
      <p>Seit 1976 Ihr Gartenfachgeschäft in Handewitt – mit Leidenschaft, Tradition und Familiensinn.</p>
    </div>
  </div>

  <section class="section" aria-label="Unsere Geschichte">
    <div class="container">
      <p class="about-intro reveal">
        Garten2000+mehr ist ein gewachsenes Familienunternehmen mit langer Tradition.
        Was einst mit Pflanzenverkauf auf Wochenmärkten begann, ist heute ein Gartencenter
        auf über 20.000 m² – mitten in Handewitt. Lesen Sie unsere Geschichte.
      </p>

      <!-- Timeline -->
      <div class="timeline" aria-label="Meilensteine">
        <?php foreach ($timelineItems as $item): ?>
          <div class="timeline-item reveal">
            <div class="timeline-dot <?= $item['accent'] ? 'accent' : '' ?>" aria-hidden="true"></div>
            <div class="timeline-content">
              <p class="timeline-date"><?= htmlspecialchars($item['date'], ENT_QUOTES, 'UTF-8') ?></p>
              <h3><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p><?= htmlspecialchars($item['text'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <div class="timeline-image">
              <img src="/assets/img/<?= htmlspecialchars($item['img'], ENT_QUOTES, 'UTF-8') ?>"
                   alt="<?= htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8') ?>"
                   loading="lazy">
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Betreiber block -->
      <div class="betreiber-card reveal" aria-label="Betreiber">
        <h3>Betreiber &amp; Ansprechpartner</h3>
        <p><strong>Jan Holweg</strong><br>Geschäftsführer, Garten2000+mehr GmbH &amp; Co. KG</p>
        <p>
          <a href="tel:+494619330">Tel: +49 461 93300</a><br>
          <a href="mailto:jan-holweg@garten2000-handewitt.de">jan-holweg@garten2000-handewitt.de</a>
        </p>
        <div>
          <a href="/?page=kontakt" class="btn btn-primary">Kontakt aufnehmen</a>
        </div>
      </div>

    </div><!-- /.container -->
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
