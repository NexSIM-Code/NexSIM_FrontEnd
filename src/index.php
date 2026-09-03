<?php
$isHome = true;
$pageTitle = 'Nexsim LuSIM | Simulateur Pulmonaire de Formation Médicale';
$pageDescription = "Découvrez LuSIM par Nexsim, le premier simulateur pulmonaire hybride (VR et physique) conçu pour faciliter la formation en ventilation mécanique.";
$canonical = 'https://www.nexsim.fr/';

/* Logos partenaires : tous les fichiers image du dossier image/partenaires sont affichés. */
$logoDir = __DIR__ . '/image/partenaires';
$logos = is_dir($logoDir)
    ? array_values(array_filter(scandir($logoDir), fn($f) => preg_match('/\.(svg|png|jpe?g|webp|avif)$/i', $f)))
    : [];
sort($logos, SORT_NATURAL | SORT_FLAG_CASE);
$logoAlt = fn(string $file): string => ucfirst(trim(preg_replace('/[-_]+/', ' ', pathinfo($file, PATHINFO_FILENAME))));

/* Points chauds sur la maquette 3D : position (m) dans le repère du modèle, orbite caméra à l'activation. */
$hotspots = [
    'compliance' => ['label' => 'Compliance', 'position' => '-0.097m 0.070m 0.148m', 'normal' => '0m 1m 0m',     'orbit' => '330deg 50deg 1.2m'],
    'resistance' => ['label' => 'Résistance', 'position' => '-0.001m 0.095m -0.040m', 'normal' => '-0.09m 1m 0m', 'orbit' => '30deg 45deg 1.0m'],
    'trigger'    => ['label' => 'Trigger',    'position' => '-0.001m 0.098m -0.201m', 'normal' => '0m 1m 0m',     'orbit' => '270deg 55deg 1.2m'],
];
$renderHotspots = function () use ($hotspots) {
    foreach ($hotspots as $key => $h) {
        printf(
            '<button type="button" class="hotspot%s" slot="hotspot-%s" data-module="%s" data-position="%s" data-normal="%s" data-orbit="%s" data-visibility-attribute="visible" aria-label="Voir le module %s"><span class="hotspot-dot"></span><span class="hotspot-label">%s</span></button>' . "\n",
            $key === 'compliance' ? ' active' : '', $key, $key, $h['position'], $h['normal'], $h['orbit'], $h['label'], $h['label']
        );
    }
};

include __DIR__ . '/partials/head.php';
?>
    <!-- Speculation Rules API -->
    <script type="speculationrules">
        {
          "prefetch": [
            {
              "source": "document",
              "where": {
                "and": [
                  { "href_matches": "/*" },
                  { "not": { "href_matches": "/logout" } }
                ]
              },
              "eagerness": "moderate"
            }
          ]
        }
    </script>

    <!-- Données Structurées JSON-LD (Graph) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [
                {
                    "@type": "Organization",
                    "@id": "https://www.nexsim.fr/#organization",
                    "name": "Nexsim",
                    "url": "https://www.nexsim.fr/",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "https://www.nexsim.fr/image/logo.svg"
                    },
                    "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "9 Rue Becquerel",
                        "postalCode": "90000",
                        "addressLocality": "Belfort",
                        "addressCountry": "FR"
                    },
                    "sameAs": [
                        "https://www.linkedin.com/company/nexsim/"
                    ]
                },
                {
                    "@type": "Product",
                    "@id": "https://www.nexsim.fr/#product",
                    "name": "LuSIM",
                    "description": "Simulateur pulmonaire hybride de nouvelle génération pour la formation en ventilation mécanique, fusionnant robotique physique et réalité virtuelle.",
                    "brand": {
                        "@id": "https://www.nexsim.fr/#organization"
                    },
                    "category": "Medical Equipment"
                },
                {
                    "@type": "WebPage",
                    "@id": "https://www.nexsim.fr/#webpage",
                    "url": "https://www.nexsim.fr/",
                    "name": "Nexsim LuSIM | Simulateur Pulmonaire de Formation Médicale",
                    "about": {
                        "@id": "https://www.nexsim.fr/#product"
                    }
                }
            ]
        }
    </script>
</head>
<?php include __DIR__ . '/partials/header.php'; ?>

