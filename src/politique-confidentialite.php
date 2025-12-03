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
    <title>Politique de confidentialité (RGPD) | Nexsim</title>
    <?php
    $seo = [
        'title' => 'Politique de confidentialité (RGPD) | Nexsim',
        'description' => "Politique de confidentialité de Nexsim : données collectées, finalités, bases légales, durée de conservation, droits RGPD et contact.",
        'path' => '/politique-confidentialite.php'
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
        {"@context":"https://schema.org","@type":"Organization","name":"Nexsim","url":"<?php echo $baseUrl; ?>","logo":"<?php echo rtrim($baseUrl, '/'); ?>/image/logo.svg","sameAs":[]}
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
        <section class="content-section">
            <h1>Politique de confidentialité</h1>
            <p>Dernière mise à jour : <?php echo date('d/m/Y'); ?></p>
        </section>

        <section class="content-section">
            <h2>Responsable de traitement</h2>
            <p><strong>Nexsim – Next Simulation</strong><br>
                9 Rue Becquerel<br>
                90000 Belfort, France<br>
                Email : <a href="mailto:contact@lusim.fr">contact@lusim.fr</a>
            </p>
        </section>

        <section class="content-section">
            <h2>Données collectées et finalités</h2>
            <ul style="margin-left: 20px; margin-bottom: 15px;">
                <li><strong>Données techniques</strong> (journal serveur, adresse IP tronquée, user-agent) – sécurité et
                    bon
                    fonctionnement du site (intérêt légitime).
                </li>
                <li><strong>Mesure d'audience</strong> (Google Analytics 4) – statistiques anonymisées et agrégées,
                    uniquement avec votre consentement.
                </li>
                <li><strong>Formulaire de contact</strong> (si utilisé) – identité, coordonnées et message, pour
                    répondre à
                    votre demande (exécution de mesures précontractuelles).
                </li>
            </ul>
        </section>

        <section class="content-section">
            <h2>Bases légales</h2>
            <ul style="margin-left: 20px; margin-bottom: 15px;">
                <li>Intérêt légitime pour la sécurité et la maintenance du site.</li>
                <li>Consentement pour les cookies d'analyse et la mesure d'audience.</li>
                <li>Exécution de mesures précontractuelles pour les demandes issues du formulaire de contact.</li>
            </ul>
        </section>

        <section class="content-section">
            <h2>Durées de conservation</h2>
            <ul style="margin-left: 20px; margin-bottom: 15px;">
                <li>Données techniques: jusqu'à 12 mois.</li>
                <li>Cookies d'analyse: selon la politique de Google Analytics (généralement 14 mois max) et vos
                    préférences.
                </li>
                <li>Messages de contact: le temps de traiter la demande et jusqu'à 3 ans pour le suivi commercial.</li>
            </ul>
        </section>

        <section class="content-section">
            <h2>Destinataires et transferts</h2>
            <p>Les données sont traitées par Nexsim et ses sous-traitants techniques (hébergeur, outils de mesure
                d'audience). Certains traitements (par ex. Google Analytics) peuvent impliquer des transferts hors UE
                avec
                des garanties appropriées. Vous pouvez désactiver cette mesure d'audience via nos préférences cookies.
            </p>
        </section>

        <section class="content-section">
            <h2>Vos droits</h2>
            <p>Conformément au RGPD et à la loi Informatique et Libertés, vous disposez des droits suivants : accès,
                rectification, effacement, limitation, opposition, portabilité. Vous pouvez également définir le sort de
                vos
                données après votre décès.</p>
            <p>Pour exercer vos droits, contactez-nous à <a href="mailto:contact@lusim.fr">contact@lusim.fr</a>. En cas
                de
                difficulté, vous pouvez adresser une réclamation à la CNIL (<a href="https://www.cnil.fr">cnil.fr</a>).
            </p>
        </section>

        <section class="content-section">
            <h2>Cookies et consentement</h2>
            <p>Vous pouvez gérer vos préférences à tout moment via le lien « Préférences cookies » en pied de page. Pour
                plus d'informations, consultez notre <a href="politique-cookies.php">Politique de cookies</a>.</p>
            <p>
                <a href="#" data-cookie-preferences class="cta-button">Ouvrir les préférences cookies</a>
            </p>
        </section>
    </div>
    <?php include 'partials/footer.php'; ?>
</body>

</html>