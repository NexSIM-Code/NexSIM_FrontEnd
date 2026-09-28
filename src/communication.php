<?php
/**
 * Kit de communication : logos, visuels et identité visuelle de NexSIM.
 *
 * Accessible par un clic droit sur le logo de l'en-tête (menu du logo, voir
 * scripts/animations.js) et depuis le pied de page. Les fichiers proposés sont
 * produits par tools/build-press-kit.mjs dans image/communication/ ; leurs
 * aperçus passent par image/opt (tools/build-images.mjs).
 */
require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/includes/images.php';

$isHome = false;
$pageTitle = t('seo.comm.title');
$pageDescription = t('seo.comm.description');
$canonical = 'https://www.nexsim.fr/communication.php';

const COMM_DIR = 'image/communication/';

/** Taille lisible d'un fichier du kit (« 17 ko », « 1,2 Mo »). */
function comm_size(string $file): string
{
    $path = __DIR__ . '/' . COMM_DIR . $file;
    $bytes = is_file($path) ? filesize($path) : 0;
    if ($bytes >= 1000 * 1000) {
        return str_replace('.', t('format.decimal'), sprintf('%.1f', $bytes / 1000 / 1000)) . ' ' . t('comm.unit.mb');
    }
    return max(1, (int) round($bytes / 1000)) . ' ' . t('comm.unit.kb');
}

/* Logos NexSIM : aperçu sur le fond auquel chaque version est destinée. */
$logos = [
    ['key' => 'dark', 'base' => 'nexsim-logo-fond-sombre', 'bg' => '#13212B'],
    ['key' => 'light', 'base' => 'nexsim-logo-fond-clair', 'bg' => '#E4ECF1'],
];

/* Visuels matriciels, par section. Pour ajouter un visuel (un futur logo LuSIM,
   par exemple) : le déposer via tools/build-press-kit.mjs, puis l'ajouter ici. */
$visuals = [
    'lusim' => [
        ['file' => 'lusim-simulateur-pulmonaire.jpg', 'key' => 'comm.lusim.poster'],
        ['file' => 'lusim-realite-virtuelle.png', 'key' => 'comm.lusim.vr'],
        ['file' => 'nexvr-realite-virtuelle.jpg', 'key' => 'comm.lusim.nexvr'],
    ],
    'apps' => [
        ['file' => 'nexcontrol-icone-512.png', 'key' => 'comm.apps.nexcontrol', 'icon' => true],
        ['file' => 'nexhome-icone-512.png', 'key' => 'comm.apps.nexhome', 'icon' => true, 'svg' => 'nexhome-icone.svg'],
        ['file' => 'nexcontrol-capture-theme-sombre.jpg', 'key' => 'comm.apps.capture.dark'],
        ['file' => 'nexcontrol-capture-theme-clair.jpg', 'key' => 'comm.apps.capture.light'],
    ],
];

/* Couleurs : palette 60-30-10 du site et des applications, et couleurs du logo. */
$colors = [
    ['hex' => '#13212B', 'key' => 'comm.color.dominant'],
    ['hex' => '#325771', 'key' => 'comm.color.secondary'],
    ['hex' => '#86EAE9', 'key' => 'comm.color.accent'],
    ['hex' => '#E4ECF1', 'key' => 'comm.color.light'],
];

function comm_rgb(string $hex): string
{
    [$r, $g, $b] = sscanf($hex, '#%02x%02x%02x');
    return "RGB $r, $g, $b";
}

/* Données structurées : une collection d'images officielles, rattachées à
   l'organisation. LuSIM reste une marque (Brand), jamais un produit. */
