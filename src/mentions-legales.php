<?php
$isHome = false;
$pageTitle = 'Mentions légales | Nexsim';
$pageDescription = "Mentions légales du site nexsim.fr : éditeur, hébergeur, propriété intellectuelle et responsabilité.";
$canonical = 'https://www.nexsim.fr/mentions-legales.php';
include __DIR__ . '/partials/head.php';
?>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main" class="legal-page">
    <div class="container legal">
        <a href="index.php" class="legal-back"><svg width="18" height="18" aria-hidden="true"><use href="#i-arrow-left"/></svg>Retour à l'accueil</a>
        <span class="eyebrow">Informations légales</span>
        <h1>Mentions légales</h1>
        <p class="legal-updated">Dernière mise à jour : <?= date('d/m/Y', filemtime(__FILE__)) ?></p>

        <section>
            <h2>1. Éditeur du site</h2>
            <p>Le site <a href="https://www.nexsim.fr/">www.nexsim.fr</a> est édité par :</p>
            <address class="legal-address">
                <strong>Nexsim</strong><br>
                SAS, société par actions simplifiée<br>
                au capital de 90000 EUR<br>
                13 Rue Ernest Thierry-Mieg, 90000 Belfort, France<br>
                Belfort B 105 973 325 - 10597332500019 - 5829B<br>
                E-mail : <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>
            </address>
            <p><strong>Directeur de la publication :</strong> Jules Ferlin, Président.</p>
        </section>

        <section>
            <h2>2. Hébergement</h2>
            <p>Le site est hébergé par :</p>
            <address class="legal-address">
                <strong>OVH SAS</strong><br>
                2 rue Kellermann, 59100 Roubaix,  France<br>
            </address>
        </section>

        <section>
            <h2>3. Propriété intellectuelle</h2>
            <p>L'ensemble des contenus présents sur ce site (textes, images, vidéos, modèles 3D, logos, marques, éléments graphiques et logiciels) est la propriété exclusive de Nexsim ou de ses partenaires et est protégé par le Code de la propriété intellectuelle.</p>
            <p>Toute reproduction, représentation, modification, publication ou adaptation de tout ou partie de ces éléments, quel que soit le moyen ou le procédé utilisé, est interdite sans l'autorisation écrite préalable de Nexsim.</p>
            <p>« LuSIM », « NexControl » et « Nexsim » sont des dénominations utilisées par Nexsim. Les logos des établissements partenaires restent la propriété de leurs titulaires respectifs et sont affichés avec leur accord.</p>
        </section>

        <section>
            <h2>4. Responsabilité</h2>
            <p>Nexsim s'efforce de fournir sur ce site des informations aussi précises que possible. Toutefois, les informations diffusées sont présentées à titre indicatif et sont susceptibles d'évoluer. Elles ne constituent pas une offre contractuelle.</p>
            <p>LuSIM est un dispositif de formation et de simulation. Il n'est pas destiné à un usage sur patient et ne constitue pas un dispositif médical.</p>
            <p>Nexsim ne saurait être tenue responsable des dommages directs ou indirects résultant de l'accès au site, de son utilisation ou de l'impossibilité d'y accéder. Les liens vers des sites tiers (réseaux sociaux notamment) sont fournis à titre de commodité ; Nexsim n'exerce aucun contrôle sur leur contenu.</p>
        </section>

        <section>
            <h2>5. Données personnelles et cookies</h2>
            <p>Les modalités de traitement des données personnelles et l'usage des traceurs sont décrits dans notre <a href="politique-de-confidentialite.php">politique de confidentialité</a>.</p>
        </section>

        <section>
            <h2>6. Droit applicable</h2>
            <p>Les présentes mentions légales sont soumises au droit français. En cas de litige et à défaut de résolution amiable, les tribunaux compétents seront ceux du ressort du siège social de Nexsim.</p>
        </section>

        <section>
            <h2>7. Crédits</h2>
            <p>Conception et réalisation du site : Nexsim. Vidéo de présentation réalisée par Léonard Jund. Police de caractères Open Sans (licence SIL Open Font). Visionneuse 3D : <code>&lt;model-viewer&gt;</code> (licence Apache 2.0).</p>
        </section>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
