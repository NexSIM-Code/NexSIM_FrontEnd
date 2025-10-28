<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Politique de cookies | Nexsim</title>
    <?php
    $seo = [
            'title' => 'Politique de cookies | Nexsim',
            'description' => "Politique de cookies Nexsim : types de cookies utilisés, finalités, durée et gestion des préférences conformément au RGPD.",
            'path' => '/politique-cookies.php'
    ];
    include 'partials/seo.php';
    ?>
</head>
<body>
<?php include 'partials/navbar.php'; ?>
<div class="main-content">
    <section class="content-section">
        <h1>Politique de cookies</h1>
        <p>Dernière mise à jour : <?php echo date('d/m/Y'); ?></p>
    </section>

    <section class="content-section">
        <h2>Qu'est-ce qu'un cookie ?</h2>
        <p>Un cookie est un petit fichier texte déposé sur votre terminal (ordinateur, mobile, tablette) lors de votre
            visite sur un site. Il permet notamment d'assurer le bon fonctionnement du site ou de mesurer son
            audience.</p>
    </section>

    <section class="content-section">
        <h2>Cookies utilisés sur ce site</h2>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li><strong>Cookies strictement nécessaires</strong> – indispensables au fonctionnement et à la sécurité du
                site (toujours actifs et non soumis à consentement).
            </li>
            <li><strong>Cookies de mesure d'audience</strong> (Google Analytics 4) – activés uniquement avec votre
                consentement, afin d'obtenir des statistiques d'utilisation anonymisées et d'améliorer le site.
            </li>
        </ul>
    </section>

    <section class="content-section">
        <h2>Durée de conservation</h2>
        <p>La durée de vie des cookies varie selon leur nature. Les cookies d'analyse sont conservés au maximum 14 mois,
            conformément aux recommandations en vigueur.</p>
    </section>

    <section class="content-section">
        <h2>Gestion de vos préférences</h2>
        <p>Vous pouvez modifier vos préférences à tout moment via le lien « Préférences cookies » en pied de page.</p>
        <p>
            <a href="#" data-cookie-preferences class="cta-button">Ouvrir les préférences cookies</a>
        </p>
    </section>

    <section class="content-section">
        <h2>Plus d'informations</h2>
        <p>Pour en savoir plus sur nos traitements de données et vos droits, consultez notre <a
                    href="politique-confidentialite.php">Politique de confidentialité</a>.</p>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>
