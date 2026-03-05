<?php
declare(strict_types=1);

$pageTitle       = 'Jobs – Garten2000+mehr';
$pageDescription = 'Stellenangebote bei Garten2000+mehr in Handewitt. Werden Sie Teil unseres Teams als Gärtner/in, Florist/in oder in der Ausbildung.';
$canonicalPath   = '/?page=jobs';

$jobs = [
    [
        'title'        => 'Gärtner/in (m/w/d)',
        'text'         => 'Betreuung und Pflege unserer vielfältigen Pflanzen- und Baumschulware. Sie sind Ansprechpartner für unsere Kunden rund ums Thema Pflanzen.',
        'requirements' => [
            'Abgeschlossene gärtnerische Ausbildung',
            'Teamfähigkeit und Zuverlässigkeit',
            'Freude an der Arbeit mit Pflanzen und Kunden',
        ],
        'subject'      => 'Bewerbung: Gärtner/in',
    ],
    [
        'title'        => 'Florist/in (m/w/d)',
        'text'         => 'Kreative Gestaltung von Sträußen, Gestecken und Dekorationen für besondere Anlässe. Sie beraten unsere Kunden mit Leidenschaft.',
        'requirements' => [
            'Ausbildung als Florist/in',
            'Kreativität und gestalterisches Talent',
            'Freundliche Kundenorientierung',
        ],
        'subject'      => 'Bewerbung: Florist/in',
    ],
    [
        'title'        => 'Aushilfe Kasse (m/w/d)',
        'text'         => 'Unterstützung an der Kasse und im Verkauf – ideal für Studenten, Schüler oder Quereinsteiger, die Freude am Kundenkontakt haben.',
        'requirements' => [
            'Zuverlässigkeit und Pünktlichkeit',
            'Freundliches Auftreten',
            'Zeitliche Flexibilität',
        ],
        'subject'      => 'Bewerbung: Aushilfe Kasse',
    ],
    [
        'title'        => 'Ausbildungsplatz Gärtner/in',
        'text'         => 'Starte deine Ausbildung bei uns – einem anerkannten Ausbildungsbetrieb seit 2004. Wir begleiten dich auf deinem Weg in die grüne Branche.',
        'requirements' => [
            'Schulabschluss (mind. Hauptschule)',
            'Begeisterung für Pflanzen und Natur',
            'Motivation und Lernbereitschaft',
        ],
        'subject'      => 'Bewerbung: Ausbildungsplatz Gärtner/in',
    ],
];

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/header.php';
?>

<main id="main-content">

  <!-- Page Hero -->
  <div class="page-hero">
    <div class="container">
      <h1>Jobs &amp; Karriere</h1>
      <p>Werden Sie Teil unseres Teams – wachsen Sie mit uns.</p>
    </div>
  </div>

  <section class="section" aria-label="Stellenangebote">
    <div class="container">

      <div class="section-header">
        <h2 class="section-title reveal">Aktuelle Stellenangebote</h2>
        <p class="section-subtitle reveal">
          Wir suchen motivierte Menschen, die Freude an Pflanzen, Floristik und Kundenkontakt haben.
        </p>
      </div>

      <div class="jobs-grid">
        <?php foreach ($jobs as $job): ?>
          <article class="job-card reveal" aria-label="<?= htmlspecialchars($job['title'], ENT_QUOTES, 'UTF-8') ?>">
            <h3><?= htmlspecialchars($job['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="job-text"><?= htmlspecialchars($job['text'], ENT_QUOTES, 'UTF-8') ?></p>
            <ul class="job-requirements" aria-label="Anforderungen">
              <?php foreach ($job['requirements'] as $req): ?>
                <li><?= htmlspecialchars($req, ENT_QUOTES, 'UTF-8') ?></li>
              <?php endforeach; ?>
            </ul>
            <a href="mailto:info@garten2000-handewitt.de?subject=<?= rawurlencode($job['subject']) ?>"
               class="btn btn-primary">
              Jetzt bewerben
            </a>
          </article>
        <?php endforeach; ?>

        <!-- Initiativbewerbung -->
        <article class="job-card job-card-initiative reveal" aria-label="Initiativbewerbung">
          <h3>Initiativbewerbung</h3>
          <p class="job-text">
            Kein passendes Angebot dabei? Kein Problem! Wir freuen uns jederzeit über Initiativbewerbungen
            von engagierten Menschen, die unser Team bereichern möchten.
          </p>
          <ul class="job-requirements" aria-label="Was wir uns wünschen">
            <li>Leidenschaft für Garten, Natur oder Floristik</li>
            <li>Teamgeist und Engagement</li>
            <li>Freude am Umgang mit Kunden</li>
          </ul>
          <a href="mailto:info@garten2000-handewitt.de?subject=<?= rawurlencode('Initiativbewerbung') ?>"
             class="btn btn-accent">
            Initiativ bewerben
          </a>
        </article>
      </div><!-- /.jobs-grid -->

      <!-- Info box -->
      <div class="card mt-2xl reveal" style="background:var(--soft);border:none;max-width:700px;">
        <h3 style="color:var(--primary);margin-bottom:.75rem;">Ausbildungsbetrieb seit 2004</h3>
        <p style="color:var(--text-muted);">
          Garten2000+mehr ist ein anerkannter Ausbildungsbetrieb. Wir bilden seit über 20 Jahren
          junge Gärtnerinnen und Gärtner aus und legen großen Wert auf eine praxisnahe, fundierte
          Ausbildung. Werden Sie Teil unserer Erfolgsgeschichte!
        </p>
        <a href="/?page=kontakt" class="btn btn-primary mt-md">Kontakt aufnehmen</a>
      </div>

    </div><!-- /.container -->
  </section>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="/assets/js/main.js?v=<?= rawurlencode($mainJsVersion) ?>"></script>
</body>
</html>
