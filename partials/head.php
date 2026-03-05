<?php
// $pageTitle, $pageDescription, $canonicalPath are set by the calling page
$pageTitle       = $pageTitle       ?? 'Garten2000+mehr – Ihr Gartencenter in Handewitt';
$pageDescription = $pageDescription ?? 'Pflanzen, Blumen, Floristik und Dekoration im Gartenfachgeschäft Garten2000+mehr in Handewitt.';
$canonicalPath   = $canonicalPath   ?? '/';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <!-- OpenGraph -->
  <meta property="og:title"       content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:type"        content="website">
  <meta property="og:locale"      content="de_DE">
  <meta property="og:site_name"   content="Garten2000+mehr">
  <!-- Canonical -->
  <link rel="canonical" href="<?= htmlspecialchars($canonicalPath, ENT_QUOTES, 'UTF-8') ?>">
  <!-- Favicon -->
  <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <!-- Preconnect for maps -->
  <link rel="preconnect" href="https://maps.google.com">
</head>
<body>
<a href="#main-content" class="skip-to-content">Zum Inhalt springen</a>
