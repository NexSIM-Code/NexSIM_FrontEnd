<?php if (!function_exists('t')) {
    include __DIR__ . '/i18n.php';
} ?>
<!-- Pied de page -->
<footer>
    <div class="footer-content">
        <?php include 'footer/contact.php' ?>
        <?php include 'footer/follow-us.php' ?>
        <?php include 'footer/information.php' ?>
    </div>

    <div class="lang-switcher" style="margin: 1rem 0;">
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
        <label for="lang-select-footer" style="position:absolute;left:-9999px;">Language</label>
        <select id="lang-select-footer" aria-label="Language"
                onchange="if(this.value){window.location.href=this.value;}" style="padding:4px 8px; border-radius:6px;">
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

    <p style="margin-top: 1rem;">&copy; <?php echo date('Y'); ?> Nexsim - Next
        Simulation. <?php echo htmlspecialchars(t('footer.copyright'), ENT_QUOTES, 'UTF-8'); ?></p>
</footer>
