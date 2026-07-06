<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 1.1 Balises de Métadonnées -->
    <title>Nexsim LuSIM | Simulateur Pulmonaire de Formation Médicale</title>
    <meta name="description"
          content="Découvrez LuSIM par Nexsim, le premier simulateur pulmonaire hybride (VR et physique) conçu pour faciliter la formation en ventilation mécanique.">

    <!-- 1.3 URL Canonique -->
    <link rel="canonical" href="https://www.nexsim.fr/">

    <!-- 3.1 Architecture Internationale et hreflang -->
    <link rel="alternate" hreflang="fr" href="https://www.nexsim.fr/"/>
    <link rel="alternate" hreflang="x-default" href="https://www.nexsim.fr/"/>

    <!-- 2.1 Directives Globales d'Indexation -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- 9. Vérification Google Search Console -->
    <meta name="google-site-verification" content="KjI3msHzOdGMSiN_H8r7V6Dy7Gt18m67kyVdILfri4w"/>

    <!-- 5.1 Protocole Open Graph (OG) -->
    <meta property="og:title" content="Nexsim LuSIM | Simulateur Pulmonaire de Formation Médicale">
    <meta property="og:description"
          content="Découvrez LuSIM par Nexsim, le premier simulateur pulmonaire hybride conçu pour faciliter la formation en ventilation mécanique.">
    <meta property="og:url" content="https://www.nexsim.fr/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.nexsim.fr/image/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="Simulateur pulmonaire LuSIM par Nexsim">
    <meta property="og:site_name" content="Nexsim">
    <meta property="og:locale" content="fr_FR">

    <!-- 5.2 Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nexsim LuSIM | Simulateur Pulmonaire de Formation Médicale">
    <meta name="twitter:description"
          content="Découvrez LuSIM par Nexsim, le premier simulateur pulmonaire hybride conçu pour faciliter la formation en ventilation mécanique.">
    <meta name="twitter:image" content="https://www.nexsim.fr/image/og-image.jpg">
    <meta name="twitter:site" content="@nexsim_fr">

    <!-- 7. Performance et Priorisation (Resource Hints) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="css/style.css">
    <!-- Note: Preloading the video can be heavy, only preload the poster or keep it auto if critical -->

    <!-- CSS et Polices -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script src="scripts/animations.js" defer></script>

    <!-- 8. Speculation Rules API (Amélioration prédictive des performances pour les liens internes) -->
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

    <!-- 4. Web Sémantique : Données Structurées JSON-LD (Graph) -->
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
                        "url": "https://www.nexsim.fr/image/logo.png"
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
<body>
<header class="navbar" role="banner">
    <div class="logo">
        <a href="#accueil" aria-label="Retour à l'accueil" style="display: flex; align-items: center;">
            <img src="image/logo.svg" alt="Logo Nexsim" height="40" width="120" style="object-fit: contain;">
        </a>
    </div>
    <nav role="navigation" aria-label="Navigation principale">
        <a href="#accueil">Accueil</a>
        <a href="#avantages">Avantages</a>
        <a href="#pedagogie">Pédagogie</a>
        <a href="#equipe">L'équipe</a>
        <a href="#contact" class="btn btn-outline">Nous contacter</a>
    </nav>
</header>

