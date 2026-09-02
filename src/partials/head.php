<?php
/**
 * En-tête HTML commun.
 * Variables attendues : $pageTitle, $pageDescription, $canonical, $isHome (bool), $noindex (bool, optionnel).
 */
$pageTitle = $pageTitle ?? 'Nexsim LuSIM | Simulateur Pulmonaire de Formation Médicale';
$pageDescription = $pageDescription ?? "Découvrez LuSIM par Nexsim, le premier simulateur pulmonaire hybride (VR et physique) conçu pour faciliter la formation en ventilation mécanique.";
$canonical = $canonical ?? 'https://www.nexsim.fr/';
$isHome = $isHome ?? false;
$noindex = $noindex ?? false;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#13212B">

    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
    <link rel="alternate" hreflang="fr" href="<?= htmlspecialchars($canonical) ?>"/>
    <link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($canonical) ?>"/>
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
    <meta property="og:image:alt" content="Simulateur pulmonaire LuSIM par Nexsim">
    <meta property="og:site_name" content="Nexsim">
    <meta property="og:locale" content="fr_FR">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta name="twitter:image" content="https://www.nexsim.fr/videos/poster.jpg">
    <meta name="twitter:site" content="@nexsim_fr">

    <!-- Resource hints -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="css/style.css">
    <?php if ($isHome): ?>
    <link rel="preload" as="image" href="videos/poster.jpg">
    <?php endif; ?>

    <!-- Thème mémorisé : appliqué avant le premier rendu pour éviter le flash -->
    <script>
        try { if (localStorage.getItem('nexsim-theme') === 'light') document.documentElement.setAttribute('data-theme', 'light'); } catch (e) {}
    </script>

    <!-- CSS et Polices (Open Sans, comme NexControl) -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="scripts/animations.js" defer></script>
    <?php if ($isHome): ?>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>
    <?php endif; ?>
