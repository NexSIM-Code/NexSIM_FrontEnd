<?php
/**
 * Assets critiques.
 *
 * La feuille de style est injectée directement dans le document plutôt que
 * chargée via <link> : elle bloquait le premier rendu le temps d'un aller-retour
 * réseau supplémentaire (~170 ms mesurés par PageSpeed). Le fichier reste la
 * source unique sur le disque (css/style.css), il est simplement lu au moment du
 * rendu. Compressé, le surcoût pour le document est le même que la requête qu'il
 * remplace, mais il n'y a plus de round-trip sur le chemin critique.
 */

/** Chemin disque d'un asset servi depuis la racine du site. */
function nexsim_asset_path(string $relative): string
{
    return __DIR__ . '/../' . ltrim($relative, '/');
}

function nexsim_asset_url(string $relative): string
{
    $path = nexsim_asset_path($relative);
    if (!is_file($path)) {
        return $relative;
    }

    return $relative . '?v=' . substr(md5_file($path) ?: '', 0, 8);
}

/** Contenu d'une feuille de style, prêt à être placé dans un <style>. */
function nexsim_inline_css(string $relative): string
{
    $path = nexsim_asset_path($relative);
    $css = is_file($path) ? file_get_contents($path) : '';

    /* </style> ne peut pas apparaître dans le contenu : aucune occurrence
       attendue, mais la neutralisation évite toute sortie malformée. */
    return str_ireplace('</style', '<\/style', $css);
}
