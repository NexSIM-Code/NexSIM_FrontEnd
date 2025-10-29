<?php include 'partials/i18n.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars(t('contact.seo.title'), ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    $seo = [
        'title' => t('contact.seo.title'),
        'description' => t('contact.seo.description'),
        'path' => '/contact.php'
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
        <h2><?php echo htmlspecialchars(t('contact.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('contact.intro'), ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="contact-card" style="margin-top:16px; padding:16px; border:1px solid #ddd; border-radius:8px; max-width:520px;">
            <p><strong><?php echo htmlspecialchars(t('contact.email_label'), ENT_QUOTES, 'UTF-8'); ?>:</strong>
                <a href="mailto:contact@lusim.fr">contact@lusim.fr</a></p>
            <p><strong><?php echo htmlspecialchars(t('contact.address_label'), ENT_QUOTES, 'UTF-8'); ?>:</strong><br>
                <?php echo htmlspecialchars(t('footer.address.line1'), ENT_QUOTES, 'UTF-8'); ?><br>
                <?php echo htmlspecialchars(t('footer.address.line2'), ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </div>
    </section>
</div>

<?php include 'partials/footer.php'; ?>
</body>
</html>