$site = 'https://www.nexsim.fr/';
$imageObjects = [];
foreach ($logos as $logo) {
    $imageObjects[] = [
        '@type' => 'ImageObject',
        'name' => t('comm.logo.' . $logo['key'] . '.alt'),
        'contentUrl' => $site . COMM_DIR . $logo['base'] . '-2048.png',
        'encodingFormat' => 'image/png',
        'creator' => ['@id' => $site . '#organization'],
        'copyrightHolder' => ['@id' => $site . '#organization'],
    ];
}
foreach (array_merge($visuals['lusim'], $visuals['apps']) as $visual) {
    $imageObjects[] = [
        '@type' => 'ImageObject',
        'name' => t($visual['key'] . '.alt'),
        'contentUrl' => $site . COMM_DIR . $visual['file'],
        'creator' => ['@id' => $site . '#organization'],
        'copyrightHolder' => ['@id' => $site . '#organization'],
    ];
}
$jsonLd = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'CollectionPage',
            '@id' => $canonical . '#webpage',
            'url' => $canonical,
            'name' => $pageTitle,
            'description' => $pageDescription,
            'inLanguage' => nexsim_lang(),
            'isPartOf' => ['@type' => 'WebSite', 'url' => $site, 'name' => 'Nexsim'],
            'about' => [
                ['@id' => $site . '#organization'],
                ['@id' => $site . '#brand-lusim'],
            ],
            'primaryImageOfPage' => ['@id' => $canonical . '#logo'],
            'hasPart' => $imageObjects,
        ],
        [
            '@type' => 'Organization',
            '@id' => $site . '#organization',
            'name' => 'Nexsim',
            'alternateName' => 'NexSIM',
            'url' => $site,
            'logo' => [
                '@type' => 'ImageObject',
                '@id' => $canonical . '#logo',
                'url' => $site . COMM_DIR . 'nexsim-logo-carre-512.png',
                'width' => 512,
                'height' => 512,
                'caption' => t('comm.logo.square.alt'),
            ],
            'brand' => ['@id' => $site . '#brand-lusim'],
        ],
        [
            '@type' => 'Brand',
            '@id' => $site . '#brand-lusim',
            'name' => 'LuSIM',
            'description' => t('comm.lusim.intro'),
            'image' => $site . COMM_DIR . 'lusim-simulateur-pulmonaire.jpg',
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Nexsim', 'item' => $site],
                ['@type' => 'ListItem', 'position' => 2, 'name' => t('comm.eyebrow'), 'item' => $canonical],
            ],
        ],
    ],
];

