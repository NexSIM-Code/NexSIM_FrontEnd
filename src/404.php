<?php
/**
 * Page d'erreur 404.
 *
 * Le site tenait autrefois en une page PHP par rubrique ; il tient maintenant en
 * une seule, découpée en sections. Les anciennes adresses connues sont
 * redirigées en 301 par .htaccess — c'est elles qui portent le référencement
 * acquis. Cette page ne reçoit donc que le reste : adresses jamais recensées,
 * fautes de frappe, liens tronqués.
 *
 * Pour ceux-là, deviner la section demandée à partir du nom de fichier serait
 * une redirection à l'aveugle : le visiteur atterrirait ailleurs sans savoir
 * pourquoi. La suggestion est donc proposée, pas imposée.
 */
require_once __DIR__ . '/includes/bootstrap.php';

/* ErrorDocument sert cette page sur l'URL demandée : sans en-tête explicite,
   Apache renverrait le 404 mais PHP, lui, a déjà fixé un 200 sur sa sortie. */
http_response_code(404);

/**
 * Sections vers lesquelles une adresse inconnue peut raisonnablement pointer.
 * La clé est l'ancre dans index.php ; 'label' réutilise le libellé du menu, de
 * sorte qu'un lien porte ici le nom que le visiteur voit dans la navigation ;
 * 'needles' liste les fragments qui désignent la section, choisis assez
 * distinctifs pour ne rien désigner d'autre.
 */
const NEXSIM_404_SECTIONS = [
    'physique'    => ['label' => 'nav.lusim',    'needles' => ['lusim', 'simulateur', 'simulator', 'produit', 'product', 'physique', 'physical']],
    'numerique'   => ['label' => 'nav.digital',  'needles' => ['numerique', 'digital', 'logiciel', 'software', 'nexcontrol', 'vr']],
    'pedagogie'   => ['label' => 'nav.pedagogy', 'needles' => ['pedagogie', 'pedagogy', 'formation', 'training', 'scenario']],
    'offres'      => ['label' => 'nav.offers',   'needles' => ['offre', 'offer', 'tarif', 'price', 'pricing']],
    'partenaires' => ['label' => 'nav.partners', 'needles' => ['partenaire', 'partner']],
    'equipe'      => ['label' => 'nav.team',     'needles' => ['equipe', 'team', 'about', 'apropos']],
    'contact'     => ['label' => 'nav.contact',  'needles' => ['contact', 'nous-contacter', 'devis', 'quote']],
];

/**
 * Section la plus plausible pour l'adresse demandée, ou null si rien ne ressort.
 * Seul le nom de fichier est examiné : le reste du chemin appartient à des
 * arborescences qui n'ont jamais existé sur ce site.
 */
function nexsim_404_guess(string $uri): ?string
{
    $name = strtolower(basename(parse_url($uri, PHP_URL_PATH) ?? ''));
    $name = preg_replace('/\.(php|html?|aspx?)$/', '', $name) ?? '';
    if ($name === '') {
        return null;
    }

    foreach (NEXSIM_404_SECTIONS as $anchor => $section) {
        foreach ($section['needles'] as $needle) {
            if (str_contains($name, $needle)) {
                return $anchor;
            }
        }
    }

    return null;
}

$guess = nexsim_404_guess($_SERVER['REQUEST_URI'] ?? '');

$isHome = false;
$noindex = true;
$pageTitle = t('seo.notfound.title');
$pageDescription = t('seo.notfound.description');
$canonical = 'https://www.nexsim.fr/';
include __DIR__ . '/partials/head.php';
?>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main" class="legal-page">
    <div class="container legal">
        <a href="/" class="legal-back"><svg width="18" height="18" aria-hidden="true"><use href="#i-arrow-left"/></svg><?= t('legal.back') ?></a>
        <span class="eyebrow"><?= t('notfound.eyebrow') ?></span>
        <h1><?= t('notfound.title') ?></h1>
        <p class="legal-intro"><?= t('notfound.intro') ?></p>

        <?php if ($guess !== null): ?>
        <section>
            <h2><?= t('notfound.guess.title') ?></h2>
            <p><?= t('notfound.guess.p', ['section' => t(NEXSIM_404_SECTIONS[$guess]['label'])]) ?></p>
            <p><a class="btn btn-accent" href="/#<?= htmlspecialchars($guess) ?>"><?= t('notfound.guess.cta', ['section' => t(NEXSIM_404_SECTIONS[$guess]['label'])]) ?></a></p>
        </section>
        <?php endif; ?>

        <section>
            <h2><?= t('notfound.sections.title') ?></h2>
            <ul>
                <?php foreach (NEXSIM_404_SECTIONS as $anchor => $section): ?>
                <li><a href="/#<?= htmlspecialchars($anchor) ?>"><?= t($section['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h2><?= t('notfound.help.title') ?></h2>
            <p><?= t('notfound.help.p') ?></p>
            <p><a class="btn btn-outline" href="/#contact"><?= t('nav.contact') ?></a></p>
        </section>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
