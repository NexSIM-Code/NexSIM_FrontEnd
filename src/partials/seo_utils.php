<?php
/**
 * Generates Canonical URL and Hreflang tags.
 *
 * @param array $config Configuration array (can contain 'canonical' override).
 * @return string HTML block with <link> tags.
 */
function nx_generate_seo_tags(array $config = []): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $baseUrl = $scheme . '://' . $host;

    // Current path without query string
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
    // Ensure single leading slash
    $path = '/' . ltrim($path, '/');

    // Current Language
    $currentLang = $GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr');
    $defaultLang = 'fr';
    $supportedLangs = ['fr', 'en', 'de'];

    // Build Canonical URL
    $canonical = '';

    // 1. Check for explicit canonical in config
    if (!empty($config['canonical'])) {
        $explicit = $config['canonical'];
        if (preg_match('#^https?://#i', $explicit)) {
            $canonical = $explicit;
        } else {
            // Normalize relative path
            $relPath = '/' . ltrim($explicit, '/');
            $canonical = rtrim($baseUrl, '/') . $relPath;
        }
    } else {
        // 2. Build automatically based on current language
        // If current lang is default, use clean URL.
        // If current lang is NOT default, append ?lang=xx

        $canonicalUrl = rtrim($baseUrl, '/') . $path;

        if ($currentLang !== $defaultLang) {
            // Append query param
            // Check if path already has query params? (parse_url above stripped them from $path)
            // So we just append ?lang=...
            $canonical = $canonicalUrl . '?lang=' . $currentLang;
        } else {
            $canonical = $canonicalUrl;
        }
    }

    // Build Hreflang tags
    // We need a link for each supported language
    $hreflangs = [];
    foreach ($supportedLangs as $lang) {
        $href = rtrim($baseUrl, '/') . $path;
        if ($lang !== $defaultLang) {
            $href .= '?lang=' . $lang;
        }
        $hreflangs[$lang] = $href;
    }
    // x-default should point to the default language version
    $hreflangs['x-default'] = $hreflangs[$defaultLang];

    // Output
    $html = '';
    $html .= '    <!-- Canonical & Hreflang -->' . "\n";
    $html .= '    <link rel="canonical" href="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . '">' . "\n";

    foreach ($hreflangs as $lang => $url) {
        $html .= '    <link rel="alternate" hreflang="' . $lang . '" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">' . "\n";
    }

    return $html;
}
