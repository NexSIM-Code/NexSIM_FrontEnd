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
    <title><?php echo htmlspecialchars(t('lusim.seo.title'), ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    $seo = [
            'title' => t('lusim.seo.title'),
            'description' => t('lusim.seo.description'),
            'path' => '/lusim.php'
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

<!-- Barre de navigation -->
<?php include 'partials/navbar.php'; ?>

<!-- Contenu principal -->
<div class="main-content">
    <div class="hero-section">
        <h1><?php echo htmlspecialchars(t('lusim.h1'), ENT_QUOTES, 'UTF-8'); ?></h1>
    </div>
    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('lusim.what.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="product-showcase">
            <div class="product-image">
                <img src="image/lusim.png" data-dark-src="image/lusim.png" alt="Simulateur Lusim"
                     class="product-main-image">
            </div>
            <div class="product-description">
                <p><?php echo htmlspecialchars(t('lusim.desc.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
                <p><?php echo htmlspecialchars(t('lusim.desc.p2', ['minutes' => 5]), ENT_QUOTES, 'UTF-8'); ?></p>
                <a href="#"
                   class="cta-button"><?php echo htmlspecialchars(t('lusim.cta.demo'), ENT_QUOTES, 'UTF-8'); ?></a>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('lusim.benefits.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li><?php echo htmlspecialchars(t('lusim.benefits.li1'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.benefits.li2'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.benefits.li3'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.benefits.li4'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.benefits.li5'), ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('lusim.modules.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="modules">
            <div class="module-card">
                <h3><?php echo htmlspecialchars(t('lusim.module.compliance'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('lusim.module.compliance.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="module-card">
                <h3><?php echo htmlspecialchars(t('lusim.module.resistance'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('lusim.module.resistance.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="module-card">
                <h3><?php echo htmlspecialchars(t('lusim.module.trigger'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('lusim.module.trigger.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="module-card">
                <h3><?php echo htmlspecialchars(t('lusim.module.scope'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('lusim.module.scope.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('lusim.forwho.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('lusim.forwho.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li><?php echo htmlspecialchars(t('lusim.forwho.li1'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.forwho.li2'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.forwho.li3'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('lusim.forwho.li4'), ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>

</html>