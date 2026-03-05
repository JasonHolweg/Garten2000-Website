# Garten2000-Website
Webseite von Garten2000 V2

## Garten2000+mehr – Offizielle Website

Moderne Website für das Gartenfachgeschäft **Garten2000+mehr GmbH & Co. KG** in Handewitt.  
Kein Framework, kein Build-Step – direkt auf einen PHP-Webserver legen und starten.

## Anforderungen

- PHP 7.4 oder neuer
- Ein Webserver (Apache, Nginx, oder `php -S localhost:8080`)

## Schnellstart

```bash
php -S localhost:8080
# Browser öffnen: http://localhost:8080
```

## Deployment-Hinweise

### Kontaktformular (E-Mail)
Das Kontaktformular ist vollständig implementiert, aber **der `mail()`-Aufruf ist standardmäßig auskommentiert**.  
Sobald der Mailserver auf dem Produktiv-Host konfiguriert ist, muss in `pages/kontakt.php` die Zeile

```php
// mail($to, $mailSubj, $mailBody, $headers);
```

einkommentiert werden. Bis dahin werden Formular-Einsendungen validiert und als erfolgreich bestätigt, **aber keine E-Mail verschickt**.

### Bilder
Die `assets/img/`-Verzeichnis enthält SVG-Platzhalter. Diese vor dem Go-Live durch echte Fotos ersetzen (JPEG/WebP empfohlen, gleiche Dateinamen).

### Datenschutz / Impressum
Die Datenschutzerklärung sollte vor dem Go-Live juristisch geprüft werden (Hinweis ist im Seiteninhalt enthalten).

## Seitenstruktur

| URL | Seite |
|-----|-------|
| `/` | Startseite |
| `/?page=ueber-uns` | Über uns (Timeline) |
| `/?page=jobs` | Stellenangebote |
| `/?page=kontakt` | Kontakt + Formular |
| `/?page=impressum` | Impressum |
| `/?page=datenschutz` | Datenschutz |
