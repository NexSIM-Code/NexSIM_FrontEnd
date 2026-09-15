<?php
require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/includes/modules.php';
require_once __DIR__ . '/includes/images.php';

$isHome = true;
$pageTitle = t('seo.home.title');
$pageDescription = t('seo.home.description');
$canonical = 'https://www.nexsim.fr/';

/* Logos partenaires : tous les fichiers image du dossier image/partenaires sont affichés. */
$logoDir = __DIR__ . '/image/partenaires';
$logos = is_dir($logoDir)
    ? array_values(array_filter(scandir($logoDir), fn($f) => preg_match('/\.(svg|png|jpe?g|webp|avif)$/i', $f)))
    : [];
sort($logos, SORT_NATURAL | SORT_FLAG_CASE);
$logoAlt = fn(string $file): string => ucfirst(trim(preg_replace('/[-_]+/', ' ', pathinfo($file, PATHINFO_FILENAME))));

/* Modules mécaniques : géométrie + libellés traduits (voir includes/modules.php). */
/* Emplacement occupé par les illustrations, dérivé du CSS : .container vaut
   min(1500px, 100vw - 2 x clamp(1rem, 5vw, 3rem)), .split le coupe en deux
   colonnes séparées par clamp(1.5rem, 5vw, 4rem) au-delà de 900 px, et la carte
   .image-content retire 0,75rem de marge intérieure de chaque côté. Annoncer
   une largeur trop généreuse ferait basculer le navigateur sur la déclinaison
   supérieure du srcset pour rien. */
$illustrationSizes = implode(', ', [
    '(max-width: 900px) calc(90vw - 24px)',   /* une seule colonne */
    '(max-width: 1279px) calc(47.5vw - 72px)', /* deux colonnes, gouttière à 5vw */
    '(max-width: 1595px) calc(50vw - 104px)',  /* gouttière plafonnée à 4rem */
    '694px',                                   /* conteneur plafonné à 1500 px */
]);

$modules = nexsim_modules();
$defaultModule = nexsim_default_module();

