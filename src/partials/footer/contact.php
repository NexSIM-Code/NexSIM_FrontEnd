<?php if (!function_exists('t')) {
    include __DIR__ . '/../i18n.php';
} ?>
<div class="footer-section">
    <h3><?php echo htmlspecialchars(t('footer.contact'), ENT_QUOTES, 'UTF-8'); ?></h3>
    <p><?php echo htmlspecialchars(t('footer.address.line1'), ENT_QUOTES, 'UTF-8'); ?></p>
    <p><?php echo htmlspecialchars(t('footer.address.line2'), ENT_QUOTES, 'UTF-8'); ?></p>
    <p><?php echo htmlspecialchars(t('footer.email'), ENT_QUOTES, 'UTF-8'); ?></p>
</div>