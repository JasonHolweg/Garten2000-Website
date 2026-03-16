<?php
declare(strict_types=1);

$pageTitle       = 'Beratung & Service – Garten2000+mehr';
$pageDescription = 'Persönliche Pflanzenberatung, Floristik-Service, kostenlose E-Auto-Ladestationen und mehr bei Garten2000+mehr in Handewitt.';
$canonicalPath   = '/?page=beratung';

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/header.php';

$services = [
    [
        'icon'  => '🌿',
        'title' => 'Persönliche Pflanzenberatung',
        'text'  => 'Unsere ausgebildeten Gärtnerinnen und Gärtner helfen Ihnen bei der Auswahl der richtigen Pflanzen für Ihren Standort – drinnen, draußen, schattig oder sonnig. Kein Chatbot, keine Hotline – einfach persönlich vor Ort.',
    ],
    [
        'icon'  => '💐',
        'title' => 'Floristik & Gestaltung',
        'text'  => 'Ob Brautstrauß, Trauergesteck, Geburtstagsarrangement oder dekorativer Türkranz für die Haustür – unsere Floristinnen gestalten für Sie mit frischen Blumen und viel Kreativität.',
    ],
    [
        'icon'  => '🎁',
        'title' => 'Geschenkberatung',
        'text'  => 'Sie suchen ein Geschenk, das bleibt? Wir helfen Ihnen, die passende Pflanze, den schönen Topf oder das perfekte Floralarrangement für Geburtstage, Jubiläen und besondere Anlässe zu finden.',
    ],
    [
        'icon'  => '⚡',
        'title' => 'Kostenlose E-Auto-Ladestationen',
        'text'  => 'Laden Sie Ihr Elektrofahrzeug kostenlos während Ihres Besuchs. Wir haben vier Ladestationen auf unserem Gelände, die zu unseren Öffnungszeiten frei zugänglich sind.',
    ],
    [
        'icon'  => '🎓',
        'title' => 'Ausbildung & Praktika',
        'text'  => 'Als anerkannter Ausbildungsbetrieb seit 2004 bilden wir Gärtnerinnen und Gärtner aus. Interessiert an einer Ausbildung oder einem Praktikum? Wir freuen uns auf Ihre Anfrage.',
    ],
    [
        'icon'  => '♻️',
        'title' => 'Nachhaltigkeit & Solar',
        'text'  => 'Seit 2018 erzeugen Solaranlagen auf unserem Gelände sauberen Strom. Nachhaltigkeit ist für uns keine Marketingphrase – sie ist Teil unseres Alltags in Handewitt.',
    ],
];

$faqs = [
    [
        'q' => 'Kann ich Pflanzen vorbestellen?',
        'a' => 'Ja – rufen Sie uns an oder schreiben Sie uns. Bei größeren Mengen oder speziellen Wünschen reservieren wir gerne Pflanzen für Sie.',
    ],
    [
        'q' => 'Machen Sie auch Lieferungen?',
        'a' => 'Für private Kunden bieten wir in der Region Handewitt auf Anfrage Lieferungen an. Sprechen Sie uns gerne an.',
    ],
    [
        'q' => 'Nehmen Sie alte Töpfe oder Erde zurück?',
        'a' => 'Leere Pflanztöpfe aus unserem Sortiment können Sie gerne wieder mitbringen – wir freuen uns über jeden Beitrag zur Wiederverwendung.',
    ],
    [
        'q' => 'Bieten Sie auch Gartenpflege an?',
        'a' => 'Die Gartengestaltung und -pflege liegt nicht in unserem direkten Angebot, aber wir empfehlen Ihnen gerne lokale Fachbetriebe aus der Region.',
    ],
    [
        'q' => 'Können Pflanzen umgetauscht werden?',
        'a' => 'Bei offensichtlichen Qualitätsmängeln sprechen Sie uns direkt an – wir finden gemeinsam eine Lösung. Pflanzen sind Lebewesen, daher können wir keinen pauschalen Umtausch garantieren.',
    ],
];
?>

<main id="main-content">

  <!-- Page Hero -->
  <div class="page-hero">
    <div class="container">
      <span class="seasonal-badge" style="margin-bottom:1rem;">🤝 Persönlich & kompetent</span>
      <h1>Beratung &amp; Service</h1>
      <p>Echte Fachkenntnis, echte Menschen – wir sind für Sie da.</p>
    </div>
  </div>

  <!-- Services -->
  <section class="section" aria-label="Unsere Services">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Was wir für Sie tun</h2>
        <p class="section-subtitle reveal">Mehr als nur verkaufen – wir begleiten Sie auf Ihrem grünen Weg.</p>
      </div>

      <div class="services-grid">
        <?php foreach ($services as $svc): ?>
          <div class="service-card reveal">
            <div class="service-card-icon" aria-hidden="true"><?= htmlspecialchars($svc['icon'], ENT_QUOTES, 'UTF-8') ?></div>
            <h3><?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p><?= htmlspecialchars($svc['text'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        <?php endforeach; ?>
      </div>

    </div><!-- /.container -->
  </section>

  <!-- Opening Hours in Context -->
  <section class="section" style="background-color:var(--soft);" aria-label="Wann können Sie uns besuchen">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Kommen Sie einfach vorbei</h2>
        <p class="section-subtitle reveal">Persönliche Beratung gibt es bei uns zu den Öffnungszeiten – keine Terminbuchung nötig.</p>
      </div>

      <div class="hours-grid reveal">
        <div class="hours-card">
          <h3>Öffnungszeiten</h3>
          <p data-open-status aria-live="polite">Status wird geladen …</p>
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
            <a href="tel:+494619330" class="btn btn-primary">Jetzt anrufen</a>
            <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost-dark">Nachricht senden</a>
          </div>
        </div>

        <div>
          <div class="map-wrapper" style="aspect-ratio:4/3;">
            <iframe
              src="https://maps.google.com/maps?q=Altholzkrug+40,+24976+Handewitt&output=embed"
              title="Standort auf Google Maps"
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

  <!-- FAQ -->
  <section class="section" aria-label="Häufige Fragen">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Häufige Fragen</h2>
        <p class="section-subtitle reveal">Kurze Antworten auf die Fragen, die uns oft erreichen.</p>
      </div>

      <div style="max-width:800px;margin-inline:auto;">
        <?php foreach ($faqs as $idx => $faq): ?>
          <div class="card reveal" style="margin-bottom:var(--space-md);">
            <h3 style="font-size:var(--font-size-lg);color:var(--primary);margin-bottom:var(--space-sm);">
              <?= htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8') ?>
            </h3>
            <p style="color:var(--text-muted);margin:0;">
              <?= htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8') ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA Band -->
  <div class="cta-band" aria-label="Kontakt aufnehmen">
    <div class="container">
      <h2 class="reveal">Noch Fragen? Wir helfen gerne.</h2>
      <p class="reveal">
        Rufen Sie uns an, schreiben Sie uns – oder kommen Sie einfach vorbei.
        Wir sind für Sie da.
      </p>
      <div class="cta-band-actions reveal">
        <a href="tel:+494619330" class="btn btn-accent">+49 461 93300</a>
        <a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost">Kontaktformular</a>
      </div>
    </div>
  </div>

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="<?= htmlspecialchars(asset_url('js/main.js'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($mainJsVersion) ?>"></script>
</body>
</html>
