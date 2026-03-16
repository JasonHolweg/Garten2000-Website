<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-grid">

      <!-- Col 1: About / Logo -->
      <div class="footer-col">
        <img src="<?= htmlspecialchars(asset_url('img/logo.png'), ENT_QUOTES, 'UTF-8') ?>" alt="Garten2000+mehr Logo" style="max-height:48px;margin-bottom:1rem;opacity:.85;">
        <p>Ihr Gartenfachgeschäft in Handewitt – Pflanzen, Floristik, Deko und mehr seit 1976.</p>
        <div class="footer-gallery" style="margin-top:1rem;" aria-label="Impressionen">
          <div class="footer-thumb"><img src="<?= htmlspecialchars(asset_url('img/gallery-1.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Pflanzen" loading="lazy"></div>
          <div class="footer-thumb"><img src="<?= htmlspecialchars(asset_url('img/gallery-2.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Floristik" loading="lazy"></div>
          <div class="footer-thumb"><img src="<?= htmlspecialchars(asset_url('img/gallery-3.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Deko" loading="lazy"></div>
          <div class="footer-thumb"><img src="<?= htmlspecialchars(asset_url('img/gallery-4.svg'), ENT_QUOTES, 'UTF-8') ?>" alt="Garten" loading="lazy"></div>
        </div>
      </div>

      <!-- Col 2: Opening Hours -->
      <div class="footer-col">
        <h4>Öffnungszeiten</h4>
        <ul class="footer-hours-list">
          <li><span class="day">Mo – Fr</span><span>09:00 – 18:00</span></li>
          <li><span class="day">Samstag</span><span>09:00 – 16:00</span></li>
          <li><span class="day">Sonntag</span><span>10:00 – 12:00</span></li>
        </ul>
      </div>

      <!-- Col 3: Contact -->
      <div class="footer-col">
        <h4>Kontakt</h4>
        <address>
          <p>Garten2000+mehr GmbH &amp; Co. KG<br>
          Altholzkrug 40<br>
          24976 Handewitt<br>
          Deutschland</p>
          <p>
            <a href="tel:+494619330">Tel: +49 461 93300</a><br>
            <a href="mailto:info@garten2000-handewitt.de">info@garten2000-handewitt.de</a>
          </p>
        </address>
      </div>

      <!-- Col 4: Navigation -->
      <div class="footer-col">
        <h4>Navigation</h4>
        <nav aria-label="Footer-Navigation">
          <ul style="display:flex;flex-direction:column;gap:.4rem;">
            <li><a href="<?= htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8') ?>">Startseite</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=sortiment'), ENT_QUOTES, 'UTF-8') ?>">Sortiment</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=inspiration'), ENT_QUOTES, 'UTF-8') ?>">Inspiration</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=beratung'), ENT_QUOTES, 'UTF-8') ?>">Beratung</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=ueber-uns'), ENT_QUOTES, 'UTF-8') ?>">Über uns</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=jobs'), ENT_QUOTES, 'UTF-8') ?>">Jobs</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=kontakt'), ENT_QUOTES, 'UTF-8') ?>">Kontakt</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=impressum'), ENT_QUOTES, 'UTF-8') ?>">Impressum</a></li>
            <li><a href="<?= htmlspecialchars(site_url('?page=datenschutz'), ENT_QUOTES, 'UTF-8') ?>">Datenschutz</a></li>
          </ul>
        </nav>
      </div>

    </div><!-- /.footer-grid -->
  </div><!-- /.container -->

  <!-- Bottom bar -->
  <div class="footer-bottom">
    <div class="container" style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:.75rem;">
      <span>&copy; <?= date('Y') ?> Garten2000+mehr GmbH &amp; Co. KG. Alle Rechte vorbehalten.</span>
      <nav class="footer-legal-links" aria-label="Rechtliches">
        <a href="<?= htmlspecialchars(site_url('?page=impressum'), ENT_QUOTES, 'UTF-8') ?>">Impressum</a>
        <a href="<?= htmlspecialchars(site_url('?page=datenschutz'), ENT_QUOTES, 'UTF-8') ?>">Datenschutz</a>
      </nav>
    </div>
  </div>
</footer>
