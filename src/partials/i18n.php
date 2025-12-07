<?php
// Lightweight internationalization loader
// Usage: include 'partials/i18n.php' at the very top of each page before any output

if (!function_exists('nx_detect_lang')) {
    function nx_detect_lang(): string
    {
        // 1) Query param ?lang=xx
        $supported = ['fr', 'en', 'de'];
        if (isset($_GET['lang'])) {
            $lang = strtolower(substr($_GET['lang'], 0, 2));
            if (in_array($lang, $supported, true)) {
                // Persist for 180 days
                setcookie('lang', $lang, time() + 60 * 60 * 24 * 180, '/');
                return $lang;
            }
        }
        // 2) Cookie
        if (!empty($_COOKIE['lang']) && in_array($_COOKIE['lang'], $supported, true)) {
            return $_COOKIE['lang'];
        }
        // 3) Browser Accept-Language
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $al = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
            foreach ($supported as $s) {
                if (strpos($al, $s) === 0 || strpos($al, $s . '-') !== false) {
                    return $s;
                }
            }
        }
        // Default
        return 'fr';
    }
}

if (!function_exists('nx_locale_map')) {
    function nx_locale_map(): array
    {
        return [
            'fr' => 'fr_FR',
            'en' => 'en_US',
            'de' => 'de_DE',
        ];
    }
}

if (!function_exists('nx_load_translations')) {
    function nx_load_translations(string $lang): array
    {
        $base = __DIR__ . '/../lang/';
        $file = realpath($base . $lang . '.php');
        if ($file && is_file($file)) {
            /** @noinspection PhpIncludeInspection */
            $dict = include $file;
            if (is_array($dict)) {
                return $dict;
            }
        }
        // Fallback to French
        /** @noinspection PhpIncludeInspection */
        $fallback = include __DIR__ . '/../lang/fr.php';
        return is_array($fallback) ? $fallback : [];
    }
}

if (!function_exists('t')) {
    function t(string $key, array $repl = []): string
    {
        static $DICT = null;
        if ($DICT === null) {
            // Initialize on first call
            $lang = $GLOBALS['NX_LANG'] ?? nx_detect_lang();
            $DICT = nx_load_translations($lang);
        }
        $text = $DICT[$key] ?? $key;
        // Simple replacement: {name}
        foreach ($repl as $k => $v) {
            $text = str_replace('{' . $k . '}', (string)$v, $text);
        }
        return $text;
    }
}

// Initialize globals for pages and SEO
$NX_LANG = nx_detect_lang();
$NX_LOCALE = nx_locale_map()[$NX_LANG] ?? 'fr_FR';