include __DIR__ . '/partials/head.php';
?>
<script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?></script>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main" class="comm-page">
    <div class="container">
        <a href="index.php" class="legal-back"><svg width="18" height="18" aria-hidden="true"><use href="#i-arrow-left"/></svg><?= t('legal.back') ?></a>

        <header class="comm-head">
            <span class="eyebrow"><?= t('comm.eyebrow') ?></span>
            <h1 class="section-title"><?= t('comm.title') ?></h1>
            <p><?= t('comm.intro') ?></p>
            <p class="comm-tip"><?= t('comm.tip') ?></p>
            <nav class="comm-toc" aria-label="<?= e('comm.toc.aria') ?>">
                <a href="#logo"><?= t('comm.logo.title') ?></a>
                <a href="#lusim"><?= t('comm.lusim.title') ?></a>
                <a href="#applications"><?= t('comm.apps.title') ?></a>
                <a href="#couleurs"><?= t('comm.colors.title') ?></a>
                <a href="#typographie"><?= t('comm.font.title') ?></a>
                <a href="#contact-presse"><?= t('comm.contact.title') ?></a>
            </nav>
        </header>

        <!-- Logo NexSIM -->
        <section id="logo" class="comm-section" aria-labelledby="logo-title">
            <h2 id="logo-title"><?= t('comm.logo.title') ?></h2>
            <p class="comm-lead"><?= t('comm.logo.intro') ?></p>
            <div class="comm-grid">
                <?php foreach ($logos as $logo): $base = COMM_DIR . $logo['base']; ?>
                <article class="card comm-card">
                    <div class="comm-preview comm-preview-logo" style="background: <?= $logo['bg'] ?>">
                        <img src="<?= $base ?>.svg" alt="<?= e('comm.logo.' . $logo['key'] . '.alt') ?>" width="320" height="218" loading="lazy">
                    </div>
                    <div class="comm-body">
                        <h3><?= t('comm.logo.' . $logo['key'] . '.title') ?></h3>
                        <div class="comm-downloads">
                            <a class="btn btn-accent" href="<?= $base ?>.svg" download>SVG <small><?= comm_size($logo['base'] . '.svg') ?></small></a>
                            <?php foreach ([512, 1024, 2048] as $width): ?>
                            <a class="btn btn-outline" href="<?= $base ?>-<?= $width ?>.png" download>PNG <?= $width ?> px <small><?= comm_size($logo['base'] . '-' . $width . '.png') ?></small></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
                <article class="card comm-card">
                    <div class="comm-preview comm-preview-logo" style="background: #FFFFFF">
                        <img src="<?= COMM_DIR ?>nexsim-logo-carre-512.png" alt="<?= e('comm.logo.square.alt') ?>" width="218" height="218" loading="lazy">
                    </div>
                    <div class="comm-body">
                        <h3><?= t('comm.logo.square.title') ?></h3>
                        <p><?= t('comm.logo.square.desc') ?></p>
                        <div class="comm-downloads">
                            <a class="btn btn-accent" href="<?= COMM_DIR ?>nexsim-logo-carre-512.png" download>PNG 512 px <small><?= comm_size('nexsim-logo-carre-512.png') ?></small></a>
                        </div>
                    </div>
                </article>
            </div>

            <h3 class="comm-subtitle"><?= t('comm.rules.title') ?></h3>
            <ul class="comm-rules">
                <?php foreach (['comm.rules.li1', 'comm.rules.li2', 'comm.rules.li3', 'comm.rules.li4'] as $key): ?>
                <li><?= t($key) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <?php foreach (['lusim' => 'lusim', 'apps' => 'applications'] as $group => $anchor): ?>
        <section id="<?= $anchor ?>" class="comm-section" aria-labelledby="<?= $anchor ?>-title">
            <h2 id="<?= $anchor ?>-title"><?= t('comm.' . $group . '.title') ?></h2>
            <p class="comm-lead"><?= t('comm.' . $group . '.intro') ?></p>
            <div class="comm-grid">
                <?php foreach ($visuals[$group] as $visual): $src = COMM_DIR . $visual['file']; $isIcon = !empty($visual['icon']); ?>
                <article class="card comm-card">
                    <div class="comm-preview<?= $isIcon ? ' comm-preview-icon' : '' ?>">
                        <?= nexsim_picture($src, t($visual['key'] . '.alt'), ['sizes' => $isIcon ? '160px' : '(max-width: 700px) 92vw, 420px']) ?>
                    </div>
                    <div class="comm-body">
                        <h3><?= t($visual['key'] . '.title') ?></h3>
                        <div class="comm-downloads">
                            <?php if (!empty($visual['svg'])): ?>
                            <a class="btn btn-accent" href="<?= COMM_DIR . $visual['svg'] ?>" download>SVG <small><?= comm_size($visual['svg']) ?></small></a>
                            <?php endif; ?>
                            <a class="btn <?= empty($visual['svg']) ? 'btn-accent' : 'btn-outline' ?>" href="<?= $src ?>" download><?= strtoupper(pathinfo($visual['file'], PATHINFO_EXTENSION)) ?> <small><?= comm_size($visual['file']) ?></small></a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php if ($group === 'lusim'): ?>
            <p class="comm-more"><a href="videos/Lusim_V10.mp4" download><?= t('comm.lusim.video') ?></a></p>
            <?php endif; ?>
        </section>
        <?php endforeach; ?>

        <!-- Couleurs -->
        <section id="couleurs" class="comm-section" aria-labelledby="couleurs-title">
            <h2 id="couleurs-title"><?= t('comm.colors.title') ?></h2>
            <p class="comm-lead"><?= t('comm.colors.intro') ?></p>
            <ul class="comm-colors">
                <?php foreach ($colors as $color): ?>
                <li class="card comm-color">
                    <span class="comm-swatch" style="background: <?= $color['hex'] ?>" aria-hidden="true"></span>
                    <span class="comm-color-name"><?= t($color['key']) ?></span>
                    <code><?= $color['hex'] ?></code>
                    <small><?= comm_rgb($color['hex']) ?></small>
                    <button type="button" class="btn btn-ghost comm-copy" data-copy="<?= $color['hex'] ?>"
                            data-copied="<?= e('comm.copied') ?>"><?= t('comm.copy') ?></button>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Typographie -->
        <section id="typographie" class="comm-section" aria-labelledby="typographie-title">
            <h2 id="typographie-title"><?= t('comm.font.title') ?></h2>
            <div class="card comm-font">
                <p class="comm-font-sample" aria-hidden="true">Aa</p>
                <div>
                    <h3>Rubik</h3>
                    <p><?= t('comm.font.p') ?></p>
                    <a href="https://fonts.google.com/specimen/Rubik" rel="noopener" target="_blank"><?= t('comm.font.link') ?></a>
                </div>
            </div>
        </section>

        <!-- Contact presse -->
        <section id="contact-presse" class="comm-section" aria-labelledby="contact-presse-title">
            <h2 id="contact-presse-title"><?= t('comm.contact.title') ?></h2>
            <p><?= t('comm.contact.p') ?> <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a></p>
        </section>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
