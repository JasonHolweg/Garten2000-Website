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

  <!-- ============================================================
       STANDORT-RATGEBER: Sonne / Halbschatten / Schatten
       ============================================================ -->
  <section class="section section-soft" aria-label="Standort-Ratgeber">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Standort-Ratgeber</h2>
        <p class="section-subtitle reveal">
          Welche Pflanze passt wohin? Die Lichtverhältnisse im Garten entscheiden über Erfolg oder Misserfolg.
        </p>
      </div>
      <div class="standort-grid">

        <div class="standort-card reveal">
          <span class="standort-icon" aria-hidden="true">☀️</span>
          <h3>Volle Sonne</h3>
          <p>Mindestens 6 Stunden direkte Sonneneinstrahlung täglich. Ideal für Mittelmeer-Pflanzen,
             Rosen, Lavendel und viele Gemüsesorten.</p>
          <ul class="standort-plant-list" aria-label="Pflanzen für volle Sonne">
            <li>Lavendel, Rosmarin, Salbei</li>
            <li>Rosen, Sonnenhut (Echinacea)</li>
            <li>Tomaten, Paprika, Zucchini</li>
            <li>Bougainvillea, Oleander</li>
            <li>Phlox, Cosmea, Tagetes</li>
          </ul>
        </div>

        <div class="standort-card reveal reveal-delay-1">
          <span class="standort-icon" aria-hidden="true">🌤️</span>
          <h3>Halbschatten</h3>
          <p>2–6 Stunden Sonne täglich. Ein breites Spektrum an Pflanzen gedeiht hier prächtig –
             der ideale Kompromiss für gemischte Beete.</p>
          <ul class="standort-plant-list" aria-label="Pflanzen für Halbschatten">
            <li>Hortensien, Fuchsien</li>
            <li>Funkie (Hosta), Astilbe</li>
            <li>Farn, Impatiens (Fleißiges Lieschen)</li>
            <li>Kletterrosen (einige Sorten)</li>
            <li>Salat, Spinat, Mangold</li>
          </ul>
        </div>

        <div class="standort-card reveal reveal-delay-2">
          <span class="standort-icon" aria-hidden="true">🌑</span>
          <h3>Schatten</h3>
          <p>Weniger als 2 Stunden direkte Sonne. Manche Pflanzen lieben genau das –
             wir zeigen Ihnen, wie ein Schattengarten wunderschön werden kann.</p>
          <ul class="standort-plant-list" aria-label="Pflanzen für Schatten">
            <li>Funkie (Hosta), Elfenblume</li>
            <li>Waldmeister, Bärlauch</li>
            <li>Rhododendron, Aucuba</li>
            <li>Maiglöckchen, Buschwindröschen</li>
            <li>Efeu, Kletterpflanze für Schatten</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       GARTENTYPEN: Balkon / Beet / Hochbeet / Rasen
       ============================================================ -->
  <section class="section" aria-label="Gartentypen-Ratgeber">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Für jeden Gartentyp das Richtige</h2>
        <p class="section-subtitle reveal">
          Ob kleiner Balkon oder großes Beet – wir begleiten Sie bei der Gestaltung.
        </p>
      </div>
      <div class="gartentyp-grid">

        <div class="gartentyp-card reveal">
          <div class="gartentyp-img" aria-hidden="true">🪴</div>
          <div class="gartentyp-body">
            <h3>Balkon &amp; Terrasse</h3>
            <p>
              Auch auf kleinstem Raum lässt sich ein Pflanzparadies schaffen. Mit dem richtigen
              Substrat, passenden Kübeln und einer Auswahl an kompakten Pflanzen wird Ihr Balkon
              zur Oase. Wir helfen bei der Planung und liefern alle Pflanzen aus einer Hand.
            </p>
            <div class="gartentyp-tags">
              <span class="gartentyp-tag">🌺 Geranien</span>
              <span class="gartentyp-tag">🌿 Kräuter</span>
              <span class="gartentyp-tag">🍃 Clematis</span>
              <span class="gartentyp-tag">🌻 Petunien</span>
              <span class="gartentyp-tag">🍅 Tomaten</span>
            </div>
          </div>
        </div>

        <div class="gartentyp-card reveal reveal-delay-1">
          <div class="gartentyp-img" aria-hidden="true">🌼</div>
          <div class="gartentyp-body">
            <h3>Blumen- &amp; Staudenbeet</h3>
            <p>
              Ein gut geplantes Staudenbeet blüht von März bis November und kommt jedes Jahr
              schöner wieder. Wir zeigen Ihnen, wie Sie Höhe, Farbe und Blütezeit optimal
              kombinieren – für ein Beet, das sich fast von selbst pflegt.
            </p>
            <div class="gartentyp-tags">
              <span class="gartentyp-tag">🌷 Stauden</span>
              <span class="gartentyp-tag">🌸 Rosen</span>
              <span class="gartentyp-tag">💜 Lavendel</span>
              <span class="gartentyp-tag">🌼 Sonnenhut</span>
              <span class="gartentyp-tag">🌿 Gräser</span>
            </div>
          </div>
        </div>

        <div class="gartentyp-card reveal">
          <div class="gartentyp-img" aria-hidden="true">🥕</div>
          <div class="gartentyp-body">
            <h3>Hochbeet</h3>
            <p>
              Das Hochbeet liegt im Trend – und das aus gutem Grund: Es ermöglicht rückenfreundliches
              Gärtnern, heizt sich schneller auf und bietet optimale Bedingungen für Gemüse, Kräuter
              und Salate. Unser Team berät Sie beim Aufbau und der Bepflanzung.
            </p>
            <div class="gartentyp-tags">
              <span class="gartentyp-tag">🥬 Salat</span>
              <span class="gartentyp-tag">🌿 Kräuter</span>
              <span class="gartentyp-tag">🍓 Erdbeeren</span>
              <span class="gartentyp-tag">🥦 Gemüse</span>
              <span class="gartentyp-tag">🌱 Anzucht</span>
            </div>
          </div>
        </div>

        <div class="gartentyp-card reveal reveal-delay-1">
          <div class="gartentyp-img" aria-hidden="true">🌱</div>
          <div class="gartentyp-body">
            <h3>Rasen</h3>
            <p>
              Ein schöner Rasen ist Ergebnis regelmäßiger Pflege: Mähen, Düngen, Lüften und
              Nachsäen. Wir führen Rasensamen, Rasendünger und Vertikutier-Saatgut –
              und geben Ihnen den passenden Pflegeplan für das ganze Jahr mit.
            </p>
            <div class="gartentyp-tags">
              <span class="gartentyp-tag">✂️ Rasensamen</span>
              <span class="gartentyp-tag">💧 Bewässerung</span>
              <span class="gartentyp-tag">🌿 Dünger</span>
              <span class="gartentyp-tag">🛠️ Pflege</span>
              <span class="gartentyp-tag">🌱 Nachsaat</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       PFLANZENKUNDE: bienenfreundlich / winterhart / pflegeleicht
       ============================================================ -->
  <section class="section section-soft" aria-label="Pflanzenkunde">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Pflanzenkunde auf einen Blick</h2>
        <p class="section-subtitle reveal">
          Welche Eigenschaften braucht Ihre Wunschpflanze? Wir helfen Ihnen bei der Auswahl.
        </p>
      </div>
      <div class="pflanzenkunde-grid">

        <div class="pflanzenkunde-card reveal">
          <span class="pflanzenkunde-card-icon" aria-hidden="true">🐝</span>
          <h3>Bienenfreundlich</h3>
          <p>
            Heimische Insekten brauchen unsere Hilfe. Mit blütenreichen, bienenfreundlichen
            Pflanzen leisten Sie einen wertvollen Beitrag zur Artenvielfalt – und Ihr Garten
            wird bunter und lebendiger.
          </p>
          <div class="example-plants">
            <span class="plant-chip">Lavendel</span>
            <span class="plant-chip">Phacelia</span>
            <span class="plant-chip">Sonnenhut</span>
            <span class="plant-chip">Borretsch</span>
            <span class="plant-chip">Thymian</span>
            <span class="plant-chip">Wildblumen</span>
          </div>
        </div>

        <div class="pflanzenkunde-card reveal reveal-delay-1">
          <span class="pflanzenkunde-card-icon" aria-hidden="true">❄️</span>
          <h3>Winterhart</h3>
          <p>
            Winterharte Pflanzen trotzen Frost und kehren jedes Jahr wieder – sie sind die
            Investition, die sich lohnt. Fragen Sie uns nach Sorten, die in Schleswig-Holstein
            zuverlässig überwintern.
          </p>
          <div class="example-plants">
            <span class="plant-chip">Funkie</span>
            <span class="plant-chip">Iris</span>
            <span class="plant-chip">Stauden-Rosen</span>
            <span class="plant-chip">Eibe</span>
            <span class="plant-chip">Kiefer</span>
            <span class="plant-chip">Bergenie</span>
          </div>
        </div>

        <div class="pflanzenkunde-card reveal reveal-delay-2">
          <span class="pflanzenkunde-card-icon" aria-hidden="true">😌</span>
          <h3>Pflegeleicht</h3>
          <p>
            Nicht jeder hat Zeit für tägliche Gartenarbeit. Pflegeleichte Pflanzen brauchen
            wenig Aufmerksamkeit, sehen aber toll aus. Ideal für Berufstätige, Reisende
            und Garten-Einsteiger.
          </p>
          <div class="example-plants">
            <span class="plant-chip">Sedum</span>
            <span class="plant-chip">Agapanthus</span>
            <span class="plant-chip">Sukkulenten</span>
            <span class="plant-chip">Gräser</span>
            <span class="plant-chip">Hortensie</span>
            <span class="plant-chip">Kirschlorbeer</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SAISONALE AUFGABEN: Aufgaben nach Jahreszeit
       ============================================================ -->
  <section class="section" aria-label="Saisonale Gartenaufgaben">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title reveal">Saisonale Aufgaben im Garten</h2>
        <p class="section-subtitle reveal">
          Was steht wann an? Eine kompakte Übersicht für das ganze Gartenjahr.
        </p>
      </div>
      <div class="saisonale-aufgaben">

        <div class="aufgaben-card reveal">
          <div class="aufgaben-card-header spring">
            <span aria-hidden="true">🌸</span> Frühling (März–Mai)
          </div>
          <div class="aufgaben-card-body">
            <ul class="aufgaben-list">
              <li>Beete aufräumen, Unkraut entfernen und Boden lockern</li>
              <li>Stauden, Rosen und Klettergewächse pflanzen</li>
              <li>Blumenzwiebeln der Vorjahre pflegen und düngen</li>
              <li>Sommerpflanzen vorziehen (ab März im Haus)</li>
              <li>Rasen vertikutieren und nachsäen</li>
              <li>Balkonkästen und Kübel neu bepflanzen (nach Frostende)</li>
            </ul>
          </div>
        </div>

        <div class="aufgaben-card reveal reveal-delay-1">
          <div class="aufgaben-card-header summer">
            <span aria-hidden="true">☀️</span> Sommer (Juni–August)
          </div>
          <div class="aufgaben-card-body">
            <ul class="aufgaben-list">
              <li>Regelmäßig gießen – am besten früh morgens</li>
              <li>Kübel und Töpfe täglich kontrollieren (trocknet schnell aus)</li>
              <li>Verblühtes abschneiden für neue Blüten (Deadheading)</li>
              <li>Kräuter ernten und Gemüse regelmäßig pflücken</li>
              <li>Rasen nicht zu kurz mähen (Trockenstress vermeiden)</li>
              <li>Schädlinge beobachten und frühzeitig reagieren</li>
            </ul>
          </div>
        </div>

        <div class="aufgaben-card reveal">
          <div class="aufgaben-card-header autumn">
            <span aria-hidden="true">🍂</span> Herbst (September–November)
          </div>
          <div class="aufgaben-card-body">
            <ul class="aufgaben-list">
              <li>Blumenzwiebeln für Frühjahrsblüte pflanzen (Tulpen, Narzissen)</li>
              <li>Frostempfindliche Pflanzen einräumen oder abdecken</li>
              <li>Beetpflanzen entfernen und Kompost anlegen</li>
              <li>Rasendünger ausbringen (Herbstdünger für starke Wurzeln)</li>
              <li>Kübelpflanzen winterfest machen</li>
              <li>Gartengeräte reinigen und einlagern</li>
            </ul>
          </div>
        </div>

        <div class="aufgaben-card reveal reveal-delay-1">
          <div class="aufgaben-card-header winter">
            <span aria-hidden="true">❄️</span> Winter (Dezember–Februar)
          </div>
          <div class="aufgaben-card-body">
            <ul class="aufgaben-list">
              <li>Zimmerpflanzen gießen – aber weniger als sonst</li>
              <li>Gehölze und Sträucher bei Frost nicht zurückschneiden</li>
              <li>Vogelfütterung: Fettfutter und Körner anbieten</li>
              <li>Gartenplan für die neue Saison erstellen</li>
              <li>Saatkataloge lesen und Bestellungen aufgeben</li>
              <li>Bei starkem Frost Rohre schützen und absperren</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
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
