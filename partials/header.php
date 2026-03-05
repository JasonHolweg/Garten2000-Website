<?php $currentPage = $_GET['page'] ?? 'home'; ?>
<header class="site-header" id="site-header">
  <div class="container header-inner">
    <a href="/" class="logo-link" aria-label="Garten2000+mehr – Startseite">
      <img src="/assets/img/logo.png" alt="Garten2000+mehr Logo" class="logo-img" width="200" height="52">
    </a>

    <button class="nav-toggle" id="nav-toggle"
            aria-expanded="false"
            aria-controls="main-nav"
            aria-label="Navigation öffnen">
      <span class="hamburger-bar"></span>
      <span class="hamburger-bar"></span>
      <span class="hamburger-bar"></span>
    </button>

    <nav class="main-nav" id="main-nav" aria-label="Hauptnavigation">
      <ul class="nav-list">
        <li><a href="/"                  class="nav-link <?= ($currentPage === 'home')        ? 'active' : '' ?>">Startseite</a></li>
        <li><a href="/?page=ueber-uns"   class="nav-link <?= ($currentPage === 'ueber-uns')   ? 'active' : '' ?>">Über uns</a></li>
        <li><a href="/?page=jobs"        class="nav-link <?= ($currentPage === 'jobs')         ? 'active' : '' ?>">Jobs</a></li>
        <li><a href="/?page=kontakt"     class="nav-link <?= ($currentPage === 'kontakt')      ? 'active' : '' ?>">Kontakt</a></li>
        <li><a href="/?page=impressum"   class="nav-link <?= ($currentPage === 'impressum')    ? 'active' : '' ?>">Impressum</a></li>
        <li><a href="/?page=datenschutz" class="nav-link <?= ($currentPage === 'datenschutz') ? 'active' : '' ?>">Datenschutz</a></li>
      </ul>
    </nav>
  </div>
  <div class="nav-backdrop" id="nav-backdrop" aria-hidden="true"></div>
</header>
