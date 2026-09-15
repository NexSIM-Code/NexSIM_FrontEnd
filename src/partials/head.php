<?php
/**
 * En-tête HTML commun.
 * Variables attendues : $pageTitle, $pageDescription, $canonical, $isHome (bool),
 * $noindex (bool, optionnel). La langue et le thème sont résolus côté serveur par
 * includes/bootstrap.php, inclus en tête de chaque page.
 */
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/modules.php';
require_once __DIR__ . '/../includes/assets.php';

$pageTitle = $pageTitle ?? t('seo.home.title');
$pageDescription = $pageDescription ?? t('seo.home.description');
$canonical = $canonical ?? 'https://www.nexsim.fr/';
$isHome = $isHome ?? false;
$noindex = $noindex ?? false;

$langMeta = nexsim_lang_meta();
$alternates = nexsim_alternates($canonical);

/* Chaînes nécessaires au JavaScript : le panneau des modules et le bouton de thème
   sont pilotés côté client et doivent suivre la langue de la page. */
$jsI18n = [
    'lang' => nexsim_lang(),
    'cookie' => ['theme' => NEXSIM_COOKIE_THEME, 'maxAge' => NEXSIM_COOKIE_TTL],
    'theme' => ['light' => t('nav.theme.light'), 'dark' => t('nav.theme.dark')],
];
if ($isHome) {
    foreach (nexsim_modules() as $key => $module) {
        $jsI18n['modules'][$key] = [
            'title' => $module['title'],
            'desc' => $module['desc'],
            'points' => $module['points'],
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars(nexsim_lang()) ?>"<?= $nexsimTheme === 'light' ? ' data-theme="light"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="<?= $nexsimTheme === 'light' ? '#E4ECF1' : '#13212B' ?>">

    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
    <?php foreach ($alternates as $hreflang => $href): ?>
    <link rel="alternate" hreflang="<?= htmlspecialchars($hreflang) ?>" href="<?= htmlspecialchars($href) ?>">
    <?php endforeach; ?>
    <?php if ($noindex): ?>
    <meta name="robots" content="noindex, follow">
    <?php else: ?>
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <?php endif; ?>
    <meta name="google-site-verification" content="KjI3msHzOdGMSiN_H8r7V6Dy7Gt18m67kyVdILfri4w"/>

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.nexsim.fr/videos/poster.jpg">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="1080">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="<?= e('seo.og.image.alt') ?>">
    <meta property="og:site_name" content="Nexsim">
    <meta property="og:locale" content="<?= htmlspecialchars($langMeta['locale']) ?>">
    <?php foreach (NEXSIM_LANGS as $code => $meta): if ($code !== nexsim_lang()): ?>
    <meta property="og:locale:alternate" content="<?= htmlspecialchars($meta['locale']) ?>">
    <?php endif; endforeach; ?>

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta name="twitter:image" content="https://www.nexsim.fr/videos/poster.jpg">
    <meta name="twitter:site" content="@nexsim_fr">

    <!-- Resource hints : la police latine est le seul asset du chemin critique
         (le CSS est intégré au document, cf. includes/assets.php). -->
    <link rel="preload" as="font" type="font/woff2" href="/fonts/open-sans-latin.woff2" crossorigin>
    <?php if ($isHome): ?>
    <link rel="preload" as="image" href="videos/poster.jpg">
    <?php endif; ?>

    <!-- Préférences de l'interface, résolues côté serveur (langue + thème) -->
    <script id="nexsim-i18n" type="application/json"><?= json_encode($jsI18n, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
    <!-- Reprise de l'ancien thème mémorisé en localStorage : converti en cookie une seule fois. -->
    <script>
        try {
            if (!/(?:^|;\s*)nexsim_theme=/.test(document.cookie)) {
                var legacy = localStorage.getItem('nexsim-theme');
                if (legacy === 'light' || legacy === 'dark') {
                    document.cookie = 'nexsim_theme=' + legacy + ';path=/;max-age=31536000;samesite=lax' + (location.protocol === 'https:' ? ';secure' : '');
                    if (legacy === 'light') document.documentElement.setAttribute('data-theme', 'light');
                    else document.documentElement.removeAttribute('data-theme');
                }
                localStorage.removeItem('nexsim-theme');
            }
        } catch (e) {}
    </script>

    <!-- CSS intégré (Open Sans auto-hébergé, déclaré dans css/style.css) -->
    <style><?= nexsim_inline_css('css/style.css') ?></style>
    <script src="scripts/animations.js" defer></script>
