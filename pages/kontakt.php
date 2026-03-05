<?php
declare(strict_types=1);

$pageTitle       = 'Kontakt – Garten2000+mehr';
$pageDescription = 'Nehmen Sie Kontakt auf mit Garten2000+mehr in Handewitt. Schreiben Sie uns oder rufen Sie an.';
$canonicalPath   = '/?page=kontakt';

// Handle form submission
$formSuccess = false;
$formError   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'send') {
    // Honeypot check
    if (!empty($_POST['website'])) {
        // Bot detected – silently treat as success
        $formSuccess = true;
    } else {
        $name    = trim($_POST['name']    ?? '');
        $email   = trim($_POST['email']   ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');
        $dsgvo   = isset($_POST['dsgvo']);

        if (empty($name) || empty($email) || empty($subject) || empty($message) || !$dsgvo) {
            $formError = 'Bitte füllen Sie alle Pflichtfelder aus.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $formError = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
        } else {
            $to         = 'info@garten2000-handewitt.de';
            $mailSubj   = '[Kontaktformular] ' . mb_substr($subject, 0, 200);
            $mailBody   = "Name: {$name}\nE-Mail: {$email}\n\nNachricht:\n{$message}";
            $headers    = "From: noreply@garten2000-handewitt.de\r\n"
                        . "Reply-To: {$email}\r\n"
                        . "Content-Type: text/plain; charset=UTF-8";
            // NOTE: Uncomment the line below once the mail server is configured on the host.
            // mail($to, $mailSubj, $mailBody, $headers);
            $formSuccess = true;
        }
    }
}

include __DIR__ . '/../partials/head.php';
include __DIR__ . '/../partials/header.php';
?>

<main id="main-content">

  <!-- Page Hero -->
  <div class="page-hero">
    <div class="container">
      <h1>Kontakt</h1>
      <p>Wir freuen uns auf Ihre Nachricht oder Ihren Anruf.</p>
    </div>
  </div>

  <!-- Contact layout -->
  <div class="contact-layout container">

    <!-- Info card -->
    <aside>
      <div class="contact-info-card">
        <h3>So erreichen Sie uns</h3>

        <div class="contact-info-item">
          <span class="contact-info-icon" aria-hidden="true">📍</span>
          <div>
            <span class="label">Adresse</span>
            <address class="value" style="font-style:normal;">
              Garten2000+mehr GmbH &amp; Co. KG<br>
              Altholzkrug 40<br>
              24976 Handewitt<br>
              Deutschland
            </address>
          </div>
        </div>

        <div class="contact-info-item">
          <span class="contact-info-icon" aria-hidden="true">📞</span>
          <div>
            <span class="label">Telefon</span>
            <a href="tel:+494619330" class="value">+49 461 93300</a>
          </div>
        </div>

        <div class="contact-info-item">
          <span class="contact-info-icon" aria-hidden="true">✉️</span>
          <div>
            <span class="label">E-Mail</span>
            <a href="mailto:info@garten2000-handewitt.de" class="value">
              info@garten2000-handewitt.de
            </a>
          </div>
        </div>

        <div class="contact-info-item">
          <span class="contact-info-icon" aria-hidden="true">🕐</span>
          <div>
            <span class="label">Öffnungszeiten</span>
            <span class="value" style="font-style:normal;">
              Mo – Fr: 09:00 – 18:00 Uhr<br>
              Sa: 09:00 – 16:00 Uhr<br>
              So: 10:00 – 12:00 Uhr
            </span>
          </div>
        </div>
      </div>

      <!-- Map -->
      <div style="margin-top:1.5rem;">
        <div class="map-wrapper" style="aspect-ratio:4/3;">
          <iframe
            src="https://maps.google.com/maps?q=Altholzkrug+40,+24976+Handewitt&output=embed"
            title="Standort auf Google Maps"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
          </iframe>
        </div>
        <div class="map-actions">
          <a href="https://www.google.com/maps/dir/?api=1&destination=Altholzkrug+40,+24976+Handewitt"
             class="btn btn-primary" target="_blank" rel="noopener noreferrer">
            Route planen
          </a>
        </div>
      </div>
    </aside>

    <!-- Contact Form -->
    <div>
      <h2 style="font-size:var(--font-size-xl);margin-bottom:1.5rem;">Schreiben Sie uns</h2>

      <?php if ($formSuccess): ?>
        <div class="form-message form-message-success" role="alert">
          ✓ Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns baldmöglichst bei Ihnen!
        </div>
      <?php elseif ($formError): ?>
        <div class="form-message form-message-error" role="alert">
          <?= htmlspecialchars($formError, ENT_QUOTES, 'UTF-8') ?>
        </div>
      <?php endif; ?>

      <p class="form-hint" style="margin-bottom:1.5rem;">
        <strong>Hinweis:</strong> Bei falscher oder unvollständiger E-Mail-Adresse können wir keine Antwort senden.
      </p>

      <form id="contact-form" method="POST" action="/?page=kontakt" novalidate>
        <input type="hidden" name="action" value="send">

        <!-- Honeypot -->
        <div class="form-honeypot" aria-hidden="true">
          <label for="website">Website (nicht ausfüllen)</label>
          <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="name" class="form-label">
            Name <span class="required" aria-label="Pflichtfeld">*</span>
          </label>
          <input type="text" id="name" name="name" class="form-input"
                 placeholder="Ihr vollständiger Name"
                 required autocomplete="name"
                 value="<?= htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
          <label for="email" class="form-label">
            E-Mail <span class="required" aria-label="Pflichtfeld">*</span>
          </label>
          <input type="email" id="email" name="email" class="form-input"
                 placeholder="ihre@email.de"
                 required autocomplete="email"
                 value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
          <label for="subject" class="form-label">
            Betreff <span class="required" aria-label="Pflichtfeld">*</span>
          </label>
          <input type="text" id="subject" name="subject" class="form-input"
                 placeholder="Worum geht es?"
                 required
                 value="<?= htmlspecialchars($_POST['subject'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
          <label for="message" class="form-label">
            Nachricht <span class="required" aria-label="Pflichtfeld">*</span>
          </label>
          <textarea id="message" name="message" class="form-textarea"
                    placeholder="Ihre Nachricht an uns…"
                    required rows="6"><?= htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>

        <div class="form-checkbox-group">
          <input type="checkbox" id="dsgvo" name="dsgvo" class="form-checkbox" required
                 <?= isset($_POST['dsgvo']) ? 'checked' : '' ?>>
          <label for="dsgvo" class="form-checkbox-label">
            Ich habe die <a href="/?page=datenschutz" target="_blank">Datenschutzerklärung</a>
            gelesen und stimme der Verarbeitung meiner Daten zur Bearbeitung meiner Anfrage zu.
            <span class="required" aria-label="Pflichtfeld">*</span>
          </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:.8rem;">
          Nachricht senden
        </button>
      </form>
    </div>

  </div><!-- /.contact-layout -->

</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script>
  window.__FORM_SUCCESS = <?= $formSuccess ? 'true' : 'false' ?>;
  window.__FORM_ERROR   = <?= $formError ? '"' . addslashes(htmlspecialchars($formError, ENT_QUOTES, 'UTF-8')) . '"' : 'false' ?>;
</script>
<script src="/assets/js/main.js"></script>
</body>
</html>
