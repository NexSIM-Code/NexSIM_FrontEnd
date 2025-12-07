<?php include 'partials/i18n.php';
include_once 'partials/seo_utils.php'; ?>
<!DOCTYPE html>
<html
        lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="KjI3msHzOdGMSiN_H8r7V6Dy7Gt18m67kyVdILfri4w"/>
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars(t('seo.default.title'), ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    $seo = [
            'title' => t('seo.default.title'),
            'description' => t('seo.default.description'),
            'path' => '/'
    ];
    // Inlined SEO partial (was: include 'partials/seo.php')
    // Basic SEO partial for site-wide meta tags, Open Graph, Twitter Cards, and JSON-LD
    // Defaults (localized where possible)
    $defaults = [
            'site_name' => function_exists('t') ? t('site.name') : 'Nexsim',
            'title' => function_exists('t') ? t('seo.default.title') : 'Nexsim - Solutions de simulation médicale innovantes',
            'description' => function_exists('t') ? t('seo.default.description') : "Nexsim conçoit des solutions de simulation médicale innovantes pour former le personnel soignant : simulateurs, VR et outils pédagogiques, un véritable poumon pédagogique pour la formation.",
            'image' => 'image/logo.png', // fallback; we will choose a best-effort existing image
            'robots' => 'index,follow',
            'type' => 'website',
    ];

    // Allow per-page override via $seo array if set
    if (!isset($seo) || !is_array($seo)) {
        $seo = [];
    }
    $config = array_merge($defaults, $seo);

    // Determine scheme and host to build absolute URLs
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $baseUrl = $scheme . '://' . $host;

    // Canonical URL is now handled by nx_generate_seo_tags() in the head

    // Absolute image URL
    $relativeImage = $config['image'];
    // Prefer existing images if available
    if (!file_exists($relativeImage) || is_dir($relativeImage)) {
        // Try common candidates in project
        $candidates = [
                'image/lusim.png',
                'image/logo.png',
                'image/logo-dark.svg',
                'image/logo.svg',
                'image/schema-ecosysteme.png',
        ];
        foreach ($candidates as $c) {
            if (file_exists($c)) {
                $relativeImage = $c;
                break;
            }
        }
    }
    $ogImage = rtrim($baseUrl, '/') . '/' . ltrim($relativeImage, '/');

    // Resolve site name (which may be a callable if i18n is active)
    $siteName = is_callable($defaults['site_name']) ? $defaults['site_name']() : $defaults['site_name'];

    // Build the <title> combining page title + site name if needed
    $title = $config['title'];
    if (stripos($title, 'Nexsim') === false) {
        $title .= ' | ' . $siteName;
    }

    $description = $config['description'];
    $robots = $config['robots'];
    $type = $config['type'];

    // Locale
    $ogLocale = isset($GLOBALS['NX_LOCALE']) ? $GLOBALS['NX_LOCALE'] : (function_exists('nx_locale_map') ? (nx_locale_map()[nx_detect_lang()] ?? 'fr_FR') : 'fr_FR');
    ?>
    <!-- Consent-aware tracking placeholders (loaded by cookie-consent.js upon consent) -->
    <script>
        // Configure your Tag Manager and GA4 IDs here
        window.NEXSIM_GTM_ID = 'GTM-NPTDG3KP';
        window.NEXSIM_GA_ID = 'G-7TCGNHL456';
    </script>
    <script src="scripts/cookie-consent.js" defer></script>

    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($robots, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Canonical URL & Hreflang -->
    <?php echo nx_generate_seo_tags($config); ?>

    <!-- Open Graph -->
    <meta property="og:site_name"
          content="<?php echo htmlspecialchars($defaults['site_name'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url"
          content="<?php echo htmlspecialchars($baseUrl . ($_SERVER['REQUEST_URI'] ?? '/'), ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="<?php echo $ogLocale; ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image:alt" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- PWA/UX small enhancements -->
    <meta name="theme-color" content="#0b2a4a">

    <!-- JSON-LD: Organization and WebSite -->
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Nexsim",
          "url": "<?php echo $baseUrl; ?>",
          "logo": "<?php echo rtrim($baseUrl, '/'); ?>/image/logo.svg",
          "sameAs": []
        }
    </script>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebSite",
          "name": "Nexsim",
          "url": "<?php echo $baseUrl; ?>"
        }
    </script>

    <?php
    // Optional Google Analytics GA4 loader
    // Provide per-page or global ID using $seo['ga_measurement_id'] = 'G-XXXXXXX';
    $gaId = $seo['ga_measurement_id'] ?? null;
    if ($gaId):
        ?>
        <script>window.NEXSIM_GA_ID = <?php echo json_encode($gaId); ?>;</script>
        <script src="scripts/analytics.js" defer></script>
    <?php endif; ?>
