<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="qDKB2ei3_8JhsxrarHHWDW6jAzgNLag5ksAmdAWFFwE"/>
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Nexsim - Solutions de simulation médicale innovantes</title>
    <?php
    $seo = [
            'title' => 'Nexsim - Solutions de simulation médicale innovantes',
            'description' => "Spécialistes des solutions innovantes de simulation pour la formation du personnel soignant. Véritable poumon pédagogique pour les établissements et centres de simulation, Nexsim développe des technologies de pointe pour améliorer l'apprentissage et les compétences des professionnels de santé.",
            'path' => '/'
    ];
    include 'partials/seo.php';
    ?>
</head>
<body>

<!-- Barre de navigation -->
<?php include 'partials/navbar.php'; ?>

<!-- Contenu principal -->
<div class="main-content">
    <section class="content-section">
        <h1>Nexsim - Next Simulation</h1>
        <p>Spécialistes des solutions innovantes de simulation pour la formation du personnel soignant. Chez Nexsim,
            nous développons des technologies de pointe pour améliorer l'apprentissage et perfectionner les compétences
            des professionnels de santé.</p>
        <p>Notre mission : révolutionner la formation médicale grâce à des simulateurs réalistes et accessibles, un
            véritable poumon pédagogique au service des apprenants.</p>
    </section>

    <section class="content-section">
        <h2>À propos de nous</h2>
        <p>Fondée en 2021 par une équipe d'ingénieurs et de professionnels de santé, Nexsim est née d'un constat simple
            :
            la formation médicale traditionnelle présente des limites importantes en termes d'accessibilité et de
            réalisme.</p>

        <p>Notre vision est de démocratiser l'accès à des outils de simulation médicale de haute qualité, permettant aux
            établissements de santé et aux centres de formation de toutes tailles de bénéficier des avantages de la
            simulation.</p>

        <div class="about-highlights">
            <div class="highlight-item">
                <h3>Innovation</h3>
                <p>Nous combinons expertise médicale et ingénierie de pointe pour créer des solutions uniques.</p>
            </div>
            <div class="highlight-item">
                <h3>Accessibilité</h3>
                <p>Nos produits sont conçus pour être abordables et faciles à déployer dans tous les environnements.</p>
            </div>
            <div class="highlight-item">
                <h3>Pédagogie</h3>
                <p>Chaque fonctionnalité est pensée pour maximiser l'apprentissage et le transfert de compétences.</p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2>Notre écosystème de simulation</h2>
        <p>Nos solutions couvrent tous les besoins de formation et démonstration pour la ventilation mécanique et le
            monitorage.</p>
        <div class="ecosystem-graphic">
            <img src="image/schema-ecosysteme.png" data-dark-src="image/schema-ecosysteme-dark.png"
                 alt="Ecosystème NexSim">
        </div>
    </section>

    <section class="content-section">
        <h2>Nos produits</h2>
        <p>Découvrez notre gamme de simulateurs médicaux conçus par des experts pour des formations de qualité.</p>

        <div class="product-card">
            <h3>Lusim - Simulateur pulmonaire</h3>
            <p>Notre produit phare pour la formation aux soins respiratoires. Lusim reproduit fidèlement les
                comportements pulmonaires dans diverses situations cliniques, permettant aux soignants de s'exercer en
                toute sécurité.</p>
            <p>Idéal pour les écoles d'infirmiers, les facultés de médecine et les services de pneumologie.</p>
            <a href="lusim.php" class="cta-button">En savoir plus sur Lusim</a>
        </div>
    </section>

    <section class="content-section">
        <h2>Pourquoi choisir Nexsim ?</h2>
        <p>Nos simulateurs médicaux offrent une expérience d'apprentissage sans risque pour les patients, permettant aux
            professionnels de santé de :</p>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li>Pratiquer des gestes techniques spécifiques</li>
            <li>Se familiariser avec des équipements complexes</li>
            <li>S'exercer sur des cas cliniques variés</li>
            <li>Perfectionner leurs compétences techniques</li>
            <li>Améliorer leur prise de décision clinique</li>
        </ul>
        <p>Développés en collaboration avec des professionnels de santé, nos produits répondent aux besoins réels du
            terrain.</p>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>
