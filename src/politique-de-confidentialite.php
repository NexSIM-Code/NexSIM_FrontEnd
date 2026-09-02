<?php
$isHome = false;
$pageTitle = 'Politique de confidentialité | Nexsim';
$pageDescription = "Politique de confidentialité du site nexsim.fr : données collectées, finalités, durées de conservation, droits des personnes et cookies.";
$canonical = 'https://www.nexsim.fr/politique-de-confidentialite.php';
include __DIR__ . '/partials/head.php';
?>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main" class="legal-page">
    <div class="container legal">
        <a href="index.php" class="legal-back"><svg width="18" height="18" aria-hidden="true"><use href="#i-arrow-left"/></svg>Retour à l'accueil</a>
        <span class="eyebrow">Informations légales</span>
        <h1>Politique de confidentialité</h1>
        <p class="legal-updated">Dernière mise à jour : <?= date('d/m/Y', filemtime(__FILE__)) ?></p>

        <p class="legal-intro">Nexsim attache une grande importance à la protection de vos données personnelles. Cette politique décrit les données susceptibles d'être traitées lors de votre visite sur <a href="https://www.nexsim.fr/">www.nexsim.fr</a>, conformément au Règlement général sur la protection des données (RGPD) et à la loi Informatique et Libertés.</p>

        <section>
            <h2>1. Responsable du traitement</h2>
            <p>Le responsable du traitement est Nexsim, 9 Rue Becquerel, 90000 Belfort, France. Pour toute question relative à vos données : <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>.</p>
        </section>

        <section>
            <h2>2. Données collectées et finalités</h2>
            <p>Le site est un site vitrine : il ne comporte ni formulaire, ni espace client, ni outil de mesure d'audience. Les traitements sont limités aux cas suivants.</p>
            <ul>
                <li><strong>Demandes de contact par e-mail.</strong> Lorsque vous nous écrivez à l'adresse indiquée sur le site, nous traitons votre adresse e-mail, votre nom et le contenu de votre message afin de répondre à votre demande (démonstration, devis, information). Base légale : mesures précontractuelles prises à votre demande ou intérêt légitime à répondre aux sollicitations.</li>
                <li><strong>Journaux techniques du serveur.</strong> L'hébergeur enregistre automatiquement l'adresse IP, la date et l'heure de la visite, les pages consultées et le navigateur utilisé, à des fins de sécurité et de maintenance. Base légale : intérêt légitime à assurer la sécurité du service.</li>
                <li><strong>Préférence d'affichage.</strong> Le choix du thème clair ou sombre est enregistré localement dans votre navigateur (stockage local). Cette information ne quitte pas votre appareil et ne permet pas de vous identifier.</li>
            </ul>
        </section>

        <section>
            <h2>3. Durées de conservation</h2>
            <ul>
                <li>Échanges par e-mail : durée nécessaire au traitement de la demande, puis au maximum trois ans à compter du dernier contact si aucune relation contractuelle n'est établie.</li>
                <li>Journaux techniques : au maximum douze mois.</li>
                <li>Préférence d'affichage : jusqu'à suppression des données de site par vos soins dans le navigateur.</li>
            </ul>
        </section>

        <section>
            <h2>4. Destinataires et sous-traitants</h2>
            <p>Les données sont destinées aux seules personnes habilitées de Nexsim. Elles peuvent être traitées par nos sous-traitants techniques dans la limite de leurs missions :</p>
            <ul>
                <li><strong>Hébergeur du site</strong> : <span class="todo">[Nom de l'hébergeur à compléter]</span>, pour l'hébergement et les journaux techniques.</li>
                <li><strong>Google Fonts et Google Hosted Libraries</strong> : la police Open Sans et le composant de visualisation 3D sont chargés depuis les serveurs de Google LLC. Lors de ce chargement, votre navigateur transmet votre adresse IP à Google, susceptible d'être traitée aux États-Unis dans le cadre des clauses contractuelles types de la Commission européenne.</li>
            </ul>
            <p>Aucune donnée n'est vendue ni cédée à des tiers à des fins commerciales.</p>
        </section>

        <section>
            <h2>5. Cookies et traceurs</h2>
            <p>Le site ne dépose aucun cookie publicitaire ni de mesure d'audience. Le seul élément stocké sur votre appareil est la préférence de thème décrite ci-dessus, strictement nécessaire au fonctionnement de l'affichage et exemptée de consentement. Aucun bandeau de consentement n'est donc requis à ce jour ; cette politique sera mise à jour si des traceurs soumis à consentement venaient à être ajoutés.</p>
        </section>

        <section>
            <h2>6. Vos droits</h2>
            <p>Conformément au RGPD, vous disposez des droits d'accès, de rectification, d'effacement, de limitation, d'opposition et de portabilité de vos données, ainsi que du droit de définir des directives relatives au sort de vos données après votre décès.</p>
            <p>Pour exercer ces droits, écrivez-nous à <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a> ou par courrier à l'adresse du responsable du traitement. Une preuve d'identité pourra vous être demandée en cas de doute raisonnable. Nous répondons dans un délai d'un mois, prolongeable de deux mois en cas de demande complexe.</p>
            <p>Si vous estimez, après nous avoir contactés, que vos droits ne sont pas respectés, vous pouvez introduire une réclamation auprès de la CNIL (<a href="https://www.cnil.fr/" rel="noopener" target="_blank">www.cnil.fr</a>).</p>
        </section>

        <section>
            <h2>7. Sécurité</h2>
            <p>Nexsim met en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre la perte, l'accès non autorisé ou la divulgation : chiffrement des échanges (HTTPS), accès restreint aux messageries et mise à jour régulière des systèmes.</p>
        </section>

        <section>
            <h2>8. Liens vers des sites tiers</h2>
            <p>Le site contient des liens vers des services tiers, notamment LinkedIn. Ces services disposent de leurs propres politiques de confidentialité, que nous vous invitons à consulter. Nexsim n'est pas responsable des traitements réalisés par ces tiers.</p>
        </section>

        <section>
            <h2>9. Modification de la politique</h2>
            <p>Cette politique peut être mise à jour à tout moment, notamment en cas d'évolution du site ou de la réglementation. La date de dernière mise à jour figure en haut de cette page.</p>
        </section>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
