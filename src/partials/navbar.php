<?php if (!function_exists('t')) {
    include __DIR__ . '/i18n.php';
} ?>
<nav>
    <div class="logo-container">
        <img src="image/logo.svg" data-dark-src="image/logo-dark.svg" alt="Logo Nexsim"
             class="logo">
    </div>

    <ul class="nav-links">
        <li><a href="index.php"><?php echo htmlspecialchars(t('nav.home'), ENT_QUOTES, 'UTF-8'); ?></a></li>
        <li><a href="lusim.php"><?php echo htmlspecialchars(t('nav.lusim'), ENT_QUOTES, 'UTF-8'); ?></a></li>
        <li><a href="equipe.php"><?php echo htmlspecialchars(t('nav.team'), ENT_QUOTES, 'UTF-8'); ?></a></li>
        <li><a href="contact.php"><?php echo htmlspecialchars(t('nav.contact'), ENT_QUOTES, 'UTF-8'); ?></a></li>
    </ul>

    <div class="nav-right">
        <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox"/>
                <div class="slider round">
                    <span class="moon">🌙</span>
                    <span class="sun">☀️</span>
                </div>
            </label>
        </div>
    </div>
</nav>
