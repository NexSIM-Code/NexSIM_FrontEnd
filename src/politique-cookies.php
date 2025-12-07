<?php include 'partials/i18n.php';
include_once 'partials/seo_utils.php'; ?>
<!DOCTYPE html>
<html
        lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Politique de cookies | Nexsim</title>
    <?php
    $seo = [
            'title' => 'Politique de cookies | Nexsim',
            'description' => "Politique de cookies Nexsim : types de cookies utilisés, finalités, durée et gestion des préférences conformément au RGPD.",
            'path' => '/politique-cookies.php'
    ];
    // Inlined SEO partial (was: include 'partials/seo.php')
    $defaults = [
            'site_name' => function_exists('t') ? t('site.name') : 'Nexsim',
            'title' => function_exists('t') ? t('seo.default.title') : 'Nexsim - Solutions de simulation médicale innovantes',
            'description' => function_exists('t') ? t('seo.default.description') : "Nexsim conçoit des solutions de simulation médicale innovantes pour former le personnel soignant : simulateurs, VR et outils pédagogiques, un véritable poumon pédagogique pour la formation.",
            'image' => 'image/logo.png',
            'robots' => 'index,follow',
            'type' => 'website',
    ];
    if (!isset($seo) || !is_array($seo)) {
        $seo = [];
    }
    $config = array_merge($defaults, $seo);
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $baseUrl = $scheme . '://' . $host;
    // Canonical URL is now handled by nx_generate_seo_tags() in the head
    $relativeImage = $config['image'];
    if (!file_exists($relativeImage) || is_dir($relativeImage)) {
        $candidates = ['image/lusim.png', 'image/logo.png', 'image/logo-dark.svg', 'image/logo.svg', 'image/schema-ecosysteme.png'];
        foreach ($candidates as $c) {
            if (file_exists($c)) {
                $relativeImage = $c;
                break;
            }
        }
    }
    $ogImage = rtrim($baseUrl, '/') . '/' . ltrim($relativeImage, '/');
    $siteName = is_callable($defaults['site_name']) ? $defaults['site_name']() : $defaults['site_name'];
    $title = $config['title'];
    if (stripos($title, 'Nexsim') === false) {
        $title .= ' | ' . $siteName;
    }
    $description = $config['description'];
    $robots = $config['robots'];
    $type = $config['type'];
    $ogLocale = isset($GLOBALS['NX_LOCALE']) ? $GLOBALS['NX_LOCALE'] : (function_exists('nx_locale_map') ? (nx_locale_map()[nx_detect_lang()] ?? 'fr_FR') : 'fr_FR');
    ?>
    <script>
        window.NEXSIM_GTM_ID = 'GTM-NPTDG3KP';
        window.NEXSIM_GA_ID = 'G-7TCGNHL456';
    </script>
    <script src="scripts/cookie-consent.js" defer></script>
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($robots, ENT_QUOTES, 'UTF-8'); ?>">
    <!-- Canonical URL & Hreflang -->
    <?php echo nx_generate_seo_tags($config); ?>
    <meta property="og:site_name"
          content="<?php echo htmlspecialchars($defaults['site_name'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url"
          content="<?php echo htmlspecialchars($baseUrl . ($_SERVER['REQUEST_URI'] ?? '/'), ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="<?php echo $ogLocale; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image:alt" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="theme-color" content="#0b2a4a">
    <script type="application/ld+json">
        {"@context":"https://schema.org","@type":"Organization","name":"Nexsim","url":"<?php echo $baseUrl; ?>
        ","logo":"<?php echo rtrim($baseUrl, '/'); ?>/image/logo.svg","sameAs":[]}
    </script>
    <script type="application/ld+json">
        {"@context":"https://schema.org","@type":"WebSite","name":"Nexsim","url":"<?php echo $baseUrl; ?>"}
    </script>
    <?php $gaId = $seo['ga_measurement_id'] ?? null;
    if ($gaId): ?>
        <script>window.NEXSIM_GA_ID = <?php echo json_encode($gaId); ?>;</script>
        <script src="scripts/analytics.js" defer></script>
    <?php endif; ?>
</head>

<body>
<?php include 'partials/navbar.php'; ?>
<div class="main-content">
    <div class="hero-section">
        <h1>Politique de cookies</h1>
        <p>Dernière mise à jour : <?php echo date('d/m/Y'); ?></p>
    </div>

    <section class="content-section">
        <h2>Qu'est-ce qu'un cookie ?</h2>
        <p>Un cookie est un petit fichier texte déposé sur votre terminal (ordinateur, mobile, tablette) lors de
            votre
            visite sur un site. Il permet notamment d'assurer le bon fonctionnement du site ou de mesurer son
            audience.</p>
    </section>

    <section class="content-section">
        <h2>Cookies utilisés sur ce site</h2>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li><strong>Cookies strictement nécessaires</strong> – indispensables au fonctionnement et à la sécurité
                du
                site (toujours actifs et non soumis à consentement).
            </li>
            <li><strong>Cookies de mesure d'audience</strong> (Google Analytics 4) – activés uniquement avec votre
                consentement, afin d'obtenir des statistiques d'utilisation anonymisées et d'améliorer le site.
            </li>
        </ul>
    </section>

    <section class="content-section">
        <h2>Durée de conservation</h2>
        <p>La durée de vie des cookies varie selon leur nature. Les cookies d'analyse sont conservés au maximum 14
            mois,
            conformément aux recommandations en vigueur.</p>
    </section>

    <section class="content-section">
        <h2>Gestion de vos préférences</h2>
        <p>Vous pouvez modifier vos préférences à tout moment via le lien « Préférences cookies » en pied de page.
        </p>
        <p>
            <a href="#" data-cookie-preferences class="cta-button">Ouvrir les préférences cookies</a>
        </p>
    </section>

    <section class="content-section">
        <h2>Plus d'informations</h2>
        <p>Pour en savoir plus sur nos traitements de données et vos droits, consultez notre <a
                    href="politique-confidentialite.php">Politique de confidentialité</a>.</p>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>

</html>