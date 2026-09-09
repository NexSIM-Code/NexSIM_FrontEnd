<?php
/** Pied de page commun. Variable attendue : $isHome (bool). */
$isHome = $isHome ?? false;
$base = $isHome ? '' : 'index.php';
?>
<!-- Pied de page avec protection data-nosnippet pour les clauses légales -->
<footer data-nosnippet>
    <div class="container footer-inner">
        <div class="footer-brand">
            <img class="logo-dark" src="image/logo_Nexsim_dark.svg" alt="Logo Nexsim" height="30" width="52" loading="lazy">
            <img class="logo-light" src="image/logo_Nexsim_light.svg" alt="Logo Nexsim" height="30" width="52" loading="lazy">
            <span>9 Rue Becquerel, 90000 Belfort, France</span>
        </div>
        <div class="footer-links">
            <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>
            <a href="https://www.linkedin.com/company/nexsim/" rel="noopener" target="_blank">LinkedIn</a>
            <a href="mentions-legales.php">Mentions légales</a>
            <a href="politique-de-confidentialite.php">Politique de confidentialité</a>
            <a href="<?= $base ?>#accueil">Haut de page</a>
        </div>
        <p class="footer-copy">&copy; <?php echo date("Y"); ?> Nexsim. Tous droits réservés.</p>
    </div>
</footer>
</body>
</html>
