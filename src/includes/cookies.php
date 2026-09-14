<?php
/**
 * Cookies de préférence (thème et langue).
 *
 * Ces deux cookies ne servent qu'à mémoriser un choix explicite de l'utilisateur.
 * Ils ne permettent aucun suivi, ne sont jamais transmis à un tiers et relèvent des
 * traceurs exemptés de consentement (art. 82 de la loi Informatique et Libertés,
 * lignes directrices CNIL) : aucun bandeau n'est donc nécessaire.
 */

const NEXSIM_COOKIE_LANG  = 'nexsim_lang';
const NEXSIM_COOKIE_THEME = 'nexsim_theme';
const NEXSIM_COOKIE_TTL   = 31536000; // 1 an
const NEXSIM_THEMES       = ['dark', 'light'];

/** La requête courante est-elle servie en HTTPS (directement ou via un proxy) ? */
function nexsim_is_secure(): bool
{
    if (!empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off') {
        return true;
    }
    if (($_SERVER['SERVER_PORT'] ?? null) == 443) {
        return true;
    }
    return strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https';
}

/** Valeur d'un cookie de préférence, ou $default s'il est absent. */
function nexsim_cookie_get(string $name, ?string $default = null): ?string
{
    $value = $_COOKIE[$name] ?? null;
    return is_string($value) && $value !== '' ? $value : $default;
}

/**
 * Écrit un cookie de préférence et le rend immédiatement lisible dans la requête
 * courante. `httponly` est volontairement à false : le bouton de thème écrit la
 * même valeur côté client.
 */
function nexsim_cookie_set(string $name, string $value, int $ttl = NEXSIM_COOKIE_TTL): void
{
    if (!headers_sent()) {
        setcookie($name, $value, [
            'expires'  => time() + $ttl,
            'path'     => '/',
            'secure'   => nexsim_is_secure(),
            'httponly' => false,
            'samesite' => 'Lax',
        ]);
    }
    $_COOKIE[$name] = $value;
}

/** Supprime un cookie de préférence. */
function nexsim_cookie_clear(string $name): void
{
    if (!headers_sent()) {
        setcookie($name, '', [
            'expires'  => time() - 3600,
            'path'     => '/',
            'secure'   => nexsim_is_secure(),
            'httponly' => false,
            'samesite' => 'Lax',
        ]);
    }
    unset($_COOKIE[$name]);
}

/**
 * Thème demandé : ?theme=… (choix explicite, mémorisé) puis cookie, sinon 'dark'.
 * Appliqué côté serveur sur <html> pour éviter tout flash au premier rendu.
 */
function nexsim_theme(): string
{
    $requested = $_GET['theme'] ?? null;
    if (is_string($requested) && in_array($requested, NEXSIM_THEMES, true)) {
        nexsim_cookie_set(NEXSIM_COOKIE_THEME, $requested);
        return $requested;
    }
    $stored = nexsim_cookie_get(NEXSIM_COOKIE_THEME);
    return in_array($stored, NEXSIM_THEMES, true) ? $stored : 'dark';
}
