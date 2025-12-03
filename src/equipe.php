<?php
include 'partials/i18n.php';

$equipe = [
        [
                'name' => 'Romary Lucas',
                'role' => t('team.member.lucas.role'),
                'description' => t('team.member.lucas.desc'),
                'image' => 'image/person/lucas.png'
        ],
        [
                'name' => 'Ferlin Jules',
                'role' => t('team.member.jules.role'),
                'description' => t('team.member.jules.desc'),
                'image' => 'image/person/jules.png'
        ],
        [
                'name' => 'Faivre Laurent',
                'role' => t('team.member.laurent.role'),
                'description' => t('team.member.laurent.desc'),
                'image' => 'image/person/laurent.png'
        ],
        [
                'name' => 'Lauri Fabrice',
                'role' => t('team.member.fabrice.role'),
                'description' => t('team.member.fabrice.desc'),
                'image' => 'image/person/fabrice.png'
        ],
        [
                'name' => 'Buvat Jean-Sebastien',
                'role' => t('team.member.jean-sebastien.role'),
                'description' => t('team.member.jean-sebastien.desc'),
                'image' => 'image/person/jean-sebastien.png'
        ]
];
?>

<?php // i18n included above ?>
<!DOCTYPE html>
<html
        lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars(t('team.seo.title'), ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    $seo = [
            'title' => t('team.seo.title'),
            'description' => t('team.seo.description'),
            'path' => '/equipe.php'
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
    $explicitCanonical = $config['canonical'] ?? null;
    if (is_string($explicitCanonical) && $explicitCanonical !== '') {
        if (preg_match('#^https?://#i', $explicitCanonical)) {
            $canonical = $explicitCanonical;
        } else {
            $path = $explicitCanonical;
            $pathOnly = parse_url($path, PHP_URL_PATH) ?: '/';
            if ($pathOnly === '') {
                $pathOnly = '/';
            }
            $pathOnly = '/' . ltrim($pathOnly, '/');
            $canonical = rtrim($baseUrl, '/') . $pathOnly;
        }
    } else {
        $path = $config['path'] ?? ($_SERVER['REQUEST_URI'] ?? '/');
        if ($path === '') {
            $path = '/';
        }
        $pathOnly = parse_url($path, PHP_URL_PATH) ?: '/';
        if ($pathOnly === '') {
            $pathOnly = '/';
        }
        $pathOnly = '/' . ltrim($pathOnly, '/');
        $canonical = rtrim($baseUrl, '/') . $pathOnly;
    }
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
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name"
          content="<?php echo htmlspecialchars($defaults['site_name'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
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
    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('team.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('team.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo htmlspecialchars(t('team.p2'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('team.expertise.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('team.expertise.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <ul class="benefits-list">
            <li><?php echo htmlspecialchars(t('team.expertise.li1'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('team.expertise.li2'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('team.expertise.li3'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('team.expertise.li4'), ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
        <p><?php echo htmlspecialchars(t('team.expertise.end'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('team.members.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="team-container">
            <?php foreach ($equipe as $membre): ?>
                <div class="team-card">
                    <div class="team-image-container">
                        <?php
                        $imagePath = $membre['image'];
                        if (!file_exists($imagePath)) {
                            $imagePath = 'image/person/default.png';
                        }
                        ?>
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $membre['name']; ?>" class="team-image">
                    </div>
                    <div class="team-info">
                        <h3><?php echo $membre['name']; ?></h3>
                        <div class="team-role"><?php echo $membre['role']; ?></div>
                        <div class="team-description"><?php echo $membre['description']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>

</html>