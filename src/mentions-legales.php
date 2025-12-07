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
    <title>Mentions légales | Nexsim</title>
    <?php
    $seo = [
            'title' => 'Mentions légales | Nexsim',
            'description' => "Mentions légales du site Nexsim : éditeur, hébergeur, propriété intellectuelle, responsabilité.",
            'path' => '/mentions-legales.php'
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
        <h1>Mentions légales</h1>
        <p>Dernière mise à jour : <?php echo date('d/m/Y'); ?></p>
    </div>

    <section class="content-section">
        <h2>Éditeur du site</h2>
        <p><strong>Nexsim – Next Simulation</strong><br>
            9 Rue Becquerel<br>
            90000 Belfort, France<br>
            Email : <a href="mailto:contact@lusim.fr">contact@lusim.fr</a>
        </p>
        <!--    <p>Forme juridique / SIREN : à compléter</p>-->
        <!--    <p>Directeur de la publication : à compléter</p>-->
    </section>

    <section class="content-section">
        <h2>Hébergement</h2>
        <p>Hébergeur : Nexsim</p>
    </section>

    <section class="content-section">
        <h2>Propriété intellectuelle</h2>
        <p>Le présent site et l'ensemble de son contenu (textes, images, graphismes, logos, marques, etc.) sont
            protégés
            par le droit d'auteur et le droit des marques. Toute reproduction, représentation, modification,
            publication, transmission, dénaturation, totale ou partielle du site ou de son contenu, par quelque
            procédé
            que ce soit, et sur quelque support que ce soit, est interdite sauf autorisation préalable et écrite de
            Nexsim.</p>
    </section>

    <section class="content-section">
        <h2>Responsabilité</h2>
        <p>Nexsim s'efforce d'assurer l'exactitude et la mise à jour des informations diffusées sur ce site. Elle se
            réserve le droit d'en corriger, à tout moment et sans préavis, le contenu. Toutefois, Nexsim ne peut
            garantir l'exactitude, la précision ou l'exhaustivité des informations mises à disposition sur ce site.
            En
            conséquence, Nexsim décline toute responsabilité pour toute imprécision, inexactitude ou omission
            portant
            sur des informations disponibles sur le site.</p>
    </section>

    <section class="content-section">
        <h2>Liens</h2>
        <p>Les liens hypertextes mis en place dans le cadre du présent site en direction d'autres ressources
            présentes
            sur le réseau Internet ne sauraient engager la responsabilité de Nexsim.</p>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>

</html>