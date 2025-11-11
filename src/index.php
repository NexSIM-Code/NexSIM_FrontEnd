<?php include 'partials/i18n.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="KjI3msHzOdGMSiN_H8r7V6Dy7Gt18m67kyVdILfri4w" />    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars(t('seo.default.title'), ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    $seo = [
            'title' => t('seo.default.title'),
            'description' => t('seo.default.description'),
            'path' => '/'
    ];
    include 'partials/seo.php';
    ?>
</head>
<body>

<!-- Barre de navigation -->
<?php include 'partials/navbar.php'; ?>

<!-- Contenu principal -->
<div class="main-content">
    <section class="content-section">
        <h1><?php echo htmlspecialchars(t('home.h1'), ENT_QUOTES, 'UTF-8'); ?></h1>
        <p><?php echo htmlspecialchars(t('home.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo htmlspecialchars(t('home.p2'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.about.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.about.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo htmlspecialchars(t('home.about.p2'), ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="about-highlights">
            <div class="highlight-item">
                <h3><?php echo htmlspecialchars(t('home.highlight.innovation'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('home.highlight.innovation.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="highlight-item">
                <h3><?php echo htmlspecialchars(t('home.highlight.accessibility'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('home.highlight.accessibility.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="highlight-item">
                <h3><?php echo htmlspecialchars(t('home.highlight.pedagogy'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('home.highlight.pedagogy.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.ecosystem.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.ecosystem.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="ecosystem-graphic">
            <img src="image/schema-ecosysteme.png" data-dark-src="image/schema-ecosysteme-dark.png"
                 alt="Ecosystème NexSim">
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.products.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.products.p'), ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="product-card">
            <h3><?php echo htmlspecialchars(t('home.products.lusim.title'), ENT_QUOTES, 'UTF-8'); ?></h3>
            <p><?php echo htmlspecialchars(t('home.products.lusim.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
            <p><?php echo htmlspecialchars(t('home.products.lusim.p2'), ENT_QUOTES, 'UTF-8'); ?></p>
            <a href="lusim.php" class="cta-button"><?php echo htmlspecialchars(t('home.products.lusim.cta'), ENT_QUOTES, 'UTF-8'); ?></a>
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.why.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.why.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li><?php echo htmlspecialchars(t('home.why.li1'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li2'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li3'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li4'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li5'), ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
        <p><?php echo htmlspecialchars(t('home.why.end'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>
