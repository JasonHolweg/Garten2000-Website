<?php
// $pageTitle, $pageDescription, $canonicalPath are set by the calling page
$pageTitle       = $pageTitle       ?? 'Garten2000+mehr – Ihr Gartencenter in Handewitt';
$pageDescription = $pageDescription ?? 'Pflanzen, Blumen, Floristik und Dekoration im Gartenfachgeschäft Garten2000+mehr in Handewitt.';
$canonicalPath   = $canonicalPath   ?? '/';
$styleCssVersion = (string) (@filemtime(__DIR__ . '/../assets/css/style.css') ?: time());
$mainJsVersion   = (string) (@filemtime(__DIR__ . '/../assets/js/main.js') ?: time());

$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
$basePath = rtrim(dirname($scriptName), '/.');

if (!function_exists('site_url')) {
  function site_url(string $path = ''): string
  {
    global $basePath;

    $base = $basePath !== '' ? $basePath : '';
    if ($path === '' || $path === '/') {
      return ($base === '' ? '/' : $base . '/');
    }
    if ($path[0] === '?') {
      return ($base === '' ? '/' : $base . '/') . $path;
    }

    return ($base === '' ? '' : $base) . '/' . ltrim($path, '/');
  }
}

if (!function_exists('asset_url')) {
  function asset_url(string $path): string
  {
    return site_url('assets/' . ltrim($path, '/'));
  }
}

$canonicalHref = preg_match('#^https?://#i', $canonicalPath)
  ? $canonicalPath
  : site_url($canonicalPath);
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
  <link rel="canonical" href="<?= htmlspecialchars($canonicalHref, ENT_QUOTES, 'UTF-8') ?>">
  <!-- Favicon -->
  <link rel="icon" href="<?= htmlspecialchars(asset_url('img/favicon.svg'), ENT_QUOTES, 'UTF-8') ?>" type="image/svg+xml">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?= htmlspecialchars(asset_url('css/style.css'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($styleCssVersion) ?>">
  <!-- Preconnect for maps -->
  <link rel="preconnect" href="https://maps.google.com">
</head>
<body>
<a href="#main-content" class="skip-to-content">Zum Inhalt springen</a>
