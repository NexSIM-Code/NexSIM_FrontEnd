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

        <div class="lang-switcher" style="margin-left:1rem;">
            <?php
            // Preserve current path without existing lang param
            $current = $_SERVER['REQUEST_URI'] ?? basename($_SERVER['PHP_SELF']);
            $parts = parse_url($current);
            $pathOnly = $parts['path'] ?? $current;
            parse_str($parts['query'] ?? '', $params);
            unset($params['lang']);
            $baseQuery = http_build_query($params);
            if (!function_exists('nx_lang_url')) {
                function nx_lang_url($path, $baseQuery, $lang)
                {
                    $q = $baseQuery ? ($baseQuery . '&lang=' . $lang) : ('lang=' . $lang);
                    return htmlspecialchars($path . '?' . $q, ENT_QUOTES, 'UTF-8');
                }
            }
            $currentLang = $GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr');
            ?>
            <label for="lang-select" style="position:absolute;left:-9999px;">Language</label>
            <select id="lang-select" aria-label="Language" onchange="if(this.value){window.location.href=this.value;}"
                    style="padding:4px 8px; border-radius:6px;">
                <option value="<?php echo nx_lang_url($pathOnly, $baseQuery, 'fr'); ?>" <?php echo($currentLang === 'fr' ? 'selected' : ''); ?>>
                    🇫🇷 FR
                </option>
                <option value="<?php echo nx_lang_url($pathOnly, $baseQuery, 'en'); ?>" <?php echo($currentLang === 'en' ? 'selected' : ''); ?>>
                    🇬🇧 EN
                </option>
                <option value="<?php echo nx_lang_url($pathOnly, $baseQuery, 'de'); ?>" <?php echo($currentLang === 'de' ? 'selected' : ''); ?>>
                    🇩🇪 DE
                </option>
            </select>
        </div>
    </div>
</nav>
