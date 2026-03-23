<?php
// $pageTitle, $pageDescription, $canonicalPath are set by the calling page
$pageTitle       = $pageTitle       ?? 'Garten2000+mehr – Ihr Gartencenter in Handewitt';
$pageDescription = $pageDescription ?? 'Pflanzen, Blumen, Floristik und Dekoration im Gartenfachgeschäft Garten2000+mehr in Handewitt.';
$canonicalPath   = $canonicalPath   ?? '/';
$styleCssVersion    = (string) (@filemtime(__DIR__ . '/../assets/css/style.css')    ?: time());
$seasonCssVersion   = (string) (@filemtime(__DIR__ . '/../assets/css/seasonal.css')  ?: time());
$mainJsVersion      = (string) (@filemtime(__DIR__ . '/../assets/js/main.js')        ?: time());
$seasonJsVersion    = (string) (@filemtime(__DIR__ . '/../assets/js/season.js')      ?: time());

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
  <!--
    Season bootstrap: sets data-season on <html> before CSS is painted so there
    is no flash of wrong seasonal styles. Mirrors detectSeasonByDate() in season.js.
    Month ranges: spring=3-5, summer=6-8, autumn=9-11, winter=12-2
  -->
  <script>(function(){try{var s=localStorage.getItem('g2k_season');if(s&&/^(spring|summer|autumn|winter)$/.test(s)){document.documentElement.setAttribute('data-season',s);return;}}catch(e){}var m=new Date().getMonth()+1;document.documentElement.setAttribute('data-season',m>=3&&m<=5?'spring':m>=6&&m<=8?'summer':m>=9&&m<=11?'autumn':'winter');}());</script>
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= htmlspecialchars(asset_url('css/style.css'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($styleCssVersion) ?>">
  <link rel="stylesheet" href="<?= htmlspecialchars(asset_url('css/seasonal.css'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($seasonCssVersion) ?>">
  <!-- Season script (deferred – no render block) -->
  <script defer src="<?= htmlspecialchars(asset_url('js/season.js'), ENT_QUOTES, 'UTF-8') ?>?v=<?= rawurlencode($seasonJsVersion) ?>"></script>
  <!-- Google Fonts: Lora (headings) + Inter (body) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Preconnect for maps -->
  <link rel="preconnect" href="https://maps.google.com">
</head>
<body>
<a href="#main-content" class="skip-to-content">Zum Inhalt springen</a>