/* Points chauds sur la maquette 3D : position (m) dans le repère du modèle, orbite caméra à l'activation. */
$renderHotspots = function () use ($modules, $defaultModule) {
    foreach ($modules as $key => $m) {
        printf(
            '<button type="button" class="hotspot%s" slot="hotspot-%s" data-module="%s" data-position="%s" data-normal="%s" data-orbit="%s" data-visibility-attribute="visible" aria-label="%s"><span class="hotspot-dot"></span><span class="hotspot-label">%s</span></button>' . "\n",
            $key === $defaultModule ? ' active' : '',
            $key, $key, $m['position'], $m['normal'], $m['orbit'],
            htmlspecialchars(t('phys.hotspot.aria', ['module' => $m['label']]), ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($m['label'], ENT_QUOTES, 'UTF-8')
        );
    }
};

/* Puces de sélection du module, réutilisées dans la page et dans la vue agrandie. */
$renderChips = function () use ($modules, $defaultModule) {
    foreach ($modules as $key => $m) {
        printf(
            '<button type="button" class="chip%s" data-module="%s" aria-pressed="%s">%s</button>' . "\n",
            $key === $defaultModule ? ' active' : '', $key,
            $key === $defaultModule ? 'true' : 'false',
            htmlspecialchars($m['label'], ENT_QUOTES, 'UTF-8')
        );
    }
};

/* Équipe : les noms sont invariables, seules les fonctions sont traduites. */
$team = [
    ['name' => 'Jules FERLIN', 'photo' => 'jules.png', 'alt' => 'Jules Ferlin', 'role' => 'team.jules.role'],
    ['name' => 'Lucas ROMARY', 'photo' => 'lucas.png', 'alt' => 'Lucas Romary', 'role' => 'team.lucas.role'],
    ['name' => 'Dr Jean-Sébastien BUVAT', 'photo' => 'jean-sebastien.png', 'alt' => 'Dr Jean-Sébastien Buvat', 'role' => 'team.jean-sebastien.role'],
    ['name' => 'Laurent FAIVRE', 'photo' => 'laurent.png', 'alt' => 'Laurent Faivre', 'role' => 'team.laurent.role'],
    ['name' => 'Fabrice LAURI', 'photo' => 'fabrice.png', 'alt' => 'Fabrice Lauri', 'role' => 'team.fabrice.role'],
];

include __DIR__ . '/partials/head.php';
?>
    <!-- Speculation Rules API -->
    <script type="speculationrules">
        {
          "prefetch": [
            {
              "source": "document",
              "where": {
                "and": [
                  { "href_matches": "/*" },
                  { "not": { "href_matches": "/logout" } }
                ]
              },
              "eagerness": "moderate"
            }
          ]
        }
    </script>

    <!-- Données Structurées JSON-LD (Graph) -->
    <script type="application/ld+json">
        <?= json_encode([
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => 'https://www.nexsim.fr/#organization',
                    'name' => 'Nexsim',
                    'url' => 'https://www.nexsim.fr/',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => 'https://www.nexsim.fr/image/logo_Nexsim_light.svg',
                    ],
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '9 Rue Becquerel',
                        'postalCode' => '90000',
                        'addressLocality' => 'Belfort',
                        'addressCountry' => 'FR',
                    ],
                    'sameAs' => ['https://www.linkedin.com/company/nexsim/'],
                ],
                [
                    '@type' => 'Product',
                    '@id' => 'https://www.nexsim.fr/#product',
                    'name' => 'LuSIM',
                    'description' => t('jsonld.product.description'),
                    'brand' => ['@id' => 'https://www.nexsim.fr/#organization'],
                    'category' => 'Medical Equipment',
                ],
                [
                    '@type' => 'WebPage',
                    '@id' => 'https://www.nexsim.fr/#webpage',
                    'url' => 'https://www.nexsim.fr/',
                    'name' => t('seo.home.title'),
                    'inLanguage' => nexsim_lang(),
                    'about' => ['@id' => 'https://www.nexsim.fr/#product'],
                ],
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_HEX_TAG) ?>
    </script>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main">
    <!-- Section 1 : Hero / Vidéo -->
    <section id="accueil" class="hero">
        <video class="hero-video" autoplay muted loop playsinline preload="metadata"
               poster="videos/poster.jpg"
               data-src-desktop="videos/Lusim_V10.mp4"
               data-src-mobile="videos/Lusim_V10_720.mp4"
               aria-hidden="true">
        </video>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="animate-fade-in-up"><?= t('hero.title') ?><br><span class="accent"><?= t('hero.subtitle') ?></span></h1>
                <p class="animate-fade-in-up delay-1"><?= t('hero.lead') ?></p>
                <div class="hero-actions animate-fade-in-up delay-2">
                    <a href="#contact" class="btn btn-accent"><?= t('hero.cta.demo') ?></a>
                    <a href="#physique" class="btn btn-outline"><?= t('hero.cta.discover') ?></a>
                </div>
            </div>
        </div>
        <a href="#physique" class="scroll-indicator animate-bounce" aria-label="<?= e('hero.cta.discover') ?>">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 5v14M19 12l-7 7-7-7"/>
            </svg>
        </a>
    </section>

    <!-- Section 2 : Partie physique (maquette 3D) -->
    <section id="physique" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow"><?= t('phys.eyebrow') ?></span>
                <h2 class="section-title"><?= t('phys.title') ?></h2>
                <p><?= t('phys.lead') ?></p>
            </div>

            <div class="viewer-layout">
                <div class="card viewer-card">
                    <div class="viewer-toolbar">
                        <div class="chips" role="group" aria-label="<?= e('phys.aria.modules') ?>">
                            <?php $renderChips(); ?>
                        </div>
                        <button type="button" class="btn btn-ghost" data-open-dialog>
                            <svg width="18" height="18" aria-hidden="true"><use href="#i-expand"/></svg><?= t('phys.expand') ?>
                        </button>
                    </div>
                    <div class="viewer-stage">
                        <model-viewer
                            src="./modeles/lusim.glb"
                            alt="<?= e('phys.viewer.alt') ?>"
                            loading="lazy"
                            auto-rotate
                            auto-rotate-delay="3000"
                            rotation-per-second="30deg"
                            camera-controls
                            touch-action="pan-y"
                            shadow-intensity="1"
                            camera-orbit="0deg 60deg 2.5m"
                        >
                            <?php $renderHotspots(); ?>
                        </model-viewer>
                        <span class="viewer-hint"><?= t('phys.viewer.hint') ?></span>
                    </div>
                </div>

                <aside class="card module-panel" aria-live="polite">
                    <span class="eyebrow"><?= t('phys.panel.eyebrow') ?></span>
                    <h3 id="module-title"><?= t("module.$defaultModule.title") ?></h3>
                    <p id="module-desc"><?= t("module.$defaultModule.desc") ?></p>
                    <ul id="module-list" class="module-list">
                        <?php foreach ($modules[$defaultModule]['points'] as $point): ?>
                        <li><?= htmlspecialchars($point) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
            </div>

            <!-- Dialog pour la vue agrandie -->
            <dialog id="dialog-3d" class="dialog-3d" aria-labelledby="dialog-3d-title">
                <div class="dialog-inner">
                    <div class="dialog-head">
                        <h3 id="dialog-3d-title"><?= t('phys.dialog.title') ?></h3>
                        <div class="chips" role="group" aria-label="<?= e('phys.aria.modules') ?>">
                            <?php $renderChips(); ?>
                        </div>
                        <button type="button" class="btn btn-ghost" data-close-dialog>
                            <svg width="18" height="18" aria-hidden="true"><use href="#i-close"/></svg><?= t('phys.close') ?>
                        </button>
                    </div>
                    <div class="dialog-body">
                        <model-viewer
                            data-src="./modeles/lusim.glb"
                            alt="<?= e('phys.viewer.alt') ?>"
                            auto-rotate
                            auto-rotate-delay="3000"
                            rotation-per-second="30deg"
                            camera-controls
                            shadow-intensity="1"
                            camera-orbit="0deg 60deg 2.5m"
                        >
                            <?php $renderHotspots(); ?>
                        </model-viewer>
                    </div>
                </div>
            </dialog>
        </div>
    </section>

    <!-- Section 3 : Partie numérique -->
    <section id="numerique" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow"><?= t('num.eyebrow') ?></span>
                <h2 class="section-title"><?= t('num.title') ?></h2>
                <p><?= t('num.lead') ?></p>
            </div>

            <!-- Bloc 1 : image à gauche, texte à droite -->
            <div class="split split-block">
                <div class="image-content card scroll-fade-in">
                    <?php if (file_exists(__DIR__ . '/image/nexcontrol_light.png')): ?>
                    <?= nexsim_picture('image/nexcontrol_light.png', t('num.app.img.alt'), ['class' => 'nexcontrol-light', 'sizes' => $illustrationSizes]) ?>
                    <?= nexsim_picture('image/nexcontrol_dark.png', t('num.app.img.alt'), ['class' => 'nexcontrol-dark', 'sizes' => $illustrationSizes]) ?>
                    <?php else: ?>
                    <div class="image-placeholder" role="img" aria-label="<?= e('num.app.placeholder.aria') ?>">
                        <svg aria-hidden="true"><use href="#i-phone"/></svg>
                        <span><?= t('num.app.placeholder.label') ?></span>
                        <small><?= t('num.app.placeholder.hint') ?></small>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="text-content scroll-fade-in">
                    <span class="eyebrow"><?= t('num.app.eyebrow') ?></span>
                    <h3><?= t('num.app.title') ?></h3>
                    <p><?= t('num.app.p') ?></p>
                    <ul>
                        <?php foreach (['num.app.li1', 'num.app.li2', 'num.app.li3', 'num.app.li4'] as $key): ?>
                        <li><svg aria-hidden="true"><use href="#i-check"/></svg><span><?= t($key) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="split-note"><?= t('num.app.note') ?></p>
                </div>
            </div>

            <!-- Bloc 2 : texte à gauche, image à droite -->
            <div class="split split-block">
                <div class="text-content scroll-fade-in">
                    <span class="eyebrow"><?= t('num.vr.eyebrow') ?></span>
                    <h3><?= t('num.vr.title') ?></h3>
                    <p><?= t('num.vr.p') ?></p>
                    <ul>
                        <?php foreach (['num.vr.li1', 'num.vr.li2'] as $key): ?>
                        <li><svg aria-hidden="true"><use href="#i-check"/></svg><span><?= t($key) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="split-note"><?= t('num.vr.note') ?></p>
                </div>
                <div class="image-content card scroll-fade-in">
                    <?= nexsim_picture('image/vr.jpeg', t('num.vr.img.alt'), ['sizes' => $illustrationSizes]) ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4 : Nos offres -->
    <section id="offres" class="section section-tint">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow"><?= t('offers.eyebrow') ?></span>
                <h2 class="section-title"><?= t('offers.title') ?></h2>
            </div>
            <div class="grid-3 scroll-animated-list">
                <?php foreach (['training' => 'i-training', 'rent' => 'i-rent', 'buy' => 'i-cart'] as $offer => $icon): ?>
                <article class="card feature offer">
                    <div class="feature-icon" aria-hidden="true"><svg><use href="#<?= $icon ?>"/></svg></div>
                    <h3><?= t("offers.$offer.title") ?></h3>
                    <p><?= t("offers.$offer.p") ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Section 5 : Pédagogie -->
    <section id="pedagogie" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow"><?= t('peda.eyebrow') ?></span>
                <h2 class="section-title"><?= t('peda.title') ?></h2>
            </div>
            <div class="split">
                <div class="text-content scroll-fade-in">
                    <h3><?= t('peda.subtitle') ?></h3>
                    <p><?= t('peda.p') ?></p>
                    <ul>
                        <?php foreach (['peda.li1', 'peda.li2', 'peda.li3'] as $key): ?>
                        <li><svg aria-hidden="true"><use href="#i-check"/></svg><span><?= t($key) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="split-tagline"><?= t('peda.tagline') ?></p>
                </div>
                <div class="image-content card scroll-fade-in">
                    <?= nexsim_picture('image/lusim-vr.png', t('peda.img.alt'), ['sizes' => $illustrationSizes]) ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6 : L'équipe -->
    <section id="equipe" class="section section-tint">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow"><?= t('team.eyebrow') ?></span>
                <h2 class="section-title"><?= t('team.title') ?></h2>
                <p><?= t('team.lead') ?></p>
            </div>
            <div class="team-grid scroll-animated-list">
                <?php foreach ($team as $member): ?>
                <div class="card team-member">
                    <?= nexsim_picture('image/person/' . $member['photo'], $member['alt'], ['class' => 'avatar', 'width' => 104, 'height' => 104]) ?>
                    <h4><?= htmlspecialchars($member['name']) ?></h4>
                    <p><?= t($member['role']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if ($logos): ?>
    <!-- Section 7 : Partenaires (carrousel alimenté par le dossier image/partenaires) -->
    <section id="partenaires" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow"><?= t('partners.eyebrow') ?></span>
                <h2 class="section-title"><?= t('partners.title') ?></h2>
            </div>
        </div>
        <div class="logo-marquee" style="--logo-count: <?= count($logos) ?>;" aria-label="<?= e('partners.aria') ?>">
            <?php for ($pass = 0; $pass < 2; $pass++): ?>
            <ul class="logo-track"<?= $pass ? ' aria-hidden="true"' : '' ?>>
                <?php foreach ($logos as $file): ?>
                <li class="logo-item">
                    <?php
                    /* Calé sur une hauteur CSS fixe : la largeur occupée dépend
                       du rapport propre à chaque logo (voir .logo-item img). */
                    $logoSrc = 'image/partenaires/' . $file;
                    echo nexsim_picture($logoSrc, $pass ? '' : $logoAlt($file), [
                        'height' => 96,
                        'sizes' => sprintf(
                            '(max-width: 900px) %dpx, %dpx',
                            nexsim_image_display_width($logoSrc, 64, 220),
                            nexsim_image_display_width($logoSrc, 96, 320)
                        ),
                    ]);
                    ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endfor; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- Section 8 : Contact -->
    <section id="contact" class="section">
        <div class="container">
            <div class="contact-card scroll-fade-in">
                <h2><?= t('contact.title') ?></h2>
                <p><?= t('contact.p') ?></p>
                <div class="contact-actions">
                    <a href="mailto:contact@nexsim.fr" class="btn btn-dark" title="<?= e('contact.mail.title') ?>">
                        <svg width="20" height="20" aria-hidden="true"><use href="#i-mail"/></svg><?= t('contact.mail') ?>
                    </a>
                    <a href="https://www.linkedin.com/company/nexsim/" class="btn btn-outline" rel="noopener" target="_blank"><?= t('contact.linkedin') ?></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