<main role="main">
    <!-- Section 1 : Hero / Vidéo -->
    <section id="accueil" class="hero">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="videos/Lusim_V10.mov" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="animate-fade-in-up">LuSIM<br>Le simulateur pulmonaire</h1>
            <p class="animate-fade-in-up delay-1">Découvrez le poumon pédagogique hybride pour la formation médicale et paramédicale</p>
            <a href="#avantages" class="scroll-indicator animate-bounce" aria-label="Découvrir les avantages de LuSIM">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14M19 12l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    <!-- Section 2 : Physique -->
    <section id="physique" class="section">
        <div class="container">
            <h2 class="section-title">La partie physique :</h2>
            <div class="3d-renderer" style="position: relative; border-radius: 16px; overflow: hidden; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);">
                <!-- Importation de Model Viewer -->
                <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>
                
                <model-viewer 
                    src="./modeles/lusim.glb"
                    alt="Modèle 3D de la partie physique de LuSIM" 
                    auto-rotate 
                    auto-rotate-delay="1000"
                    camera-controls 
                    style="width: 100%; height: 500px;"
                    rotation-per-second="1000%"
                    camera-orbit="0deg 60deg 2.5m"
                ></model-viewer>
                
                <button onclick="document.getElementById('dialog-3d').showModal()" class="btn btn-outline" style="position: absolute; bottom: 15px; right: 15px; background: rgba(18, 28, 38, 0.8);">
                    Agrandir ⛶
                </button>
            </div>

            <!-- Dialog pour la vue agrandie -->
            <dialog id="dialog-3d" class="glass" style="width: 95vw; height: 95vh; max-width: 1400px; max-height: 900px; margin: auto; padding: 0; border: none; border-radius: 16px; overflow: hidden;">
                <div style="display: flex; flex-direction: column; width: 100%; height: 100%;">
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 2rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1); background: var(--bg-dark);">
                        <h3 style="margin: 0; color: #fff;">LuSIM - Vue 3D</h3>
                        <button onclick="document.getElementById('dialog-3d').close()" class="btn btn-outline" style="padding: 0.5rem 1rem;">Fermer ✕</button>
                    </div>
                    <div style="flex-grow: 1; background: var(--bg-darker);">
                        <model-viewer
                                src="./modeles/lusim.glb"
                                alt="Modèle 3D de la partie physique de LuSIM"
                                auto-rotate
                                auto-rotate-delay="1000"
                                camera-controls
                                style="width: 100%; height: 500px;"
                                rotation-per-second="1000%"
                                camera-orbit="0deg 60deg 2.5m"
                        ></model-viewer>
                    </div>
                </div>
            </dialog>
            
            <style>
                dialog::backdrop {
                    background: rgba(0, 0, 0, 0.8);
                    backdrop-filter: blur(5px);
                }
            </style>
        </div>
    </section>

    <!-- Section 3 : Réalité virtuelle -->
    <section id="vr" class="section bg-darker">
        <div class="container">
            <h2 class="section-title">La partie numérique :</h2>
            <div>
            </div>
        </div>
    </section>

    <!-- Section 4 : Nos offres -->
    <section id="offers" class="section bg-darker">
        <div class="container">
            <h2 class="section-title">Nos offres</h2>
            <div class="grid-3 scroll-animated-list">
                <article class="card glass">
                    <div class="card-icon" aria-hidden="true"><img src="./image/training.png" alt="Rent Icon" width="50" height="50"></div>
                    <h3>Formation</h3>
                    <p>Nous proposons des formations adaptées à vos besoins.</p>
                </article>
                <article class="card glass">
                    <div class="card-icon" aria-hidden="true"><img src="./image/rent.png" alt="Rent Icon" width="50" height="50"></div>
                    <h3>Location</h3>
                    <p>Tous nos produits sont disponibles pour la location.</p>
                </article>
                <article class="card glass">
                    <div class="card-icon" aria-hidden="true"><img src="./image/shopping-cart.png" alt="Rent Icon" width="50" height="50"></div>
                    <h3>Achat</h3>
                    <p></p>
                </article>
            </div>
        </div>
    </section>

    <!-- Section 3 : Pédagogie -->
    <section id="pedagogie" class="section bg-darker">
        <div class="container">
            <h2 class="section-title">Notre produit au service de la pédagogie</h2>
            <div class="flex-layout">
                <div class="text-content scroll-fade-in">
                    <h3>Rendre la respiration visible pour mieux l'apprendre</h3>
                    <p>Apprendre à bien régler un respirateur est souvent un défi pour le personnel. L'approche très visuelle et concrète de LuSIM simplifie grandement cet apprentissage, le rendant accessible aux infirmiers, internes et médecins spécialistes.</p>
                    <ul>
                        <li><strong>Prévention facilitée</strong> : Les soignants voient directement comment un mauvais réglage peut blesser les poumons, ce qui les aide à mieux protéger les vrais patients.
                        </li>
                        <li><strong>Scénarios sur mesure</strong> : L'enseignant ou le formateur peut modifier l'état du patient virtuel en direct (comme déclencher une crise d'asthme) pour adapter l'exercice aux besoins de l'apprenant.
                        </li>
                        <li><strong>Entraînement réaliste</strong> : Les équipes manipulent les vrais tuyaux et apprennent à réagir efficacement aux véritables alarmes de vos équipements hospitaliers.
                        </li>
                    </ul>
                </div>
                <div class="image-content scroll-fade-in">
                    <div class="photo-placeholder glass">
                        <!-- Image optimisée SEO : balise img avec attributs alt, width, height et loading="lazy" -->
                        <img src="image/lusim-vr.png"
                             alt="Un soignant utilisant le casque de réalité virtuelle NexVR pour observer l'anatomie pulmonaire de LuSIM"
                             width="600" height="450" loading="lazy"
                             style="max-width: 100%; height: auto; border-radius: 8px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4 : L'Équipe -->
    <section id="equipe" class="section">
        <div class="container text-center">
            <h2 class="section-title">L'équipe derrière NexSIM</h2>
            <p class="subtitle">Des professionnels alliant expertise médicale, ingénierie et nouvelles technologies pour concevoir la meilleure solution de formation pour votre hôpital.</p>
            <div class="team-grid scroll-animated-list">
                <div class="team-member glass">
                    <!-- Image optimisée SEO -->
                    <img src="image/person/jules.png" alt="Jules Ferlin" class="avatar-placeholder" width="100"
                         height="100" loading="lazy" style="object-fit: cover;">
                    <h4>Jules FERLIN</h4>
                    <p>Président & Ingénieur Informatique</p>
                </div>
                <div class="team-member glass">
                    <img src="image/person/lucas.png" alt="Lucas Romary" class="avatar-placeholder" width="100"
                         height="100" loading="lazy" style="object-fit: cover;">
                    <h4>Lucas ROMARY</h4>
                    <p>Ingénieur Mécatronique</p>
                </div>
                <div class="team-member glass">
                    <img src="image/person/jean-sebastien.png" alt="Dr Jean-Sébastien Buvat" class="avatar-placeholder"
                         width="100" height="100" loading="lazy" style="object-fit: cover;">
                    <h4>Dr Jean-Sébastien BUVAT</h4>
                    <p>Médecin Anesthésiste-Réanimateur</p>
                </div>
                <div class="team-member glass">
                    <img src="image/person/laurent.png" alt="Laurent Faivre" class="avatar-placeholder" width="100"
                         height="100" loading="lazy" style="object-fit: cover;">
                    <h4>Laurent FAIVRE</h4>
                    <p>Ingénieur Pédagogique</p>
                </div>
                <div class="team-member glass">
                    <img src="image/person/fabrice.png" alt="Fabrice Lauri" class="avatar-placeholder" width="100"
                         height="100" loading="lazy" style="object-fit: cover;">
                    <h4>Fabrice LAURI</h4>
                    <p>Maître de conférence IA/VR</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section bg-cyan text-dark">
        <div class="container text-center">
            <h2>Prêt à moderniser vos formations médicales ?</h2>
            <p>Contactez-nous pour organiser une démonstration de LuSIM au sein de votre établissement, que vous représentiez un pôle de soins, une direction des achats ou un centre de formation.</p>
            <a href="mailto:contact@nexsim.fr" class="btn btn-dark mt-2" title="Envoyer un email de contact à Nexsim">Envoyer
                un message</a>
        </div>
    </section>
</main>

<!-- Pied de page avec protection data-nosnippet pour les clauses légales -->
<footer data-nosnippet>
    <div class="container flex-footer">
        <div class="footer-logo">
            <img src="image/logo.svg" alt="Logo Nexsim" height="30" width="90" loading="lazy" style="object-fit: contain;">
        </div>
        <div class="footer-links">
            <p>&copy; <?php echo date("Y"); ?> Nexsim. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</body>
</html>