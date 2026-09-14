<?php
require_once __DIR__ . '/includes/bootstrap.php';

$isHome = false;
$pageTitle = t('seo.privacy.title');
$pageDescription = t('seo.privacy.description');
$canonical = 'https://www.nexsim.fr/politique-de-confidentialite.php';
$notice = t('legal.translation_notice');

/* Cookies réellement déposés par le site : voir includes/cookies.php. */
$cookies = [
    NEXSIM_COOKIE_LANG  => 'privacy.cookies.lang.purpose',
    NEXSIM_COOKIE_THEME => 'privacy.cookies.theme.purpose',
];
include __DIR__ . '/partials/head.php';
?>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main" class="legal-page">
    <div class="container legal">
        <a href="index.php" class="legal-back"><svg width="18" height="18" aria-hidden="true"><use href="#i-arrow-left"/></svg><?= t('legal.back') ?></a>
        <span class="eyebrow"><?= t('legal.eyebrow') ?></span>
        <h1><?= t('privacy.title') ?></h1>
        <p class="legal-updated"><?= t('legal.updated', ['date' => date(t('format.date'), filemtime(__FILE__))]) ?></p>
        <?php if ($notice !== ''): ?>
        <p class="legal-notice" lang="<?= htmlspecialchars(nexsim_lang()) ?>"><?= $notice ?></p>
        <?php endif; ?>

        <p class="legal-intro"><?= t('privacy.intro') ?></p>

        <section>
            <h2><?= t('privacy.s1.title') ?></h2>
            <p><?= t('privacy.s1.p') ?></p>
        </section>

        <section>
            <h2><?= t('privacy.s2.title') ?></h2>
            <p><?= t('privacy.s2.intro') ?></p>
            <ul>
                <?php foreach (['privacy.s2.li1', 'privacy.s2.li2', 'privacy.s2.li3', 'privacy.s2.li4'] as $key): ?>
                <li><?= t($key) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h2><?= t('privacy.s3.title') ?></h2>
            <ul>
                <?php foreach (['privacy.s3.li1', 'privacy.s3.li2', 'privacy.s3.li3'] as $key): ?>
                <li><?= t($key) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h2><?= t('privacy.s4.title') ?></h2>
            <p><?= t('privacy.s4.intro') ?></p>
            <ul>
                <li><?= t('privacy.s4.li1') ?></li>
                <li><?= t('privacy.s4.li2') ?></li>
            </ul>
            <p><?= t('privacy.s4.end') ?></p>
        </section>

        <section>
            <h2><?= t('privacy.s5.title') ?></h2>
            <p><?= t('privacy.s5.intro') ?></p>
            <div class="legal-table-wrap">
                <table class="legal-table">
                    <thead>
                        <tr>
                            <th scope="col"><?= t('privacy.cookies.th.name') ?></th>
                            <th scope="col"><?= t('privacy.cookies.th.purpose') ?></th>
                            <th scope="col"><?= t('privacy.cookies.th.duration') ?></th>
                            <th scope="col"><?= t('privacy.cookies.th.basis') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cookies as $name => $purposeKey): ?>
                        <tr>
                            <th scope="row"><code><?= htmlspecialchars($name) ?></code></th>
                            <td><?= t($purposeKey) ?></td>
                            <td><?= t('privacy.cookies.duration') ?></td>
                            <td><?= t('privacy.cookies.basis') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p><?= t('privacy.s5.p2') ?></p>
            <p><?= t('privacy.s5.p3') ?></p>
            <p><?= t('privacy.s5.p4') ?></p>
        </section>

        <section>
            <h2><?= t('privacy.s6.title') ?></h2>
            <p><?= t('privacy.s6.p1') ?></p>
            <p><?= t('privacy.s6.p2') ?></p>
            <p><?= t('privacy.s6.p3') ?></p>
        </section>

        <section>
            <h2><?= t('privacy.s7.title') ?></h2>
            <p><?= t('privacy.s7.p') ?></p>
        </section>

        <section>
            <h2><?= t('privacy.s8.title') ?></h2>
            <p><?= t('privacy.s8.p') ?></p>
        </section>

        <section>
            <h2><?= t('privacy.s9.title') ?></h2>
            <p><?= t('privacy.s9.p') ?></p>
        </section>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
