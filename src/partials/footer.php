<?php
/**
 * Pied de page commun : liens légaux, copyright et sélecteur de langue.
 * Variable attendue : $isHome (bool).
 */
require_once __DIR__ . '/../includes/bootstrap.php';
$isHome = $isHome ?? false;
$base = $isHome ? '' : 'index.php';
?>
<!-- Pied de page avec protection data-nosnippet pour les clauses légales -->
<footer data-nosnippet>
    <div class="container footer-inner">
        <div class="footer-brand">
            <img class="logo-dark" src="image/logo_Nexsim_dark.svg" alt="<?= e('nav.logo.alt') ?>" height="30" width="52" loading="lazy">
            <img class="logo-light" src="image/logo_Nexsim_light.svg" alt="<?= e('nav.logo.alt') ?>" height="30" width="52" loading="lazy">
            <span><?= t('site.address') ?></span>
        </div>
        <div class="footer-links">
            <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>
            <a href="https://www.linkedin.com/company/nexsim/" rel="noopener" target="_blank">LinkedIn</a>
            <a href="mentions-legales.php"><?= t('footer.legal') ?></a>
            <a href="politique-de-confidentialite.php"><?= t('footer.privacy') ?></a>
            <a href="<?= $base ?>#accueil"><?= t('footer.top') ?></a>
        </div>

        <!-- Sélecteur de langue : de simples liens, fonctionnels sans JavaScript.
             Le paramètre ?lang=xx est mémorisé dans le cookie nexsim_lang. -->
        <nav class="lang-switcher" aria-label="<?= e('footer.lang.aria') ?>">
            <svg class="lang-icon" aria-hidden="true"><use href="#i-globe"/></svg>
            <span class="lang-label"><?= t('footer.lang.label') ?></span>
            <ul class="lang-options">
                <?php foreach (NEXSIM_LANGS as $code => $meta): $isCurrent = $code === nexsim_lang(); ?>
                <li>
                    <a class="lang-option<?= $isCurrent ? ' active' : '' ?>"
                       href="<?= htmlspecialchars(nexsim_lang_url($code)) ?>"
                       lang="<?= htmlspecialchars($meta['hreflang']) ?>"
                       hreflang="<?= htmlspecialchars($meta['hreflang']) ?>"
                       aria-label="<?= e('footer.lang.switch', ['language' => $meta['label']]) ?>"
                       <?= $isCurrent ? 'aria-current="true"' : 'rel="alternate"' ?>><?= htmlspecialchars($meta['short']) ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <p class="footer-copy">&copy; <?= date('Y') ?> Nexsim. <?= t('footer.copyright') ?></p>
    </div>
</footer>
</body>
</html>
