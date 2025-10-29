<?php include 'partials/i18n.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">
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
    include 'partials/seo.php';
    ?>
</head>
<body>

<!-- Barre de navigation -->
<?php include 'partials/navbar.php'; ?>

<!-- Contenu principal -->
<div class="main-content">
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
                <a href="#" class="cta-button"><?php echo htmlspecialchars(t('lusim.cta.demo'), ENT_QUOTES, 'UTF-8'); ?></a>
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
