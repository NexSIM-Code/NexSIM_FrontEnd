<?php
require_once __DIR__ . '/includes/bootstrap.php';

$isHome = false;
$pageTitle = t('seo.legal.title');
$pageDescription = t('seo.legal.description');
$canonical = 'https://www.nexsim.fr/mentions-legales.php';
$notice = t('legal.translation_notice');
include __DIR__ . '/partials/head.php';
?>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main" class="legal-page">
    <div class="container legal">
        <a href="index.php" class="legal-back"><svg width="18" height="18" aria-hidden="true"><use href="#i-arrow-left"/></svg><?= t('legal.back') ?></a>
        <span class="eyebrow"><?= t('legal.eyebrow') ?></span>
        <h1><?= t('legal.title') ?></h1>
        <p class="legal-updated"><?= t('legal.updated', ['date' => date(t('format.date'), filemtime(__FILE__))]) ?></p>
        <?php if ($notice !== ''): ?>
        <p class="legal-notice" lang="<?= htmlspecialchars(nexsim_lang()) ?>"><?= $notice ?></p>
        <?php endif; ?>

        <section>
            <h2><?= t('legal.s1.title') ?></h2>
            <p><?= t('legal.s1.intro') ?></p>
            <address class="legal-address">
                <strong>Nexsim</strong><br>
                <?= t('legal.s1.form') ?><br>
                <?= t('legal.s1.capital') ?><br>
                13 Rue Ernest Thierry-Mieg, 90000 Belfort, France<br>
                Belfort B 105 973 325 - 10597332500019 - 5829B<br>
                <?= t('legal.s1.email') ?> <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>
            </address>
            <p><?= t('legal.s1.director') ?></p>
        </section>

        <section>
            <h2><?= t('legal.s2.title') ?></h2>
            <p><?= t('legal.s2.intro') ?></p>
            <address class="legal-address">
                <strong>OVH SAS</strong><br>
                2 rue Kellermann, 59100 Roubaix, France<br>
            </address>
        </section>

        <section>
            <h2><?= t('legal.s3.title') ?></h2>
            <p><?= t('legal.s3.p1') ?></p>
            <p><?= t('legal.s3.p2') ?></p>
            <p><?= t('legal.s3.p3') ?></p>
        </section>

        <section>
            <h2><?= t('legal.s4.title') ?></h2>
            <p><?= t('legal.s4.p1') ?></p>
            <p><?= t('legal.s4.p2') ?></p>
            <p><?= t('legal.s4.p3') ?></p>
        </section>

        <section>
            <h2><?= t('legal.s5.title') ?></h2>
            <p><?= t('legal.s5.p', ['privacy' => 'politique-de-confidentialite.php']) ?></p>
        </section>

        <section>
            <h2><?= t('legal.s6.title') ?></h2>
            <p><?= t('legal.s6.p') ?></p>
        </section>

        <section>
            <h2><?= t('legal.s7.title') ?></h2>
            <p><?= t('legal.s7.p') ?></p>
        </section>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
