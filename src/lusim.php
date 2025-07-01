<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexsim - Solutions de simulation médicale innovantes</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="image/favicon.png" type="image/png">
</head>
<body>
<!-- Barre de navigation -->
<?php include 'partials/navbar.php'; ?>

<!-- Contenu principal -->
<div class="main-content">
    <section class="content-section">
        <h2>Qu’est-ce que Lusim ?</h2>
        <div class="product-showcase">
            <div class="product-image">
                <img src="image/lusim.png" data-dark-src="image/lusim.png" alt="Simulateur Lusim"
                     class="product-main-image">
            </div>
            <div class="product-description">
                <p>Lusim est un simulateur hybride qui associe un module physique, un module VR et une application
                    mobile pour
                    offrir une formation complète à la ventilation mécanique.</p>
                <p>En moins de <strong>5</strong> minutes, déployez une séance de simulation transportable, réaliste et
                    sécurisée pour former
                    infirmiers, médecins et étudiants en santé.</p>
                <a href="#" class="cta-button">Demander une démonstration</a>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2>Principaux bénéfices</h2>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li>Simuler différentes pathologies pulmonaires</li>
            <li>Comprendre la mécanique respiratoire grâce à la VR</li>
            <li>Pratiquer des réglages de respirateurs en conditions réelles</li>
            <li>Créer des cas cliniques personnalisés</li>
            <li>Déployer et transporter facilement</li>
        </ul>
    </section>

    <section class="content-section">
        <h2>Modules inclus</h2>
        <div class="modules">
            <div class="module-card">
                <h3>Compliance</h3>
                <p>Réglage de la compliance pulmonaire pour simuler divers états pathologiques.</p>
            </div>
            <div class="module-card">
                <h3>Resistance</h3>
                <p>Simulation des résistances des voies aériennes pour cas cliniques variés.</p>
            </div>
            <div class="module-card">
                <h3>Trigger</h3>
                <p>Gestion des déclenchements respiratoires pour un réalisme accru.</p>
            </div>
            <div class="module-card">
                <h3>Scope</h3>
                <p>Module de monitoring physiologique pour observer les courbes respiratoires.</p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2>Pour qui ?</h2>
        <p>Lusim est conçu pour :</p>
        <ul style="margin-left: 20px; margin-bottom: 15px;">
            <li>Facultés de médecine et IFSI</li>
            <li>Centres de simulation médicale</li>
            <li>Fabricants de respirateurs (outil marketing)</li>
            <li>Services de réanimation et d’anesthésie</li>
        </ul>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>
