<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Mentions légales | Nexsim</title>
    <?php
    $seo = [
            'title' => 'Mentions légales | Nexsim',
            'description' => "Mentions légales du site Nexsim : éditeur, hébergeur, propriété intellectuelle, responsabilité.",
            'path' => '/mentions-legales.php'
    ];
    include 'partials/seo.php';
    ?>
</head>
<body>
<?php include 'partials/navbar.php'; ?>
<div class="main-content">
    <section class="content-section">
        <h1>Mentions légales</h1>
        <p>Dernière mise à jour : <?php echo date('d/m/Y'); ?></p>
    </section>

    <section class="content-section">
        <h2>Éditeur du site</h2>
        <p><strong>Nexsim – Next Simulation</strong><br>
            9 Rue Becquerel<br>
            90000 Belfort, France<br>
            Email : <a href="mailto:contact@lusim.fr">contact@lusim.fr</a>
        </p>
        <!--    <p>Forme juridique / SIREN : à compléter</p>-->
        <!--    <p>Directeur de la publication : à compléter</p>-->
    </section>

    <section class="content-section">
        <h2>Hébergement</h2>
        <p>Hébergeur : Nexsim</p>
    </section>

    <section class="content-section">
        <h2>Propriété intellectuelle</h2>
        <p>Le présent site et l'ensemble de son contenu (textes, images, graphismes, logos, marques, etc.) sont protégés
            par le droit d'auteur et le droit des marques. Toute reproduction, représentation, modification,
            publication, transmission, dénaturation, totale ou partielle du site ou de son contenu, par quelque procédé
            que ce soit, et sur quelque support que ce soit, est interdite sauf autorisation préalable et écrite de
            Nexsim.</p>
    </section>

    <section class="content-section">
        <h2>Responsabilité</h2>
        <p>Nexsim s'efforce d'assurer l'exactitude et la mise à jour des informations diffusées sur ce site. Elle se
            réserve le droit d'en corriger, à tout moment et sans préavis, le contenu. Toutefois, Nexsim ne peut
            garantir l'exactitude, la précision ou l'exhaustivité des informations mises à disposition sur ce site. En
            conséquence, Nexsim décline toute responsabilité pour toute imprécision, inexactitude ou omission portant
            sur des informations disponibles sur le site.</p>
    </section>

    <section class="content-section">
        <h2>Liens</h2>
        <p>Les liens hypertextes mis en place dans le cadre du présent site en direction d'autres ressources présentes
            sur le réseau Internet ne sauraient engager la responsabilité de Nexsim.</p>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>
