<?php
/**
 * Internationalisation du site vitrine.
 *
 * Résolution de la langue, dans cet ordre :
 *   1. paramètre d'URL ?lang=xx  (choix explicite → mémorisé dans un cookie)
 *   2. cookie nexsim_lang        (choix précédent)
 *   3. en-tête Accept-Language   (langue du navigateur / de l'ordinateur hôte)
 *   4. NEXSIM_LANG_DEFAULT       ('en')
 */

require_once __DIR__ . '/cookies.php';

/** Langue servie lorsque celle de l'hôte n'est pas disponible. */
const NEXSIM_LANG_DEFAULT = 'en';

/** Langue de repli pour une clé absente d'un dictionnaire. */
const NEXSIM_LANG_FALLBACK = 'en';

/** Langues disponibles : libellé natif, code hreflang, locale Open Graph. */
const NEXSIM_LANGS = [
    'fr' => ['label' => 'Français', 'short' => 'FR', 'hreflang' => 'fr', 'locale' => 'fr_FR'],
    'en' => ['label' => 'English',  'short' => 'EN', 'hreflang' => 'en', 'locale' => 'en_GB'],
    'de' => ['label' => 'Deutsch',  'short' => 'DE', 'hreflang' => 'de', 'locale' => 'de_DE'],
];

/** @var array<string,string> Dictionnaire actif, fusionné sur la langue de repli. */
$GLOBALS['nexsim_translations'] = [];
$GLOBALS['nexsim_lang'] = NEXSIM_LANG_DEFAULT;

/** Codes des langues disponibles. */
function nexsim_supported_langs(): array
{
    return array_keys(NEXSIM_LANGS);
}

/** Le code est-il une langue proposée par le site ? */
function nexsim_is_supported(?string $code): bool
{
    return is_string($code) && isset(NEXSIM_LANGS[strtolower($code)]);
}

/**
 * Meilleure correspondance entre l'en-tête Accept-Language et les langues du site.
 * Les valeurs sont triées par facteur de qualité décroissant ; « fr-CH » correspond
 * à « fr ». Renvoie null si aucune langue de l'hôte n'est disponible.
 */
function nexsim_negotiate_lang(?string $header): ?string
{
    if (!is_string($header) || trim($header) === '') {
        return null;
    }

    $candidates = [];
    foreach (explode(',', $header) as $index => $part) {
        $bits = explode(';', trim($part));
        $tag = strtolower(trim($bits[0]));
        if ($tag === '') {
            continue;
        }
        $quality = 1.0;
        foreach (array_slice($bits, 1) as $param) {
            if (preg_match('/^\s*q\s*=\s*([0-9.]+)\s*$/i', $param, $m)) {
                $quality = (float) $m[1];
            }
        }
        if ($quality <= 0) {
            continue;
        }
        // L'index préserve l'ordre d'origine entre valeurs de même qualité.
        $candidates[] = ['tag' => $tag, 'q' => $quality, 'i' => $index];
    }

    usort($candidates, fn($a, $b) => $b['q'] <=> $a['q'] ?: $a['i'] <=> $b['i']);

    foreach ($candidates as $candidate) {
        $primary = explode('-', $candidate['tag'])[0];
        if (isset(NEXSIM_LANGS[$primary])) {
            return $primary;
        }
    }
    return null;
}

/** Applique l'ordre de résolution et mémorise un choix explicite. */
function nexsim_resolve_lang(): string
{
    $requested = $_GET['lang'] ?? null;
    if (nexsim_is_supported($requested)) {
        $lang = strtolower($requested);
        nexsim_cookie_set(NEXSIM_COOKIE_LANG, $lang);
        return $lang;
    }

    $stored = nexsim_cookie_get(NEXSIM_COOKIE_LANG);
    if (nexsim_is_supported($stored)) {
        return strtolower($stored);
    }

    return nexsim_negotiate_lang($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null) ?? NEXSIM_LANG_DEFAULT;
}

/**
 * Charge le dictionnaire de la langue résolue, par-dessus celui de repli, et
 * annonce aux caches que la réponse dépend de la langue et du cookie.
 */
function nexsim_init_i18n(): string
{
    $lang = nexsim_resolve_lang();
    $load = static function (string $code): array {
        $file = __DIR__ . '/../lang/' . $code . '.php';
        $data = is_file($file) ? require $file : [];
        return is_array($data) ? $data : [];
    };

    $GLOBALS['nexsim_lang'] = $lang;
    $GLOBALS['nexsim_translations'] = $lang === NEXSIM_LANG_FALLBACK
        ? $load($lang)
        : array_merge($load(NEXSIM_LANG_FALLBACK), $load($lang));

    if (!headers_sent()) {
        header('Vary: Accept-Language, Cookie', false);
        header('Content-Language: ' . $lang);
    }
    return $lang;
}

/** Code de la langue active. */
function nexsim_lang(): string
{
    return $GLOBALS['nexsim_lang'];
}

/** Métadonnée de la langue active (label, short, hreflang, locale). */
function nexsim_lang_meta(?string $code = null): array
{
    return NEXSIM_LANGS[$code ?? nexsim_lang()] ?? NEXSIM_LANGS[NEXSIM_LANG_DEFAULT];
}

/**
 * Chaîne traduite. Les dictionnaires peuvent contenir du HTML simple (<strong>,
 * <br>, <a>) : le résultat est destiné au contenu. Pour un attribut, voir e().
 * Les occurrences de {clef} sont remplacées par $vars['clef'].
 */
function t(string $key, array $vars = []): string
{
    $value = $GLOBALS['nexsim_translations'][$key] ?? $key;
    if ($vars) {
        $value = strtr($value, array_combine(
            array_map(fn($k) => '{' . $k . '}', array_keys($vars)),
            array_values($vars)
        ));
    }
    return $value;
}

/** Chaîne traduite échappée : à utiliser dans les attributs HTML. */
function e(string $key, array $vars = []): string
{
    return htmlspecialchars(t($key, $vars), ENT_QUOTES, 'UTF-8');
}

/** La clé existe-t-elle dans le dictionnaire actif ? */
function nexsim_has(string $key): bool
{
    return isset($GLOBALS['nexsim_translations'][$key]);
}

/** URL de la page courante dans une autre langue (paramètre ?lang=xx). */
function nexsim_lang_url(string $code, ?string $uri = null): string
{
    $uri = $uri ?? ($_SERVER['REQUEST_URI'] ?? '/');
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $query = [];
    parse_str((string) parse_url($uri, PHP_URL_QUERY), $query);
    $query['lang'] = $code;
    return $path . '?' . http_build_query($query);
}

/** Versions linguistiques d'une URL canonique, pour les balises hreflang. */
function nexsim_alternates(string $canonical): array
{
    $alternates = [];
    foreach (NEXSIM_LANGS as $code => $meta) {
        $separator = str_contains($canonical, '?') ? '&' : '?';
        $alternates[$meta['hreflang']] = $canonical . $separator . 'lang=' . $code;
    }
    $alternates['x-default'] = $canonical;
    return $alternates;
}