<main role="main">
    <!-- Section 1 : Hero / Vidéo -->
    <section id="accueil" class="hero">
        <video class="hero-video" autoplay muted loop playsinline preload="metadata"
               poster="videos/poster.jpg"
               data-src-desktop="videos/Lusim_V10.mp4"
               data-src-mobile="videos/Lusim_V10_720.mp4"
               aria-hidden="true">
        </video>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <span class="hero-badge animate-fade-in-up">Simulateur hybride<span class="badge-extra"> · Physique + Réalité virtuelle</span></span>
                <h1 class="animate-fade-in-up">LuSIM<br><span class="accent">Le simulateur pulmonaire</span></h1>
                <p class="animate-fade-in-up delay-1">Le poumon pédagogique hybride pour la formation médicale et paramédicale à la ventilation mécanique.</p>
                <div class="hero-actions animate-fade-in-up delay-2">
                    <a href="#contact" class="btn btn-accent">Demander une démonstration</a>
                    <a href="#physique" class="btn btn-outline">Découvrir LuSIM</a>
                </div>
            </div>
        </div>
        <a href="#physique" class="scroll-indicator animate-bounce" aria-label="Découvrir LuSIM">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 5v14M19 12l-7 7-7-7"/>
            </svg>
        </a>
    </section>

    <!-- Section 2 : Partie physique (maquette 3D) -->
    <section id="physique" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow">La partie physique</span>
                <h2 class="section-title">Un poumon artificiel modulaire</h2>
                <p>Trois modules mécaniques pilotables en direct reproduisent les principales pathologies respiratoires. Explorez la maquette 3D et touchez un point pour localiser chaque module.</p>
            </div>

            <div class="viewer-layout">
                <div class="card viewer-card">
                    <div class="viewer-toolbar">
                        <div class="chips" role="group" aria-label="Choix du module">
                            <button type="button" class="chip active" data-module="compliance" aria-pressed="true">Compliance</button>
                            <button type="button" class="chip" data-module="resistance" aria-pressed="false">Résistance</button>
                            <button type="button" class="chip" data-module="trigger" aria-pressed="false">Trigger</button>
                        </div>
                        <button type="button" class="btn btn-ghost" data-open-dialog>
                            <svg width="18" height="18" aria-hidden="true"><use href="#i-expand"/></svg>Agrandir
                        </button>
                    </div>
                    <div class="viewer-stage">
                        <model-viewer
                            src="./modeles/lusim.glb"
                            alt="Modèle 3D de la partie physique de LuSIM"
                            loading="lazy"
                            auto-rotate
                            auto-rotate-delay="3000"
                            rotation-per-second="30deg"
                            camera-controls
                            touch-action="pan-y"
                            shadow-intensity="1"
                            camera-orbit="0deg 60deg 2.5m"
                        >
                            <?php $renderHotspots(); ?>
                        </model-viewer>
                        <span class="viewer-hint">Glissez pour faire tourner le modèle</span>
                    </div>
                </div>

                <aside class="card module-panel" aria-live="polite">
                    <span class="eyebrow">Module sélectionné</span>
                    <h3 id="module-title">Module de Compliance</h3>
                    <p id="module-desc">Modifie l'élasticité du poumon artificiel pour reproduire des états restrictifs sévères (poumon rigide caractéristique du SDRA) ou des états de compliance anormale (emphysème).</p>
                    <ul id="module-list" class="module-list"></ul>
                </aside>
            </div>

            <!-- Dialog pour la vue agrandie -->
            <dialog id="dialog-3d" class="dialog-3d" aria-labelledby="dialog-3d-title">
                <div class="dialog-inner">
                    <div class="dialog-head">
                        <h3 id="dialog-3d-title">LuSIM — Vue 3D</h3>
                        <div class="chips" role="group" aria-label="Choix du module">
                            <button type="button" class="chip active" data-module="compliance" aria-pressed="true">Compliance</button>
                            <button type="button" class="chip" data-module="resistance" aria-pressed="false">Résistance</button>
                            <button type="button" class="chip" data-module="trigger" aria-pressed="false">Trigger</button>
                        </div>
                        <button type="button" class="btn btn-ghost" data-close-dialog>
                            <svg width="18" height="18" aria-hidden="true"><use href="#i-close"/></svg>Fermer
                        </button>
                    </div>
                    <div class="dialog-body">
                        <model-viewer
                            data-src="./modeles/lusim.glb"
                            alt="Modèle 3D de la partie physique de LuSIM"
                            auto-rotate
                            auto-rotate-delay="3000"
                            rotation-per-second="30deg"
                            camera-controls
                            shadow-intensity="1"
                            camera-orbit="0deg 60deg 2.5m"
                        >
                            <?php $renderHotspots(); ?>
                        </model-viewer>
                    </div>
                </div>
            </dialog>
        </div>
    </section>

    <!-- Section 3 : Partie numérique -->
    <section id="numerique" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow">La partie numérique</span>
                <h2 class="section-title">Voir l'invisible, piloter la séance</h2>
                <p>Le module physique est complété par une application de réalité virtuelle et par l'application mobile NexControl qui pilote le simulateur.</p>
            </div>
            <div class="grid-2 scroll-animated-list">
                <article class="card feature">
                    <div class="feature-icon" aria-hidden="true"><svg><use href="#i-vr"/></svg></div>
                    <h3>Réalité virtuelle</h3>
                    <p>L'apprenant observe en immersion l'anatomie pulmonaire et l'effet de chaque réglage du respirateur sur les alvéoles, en temps réel.</p>
                    <ul>
                        <li>Anatomie pulmonaire animée et synchronisée avec le module physique</li>
                        <li>Visualisation des lésions liées à un mauvais réglage</li>
                        <li>Compatible avec les casques VR autonomes</li>
                    </ul>
                </article>
                <article class="card feature">
                    <div class="feature-icon" aria-hidden="true"><svg><use href="#i-phone"/></svg></div>
                    <h3>Application NexControl</h3>
                    <p>Le formateur pilote le simulateur depuis une tablette ou un smartphone : réglages manuels, pathologies pré-enregistrées et scénarios évolutifs.</p>
                    <ul>
                        <li>Mode manuel : compliance, résistance et trigger au doigt</li>
                        <li>Bibliothèque de pathologies (SDRA, BPCO, asthme…)</li>
                        <li>Connexion sans fil au module physique</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <!-- Section 4 : Nos offres -->
    <section id="offres" class="section section-tint">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow">Nos offres</span>
                <h2 class="section-title">Une solution adaptée à votre établissement</h2>
            </div>
            <div class="grid-3 scroll-animated-list">
                <article class="card feature offer">
                    <div class="feature-icon" aria-hidden="true"><svg><use href="#i-training"/></svg></div>
                    <h3>Formation</h3>
                    <p>Des sessions animées par des soignants formateurs, adaptées à vos équipes : IFSI, internes, réanimation, anesthésie.</p>
                </article>
                <article class="card feature offer">
                    <div class="feature-icon" aria-hidden="true"><svg><use href="#i-rent"/></svg></div>
                    <h3>Location</h3>
                    <p>Tous nos produits sont disponibles à la location, pour une journée de simulation ou une session complète.</p>
                </article>
                <article class="card feature offer">
                    <div class="feature-icon" aria-hidden="true"><svg><use href="#i-cart"/></svg></div>
                    <h3>Achat</h3>
                    <p>Intégrez LuSIM durablement à votre centre de simulation, avec mise en service, formation initiale et suivi.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Section 5 : Pédagogie -->
    <section id="pedagogie" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow">Pédagogie</span>
                <h2 class="section-title">Notre produit au service de la pédagogie</h2>
            </div>
            <div class="split">
                <div class="text-content scroll-fade-in">
                    <h3>Rendre la respiration visible pour mieux l'apprendre</h3>
                    <p>Apprendre à bien régler un respirateur est souvent un défi pour le personnel. L'approche très visuelle et concrète de LuSIM simplifie grandement cet apprentissage, le rendant accessible aux infirmiers, internes et médecins spécialistes.</p>
                    <ul>
                        <li><svg aria-hidden="true"><use href="#i-check"/></svg><span><strong>Prévention facilitée</strong> : les soignants voient directement comment un mauvais réglage peut blesser les poumons, ce qui les aide à mieux protéger les vrais patients.</span></li>
                        <li><svg aria-hidden="true"><use href="#i-check"/></svg><span><strong>Scénarios sur mesure</strong> : l'enseignant ou le formateur peut modifier l'état du patient virtuel en direct (comme déclencher une crise d'asthme) pour adapter l'exercice aux besoins de l'apprenant.</span></li>
                        <li><svg aria-hidden="true"><use href="#i-check"/></svg><span><strong>Entraînement réaliste</strong> : les équipes manipulent les vrais tuyaux et apprennent à réagir efficacement aux véritables alarmes de vos équipements hospitaliers.</span></li>
                    </ul>
                </div>
                <div class="image-content card scroll-fade-in">
                    <img src="image/lusim-vr.png"
                         alt="Un soignant utilisant le casque de réalité virtuelle NexVR pour observer l'anatomie pulmonaire de LuSIM"
                         width="600" height="450" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6 : L'équipe -->
    <section id="equipe" class="section section-tint">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow">L'équipe</span>
                <h2 class="section-title">L'équipe derrière NexSIM</h2>
                <p>Des professionnels alliant expertise médicale, ingénierie et nouvelles technologies pour concevoir la meilleure solution de formation pour votre hôpital.</p>
            </div>
            <div class="team-grid scroll-animated-list">
                <div class="card team-member">
                    <img src="image/person/jules.png" alt="Jules Ferlin" class="avatar" width="104" height="104" loading="lazy">
                    <h4>Jules FERLIN</h4>
                    <p>Président &amp; Ingénieur Informatique</p>
                </div>
                <div class="card team-member">
                    <img src="image/person/lucas.png" alt="Lucas Romary" class="avatar" width="104" height="104" loading="lazy">
                    <h4>Lucas ROMARY</h4>
                    <p>Ingénieur Mécatronique</p>
                </div>
                <div class="card team-member">
                    <img src="image/person/jean-sebastien.png" alt="Dr Jean-Sébastien Buvat" class="avatar" width="104" height="104" loading="lazy">
                    <h4>Dr Jean-Sébastien BUVAT</h4>
                    <p>Médecin Anesthésiste-Réanimateur</p>
                </div>
                <div class="card team-member">
                    <img src="image/person/laurent.png" alt="Laurent Faivre" class="avatar" width="104" height="104" loading="lazy">
                    <h4>Laurent FAIVRE</h4>
                    <p>Ingénieur Pédagogique</p>
                </div>
                <div class="card team-member">
                    <img src="image/person/fabrice.png" alt="Fabrice Lauri" class="avatar" width="104" height="104" loading="lazy">
                    <h4>Fabrice LAURI</h4>
                    <p>Maître de conférence IA/VR</p>
                </div>
            </div>
        </div>
    </section>

    <?php if ($logos): ?>
    <!-- Section 7 : Partenaires (carrousel alimenté par le dossier image/partenaires) -->
    <section id="partenaires" class="section">
        <div class="container">
            <div class="section-head scroll-fade-in">
                <span class="eyebrow">Ils nous font confiance</span>
                <h2 class="section-title">Nos établissements partenaires</h2>
            </div>
        </div>
        <div class="logo-marquee" style="--logo-count: <?= count($logos) ?>;" aria-label="Logos des établissements partenaires">
            <?php for ($pass = 0; $pass < 2; $pass++): ?>
            <ul class="logo-track"<?= $pass ? ' aria-hidden="true"' : '' ?>>
                <?php foreach ($logos as $file): ?>
                <li class="logo-item">
                    <img src="image/partenaires/<?= rawurlencode($file) ?>" alt="<?= $pass ? '' : htmlspecialchars($logoAlt($file)) ?>" loading="lazy" height="64">
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endfor; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- Section 8 : Contact -->
    <section id="contact" class="section">
        <div class="container">
            <div class="contact-card scroll-fade-in">
                <h2>Prêt à moderniser vos formations médicales ?</h2>
                <p>Contactez-nous pour organiser une démonstration de LuSIM au sein de votre établissement, que vous représentiez un pôle de soins, une direction des achats ou un centre de formation.</p>
                <div class="contact-actions">
                    <a href="mailto:contact@nexsim.fr" class="btn btn-dark" title="Envoyer un email de contact à Nexsim">
                        <svg width="20" height="20" aria-hidden="true"><use href="#i-mail"/></svg>Envoyer un message
                    </a>
                    <a href="https://www.linkedin.com/company/nexsim/" class="btn btn-outline" rel="noopener" target="_blank">Suivre sur LinkedIn</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
