<?php
/**
 * Balises <picture> responsives.
 *
 * Les images d'origine sont conservées telles quelles dans image/ ; leurs
 * déclinaisons AVIF et WebP vivent dans image/opt et sont décrites par un
 * manifeste, tous deux produits par tools/build-images.mjs. Si le manifeste est
 * absent — dépôt fraîchement cloné, génération non rejouée — la fonction retombe
 * proprement sur une balise <img> classique pointant l'original.
 */
require_once __DIR__ . '/assets.php';

/** Manifeste des déclinaisons, relu une seule fois par requête. */
function nexsim_image_manifest(): array
{
    static $manifest = null;

    if ($manifest === null) {
        $path = nexsim_asset_path('image/opt/manifest.json');
        $manifest = $path && is_file($path)
            ? (json_decode((string) file_get_contents($path), true) ?: [])
            : [];
    }

    return $manifest;
}

/** URL d'une déclinaison : image/person/lucas.png → image/opt/person/lucas-208.avif */
function nexsim_image_variant(string $src, int $width, string $format): string
{
    $relative = substr($src, strlen('image/'));
    $dir = dirname($relative);
    $name = pathinfo($relative, PATHINFO_FILENAME);

    return 'image/opt/' . ($dir === '.' ? '' : $dir . '/') . $name . '-' . $width . '.' . $format;
}

/**
 * Largeur réellement occupée par une image calée sur une hauteur CSS fixe, une
 * largeur maximale pouvant la rogner. Sert à écrire un attribut sizes juste pour
 * les logos partenaires, dont le rapport varie d'un fichier à l'autre.
 */
function nexsim_image_display_width(string $src, int $cssHeight, int $maxWidth): int
{
    $entry = nexsim_image_manifest()[$src] ?? null;
    if (!$entry || $entry['height'] <= 0) {
        return $maxWidth;
    }

    return min($maxWidth, (int) ceil($cssHeight * $entry['width'] / $entry['height']));
}

/** Sérialise une liste d'attributs, en ignorant ceux laissés à null. */
function nexsim_image_attrs(array $attributes): string
{
    $out = '';
    foreach ($attributes as $name => $value) {
        if ($value === null || $value === false) {
            continue;
        }
        $out .= ' ' . $name . '="' . htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') . '"';
    }

    return $out;
}

/**
 * Construit un <picture> AVIF → WebP → original.
 *
 * Options reconnues : class, sizes, loading, decoding, fetchpriority, width,
 * height. Les dimensions non fournies sont déduites du manifeste ; fournir la
 * seule hauteur (cas des logos partenaires, calés sur une hauteur fixe) suffit à
 * ce que la largeur en soit déduite, ce qui réserve la place avant chargement.
 */
function nexsim_picture(string $src, string $alt, array $options = []): string
{
    $entry = nexsim_image_manifest()[$src] ?? null;

    $width = $options['width'] ?? null;
    $height = $options['height'] ?? null;
    if ($entry && $entry['width'] > 0 && $entry['height'] > 0) {
        $ratio = $entry['width'] / $entry['height'];
        if ($width === null && $height === null) {
            $width = $entry['width'];
            $height = $entry['height'];
        } elseif ($width === null) {
            $width = (int) round($height * $ratio);
        } elseif ($height === null) {
            $height = (int) round($width / $ratio);
        }
    }

    $img = '<img' . nexsim_image_attrs([
        'class' => $options['class'] ?? null,
        'src' => $src,
        'alt' => $alt,
        'width' => $width,
        'height' => $height,
        'loading' => $options['loading'] ?? 'lazy',
        'decoding' => $options['decoding'] ?? 'async',
        'fetchpriority' => $options['fetchpriority'] ?? null,
    ]) . '>';

    if (!$entry) {
        return $img;
    }

    /* Sans indication explicite, l'image occupe une largeur fixe connue : c'est
       le cas des portraits et des logos, dimensionnés en CSS. */
    $sizes = $options['sizes'] ?? ($width ? $width . 'px' : null);

    $sources = '';
    foreach (['avif' => 'image/avif', 'webp' => 'image/webp'] as $format => $mime) {
        $widths = $entry['variants'][$format] ?? [];
        if (!$widths) {
            continue;
        }
        $srcset = [];
        foreach ($widths as $variantWidth) {
            $srcset[] = nexsim_image_variant($src, $variantWidth, $format) . ' ' . $variantWidth . 'w';
        }
        $sources .= '<source' . nexsim_image_attrs([
            'type' => $mime,
            'srcset' => implode(', ', $srcset),
            'sizes' => $sizes,
        ]) . '>';
    }

    return '<picture>' . $sources . $img . '</picture>';
}
