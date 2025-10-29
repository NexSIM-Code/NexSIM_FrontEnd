<?php if (!function_exists('t')) { include __DIR__ . '/../i18n.php'; } ?>
<div class="footer-section">
    <h3><?php echo htmlspecialchars(t('footer.info'), ENT_QUOTES, 'UTF-8'); ?></h3>
    <p><a href="mentions-legales.php"><?php echo htmlspecialchars(t('footer.legal'), ENT_QUOTES, 'UTF-8'); ?></a></p>
    <p><a href="politique-confidentialite.php"><?php echo htmlspecialchars(t('footer.privacy'), ENT_QUOTES, 'UTF-8'); ?></a></p>
    <p><a href="politique-cookies.php"><?php echo htmlspecialchars(t('footer.cookies'), ENT_QUOTES, 'UTF-8'); ?></a></p>
    <p><a href="#" data-cookie-preferences><?php echo htmlspecialchars(t('footer.cookie_prefs'), ENT_QUOTES, 'UTF-8'); ?></a></p>
</div>