</head>

<body>

<!-- Barre de navigation -->
<?php include 'partials/navbar.php'; ?>

<!-- Contenu principal -->
<main class="main-content">
    <!-- Hero Section -->
    <div class="hero-section">
        <h1><?php echo htmlspecialchars(t('home.h1'), ENT_QUOTES, 'UTF-8'); ?></h1>
    </div>

    <!-- Carousel Section -->
    <?php
    $carouselImages = glob('image/carousel/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
    if (!empty($carouselImages)):
        ?>
        <section class="carousel-container">
            <div class="carousel-track" id="carouselTrack">
                <?php foreach ($carouselImages as $index => $image): ?>
                    <div class="carousel-slide">
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="Slide <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="carousel-nav" id="carouselNav">
                <?php foreach ($carouselImages as $index => $image): ?>
                    <button class="carousel-dot <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-index="<?php echo $index; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>
            <button class="carousel-arrow carousel-prev" id="carouselPrev" aria-label="Previous slide">&#10094;</button>
            <button class="carousel-arrow carousel-next" id="carouselNext" aria-label="Next slide">&#10095;</button>
        </section>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const track = document.getElementById('carouselTrack');
                const dots = document.querySelectorAll('.carousel-dot');
                const prevBtn = document.getElementById('carouselPrev');
                const nextBtn = document.getElementById('carouselNext');
                if (!track) return;

                let currentIndex = 0;
                const totalSlides = dots.length;

                function updateCarousel() {
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateCarousel();
                }

                nextBtn.addEventListener('click', nextSlide);
                prevBtn.addEventListener('click', prevSlide);

                dots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        currentIndex = parseInt(dot.dataset.index);
                        updateCarousel();
                    });
                });

                setInterval(nextSlide, 5000);
            });
        </script>
    <?php endif; ?>

    <section class="content-section">
        <p><?php echo htmlspecialchars(t('home.p2'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.about.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.about.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo htmlspecialchars(t('home.about.p2'), ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="about-highlights">
            <div class="highlight-item">
                <h3><?php echo htmlspecialchars(t('home.highlight.innovation'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('home.highlight.innovation.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="highlight-item">
                <h3><?php echo htmlspecialchars(t('home.highlight.accessibility'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('home.highlight.accessibility.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="highlight-item">
                <h3><?php echo htmlspecialchars(t('home.highlight.pedagogy'), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(t('home.highlight.pedagogy.p'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.ecosystem.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.ecosystem.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="ecosystem-graphic">
            <img src="image/schema-ecosysteme.png" data-dark-src="image/schema-ecosysteme-dark.png"
                 alt="Ecosystème NexSim">
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.products.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.products.p'), ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="product-card">
            <h3><?php echo htmlspecialchars(t('home.products.lusim.title'), ENT_QUOTES, 'UTF-8'); ?></h3>
            <p><?php echo htmlspecialchars(t('home.products.lusim.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
            <p><?php echo htmlspecialchars(t('home.products.lusim.p2'), ENT_QUOTES, 'UTF-8'); ?></p>
            <a href="lusim.php"
               class="cta-button"><?php echo htmlspecialchars(t('home.products.lusim.cta'), ENT_QUOTES, 'UTF-8'); ?></a>
        </div>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('home.why.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('home.why.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li><?php echo htmlspecialchars(t('home.why.li1'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li2'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li3'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li4'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('home.why.li5'), ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
        <p><?php echo htmlspecialchars(t('home.why.end'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>
</main>
<?php include 'partials/footer.php'; ?>
</body>

</html>