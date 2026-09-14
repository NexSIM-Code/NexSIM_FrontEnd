<?php
/**
 * Dictionnaire français.
 * Les chaînes peuvent contenir du HTML simple (<strong>, <br>, <a>) : elles sont
 * insérées telles quelles par t(). Utiliser e() dans les attributs HTML.
 */
return [
    // ---------------------------------------------------------------- Général
    'format.date' => 'd/m/Y',
    'site.address' => '9 Rue Becquerel, 90000 Belfort, France',

    // ------------------------------------------------------------ Navigation
    'nav.aria.main' => 'Navigation principale',
    'nav.aria.home' => "Retour à l'accueil",
    'nav.logo.alt' => 'Logo Nexsim',
    'nav.home' => 'Accueil',
    'nav.lusim' => 'LuSIM',
    'nav.digital' => 'Numérique',
    'nav.offers' => 'Offres',
    'nav.pedagogy' => 'Pédagogie',
    'nav.team' => "L'équipe",
    'nav.contact' => 'Nous contacter',
    'nav.theme.light' => 'Activer le thème clair',
    'nav.theme.dark' => 'Activer le thème sombre',
    'nav.menu.open' => 'Ouvrir le menu',
    'nav.menu.close' => 'Fermer le menu',
    'nav.menu.aria' => 'Menu mobile',
    'nav.menu.title' => 'Navigation',

    // ------------------------------------------------------------------- SEO
    'seo.home.title' => 'Nexsim LuSIM | Simulateur pulmonaire de formation médicale',
    'seo.home.description' => "Découvrez LuSIM par Nexsim, le premier simulateur pulmonaire hybride (VR et physique) conçu pour faciliter la formation en ventilation mécanique.",
    'seo.og.image.alt' => 'Simulateur pulmonaire LuSIM par Nexsim',
    'jsonld.product.description' => "Simulateur pulmonaire hybride de nouvelle génération pour la formation en ventilation mécanique, fusionnant robotique physique et réalité virtuelle.",

    // ------------------------------------------------------ Section 1 : héros
    'hero.title' => 'LuSIM',
    'hero.subtitle' => 'Le simulateur pulmonaire',
    'hero.lead' => 'Le poumon pédagogique hybride pour la formation médicale et paramédicale à la ventilation mécanique.',
    'hero.cta.demo' => 'Demander une démonstration',
    'hero.cta.discover' => 'Découvrir LuSIM',

    // -------------------------------------------- Section 2 : partie physique
    'phys.eyebrow' => 'La partie physique',
    'phys.title' => 'Un poumon artificiel modulaire',
    'phys.lead' => 'Trois modules mécaniques pilotables en direct reproduisent les principales pathologies respiratoires. Explorez la maquette 3D et touchez un point pour localiser chaque module.',
    'phys.aria.modules' => 'Choix du module',
    'phys.hotspot.aria' => 'Voir le module {module}',
    'phys.expand' => 'Agrandir',
    'phys.close' => 'Fermer',
    'phys.viewer.alt' => 'Modèle 3D de la partie physique de LuSIM',
    'phys.viewer.hint' => 'Glissez pour faire tourner le modèle',
    'phys.panel.eyebrow' => 'Module sélectionné',
    'phys.dialog.title' => 'LuSIM — Vue 3D',

    'module.compliance.label' => 'Compliance',
    'module.compliance.title' => 'Module de Compliance',
    'module.compliance.desc' => "Modifie l'élasticité du poumon artificiel pour reproduire des pathologies alvéolaires aboutissant à des troubles de la compliance rencontrées fréquemment en milieu hospitalier.",
    'module.compliance.p1' => 'Possibilité d’un panel large de pathologies avec atteintes uni ou bilatérales des champs pulmonaires (SDRA, atélectasies, pneumothorax…)',
    'module.compliance.p2' => 'Réglage continu de la compliance pulmonaire, avec une représentation des courbes proche de la physiopathologie humaine',
    'module.compliance.p3' => 'Modification de la pression plateau, de la pression motrice et de la PEP intrinsèque en direct',

    'module.resistance.label' => 'Résistance',
    'module.resistance.title' => 'Module de Résistance',
    'module.resistance.desc' => 'Modifie avec facilité et réactivité la résistance des voies aériennes extra-alvéolaires tout en conservant la compliance pulmonaire. Ce module permet de simuler :',
    'module.resistance.p1' => 'Bronchospasme, crise d’asthme',
    'module.resistance.p2' => 'Œdème laryngé',
    'module.resistance.p3' => 'Sonde d’intubation obstruée, filtre saturé…',

    'module.trigger.label' => 'Trigger',
    'module.trigger.title' => 'Module Trigger',
    'module.trigger.desc' => "Gère l'interaction patient-machine en simulant un effort inspiratoire autonome du patient. Crucial pour l'enseignement du sevrage ventilatoire et la détection des asynchronies.",
    'module.trigger.p1' => 'Effort inspiratoire spontané paramétrable',
    'module.trigger.p2' => 'Apprentissage du sevrage ventilatoire',
    'module.trigger.p3' => 'Détection des asynchronies patient-ventilateur',

    // ------------------------------------------- Section 3 : partie numérique
    'num.eyebrow' => 'La partie numérique',
    'num.title' => "Voir l'invisible, piloter la séance",
    'num.lead' => 'Pilotez simplement les modules LuSIM depuis l’application mobile NexControl et ajustez vos scénarios en quelques gestes. Son interface intuitive facilite la prise en main et fluidifie chaque séance. Pour pousser l’immersion encore plus loin, LuSIM s’enrichit d’une application de réalité virtuelle qui plonge les apprenants au cœur de situations cliniques réalistes.',

    'num.app.eyebrow' => 'Application mobile',
    'num.app.title' => 'Application NexControl',
    'num.app.p' => 'Avec NexControl, le formateur garde le contrôle de la séance en temps réel : il ajuste les paramètres du simulateur, sélectionne des pathologies préconfigurées et fait évoluer les scénarios au rythme de l’apprentissage.',
    'num.app.li1' => 'Réglages en temps réel de la compliance, de la résistance et du trigger',
    'num.app.li2' => 'Bibliothèque de pathologies pré-enregistrées : SDRA, BPCO, asthme…',
    'num.app.li3' => 'Scénarios évolutifs pour adapter la situation clinique aux objectifs pédagogiques',
    'num.app.li4' => 'Connexion sans fil avec le module physique pour une utilisation fluide et sans contrainte',
    'num.app.note' => 'Une interface intuitive pour piloter la simulation du bout des doigts et se concentrer pleinement sur la pédagogie.',
    'num.app.img.alt' => "L'application NexControl sur tablette, pilotant le simulateur LuSIM",
    'num.app.placeholder.aria' => "Visuel de l'application NexControl à venir",
    'num.app.placeholder.label' => 'Application NexControl',
    'num.app.placeholder.hint' => 'Déposez <code>image/nexcontrol_light.png</code> pour afficher le visuel',

    'num.vr.eyebrow' => 'Réalité virtuelle',
    'num.vr.title' => 'Plongez au cœur de la mécanique respiratoire',
    'num.vr.p' => 'Une expérience immersive et interactive. Avec la réalité virtuelle, l’apprenant visualise en temps réel l’anatomie, la physiologie et la physiopathologie pulmonaires, pour mieux comprendre les mécanismes de la ventilation et les conséquences de chaque décision clinique.',
    'num.vr.li1' => 'Visualisation immédiate de l’effet des réglages du respirateur sur l’alvéole pulmonaire et des lésions potentielles liées à des réglages ventilatoires inadaptés',
    'num.vr.li2' => 'Représentation animée des principales maladies pulmonaires, synchronisée avec le module physique',
    'num.vr.note' => 'Une immersion au cœur du poumon pour rendre visible l’invisible et mieux comprendre l’impact de la ventilation mécanique.',
    'num.vr.img.alt' => "Un soignant utilisant le casque de réalité virtuelle NexVR pour observer l'anatomie pulmonaire de LuSIM",

    // ------------------------------------------------- Section 4 : nos offres
    'offers.eyebrow' => 'Nos offres',
    'offers.title' => 'Une solution adaptée à vos besoins',
    'offers.training.title' => 'Formation',
    'offers.training.p' => 'Des sessions de formation animées par des soignants formateurs et médecins, du niveau débutant à expert : ventilation en extra-hospitalier, USIP, USIC, SSPI, réanimation, bloc opératoire… adaptées au profil médical et paramédical.',
    'offers.rent.title' => 'Location',
    'offers.rent.p' => '<strong>Organisez vos formations en toute autonomie.</strong><br>Tous nos produits sont disponibles à la location, à la semaine ou au mois, pour vous permettre d’adapter facilement votre équipement à vos besoins et à votre rythme de formation.',
    'offers.buy.title' => 'Achat',
    'offers.buy.p' => '<strong>Faites de LuSIM un outil durable au cœur de vos formations.</strong><br>Intégrez LuSIM à votre centre de simulation, votre service ou votre organisme de formation, avec une mise en service complète, une formation à l’utilisation et un accompagnement personnalisé.',

    // -------------------------------------------------- Section 5 : pédagogie
    'peda.eyebrow' => 'Pédagogie',
    'peda.title' => 'Notre produit au service de la pédagogie',
    'peda.subtitle' => 'Rendre la respiration visible pour mieux l’apprendre',
    'peda.p' => 'Comprendre la ventilation mécanique devient plus simple lorsqu’on peut en visualiser les effets. Grâce à son approche concrète et immersive, LuSIM transforme des mécanismes complexes en situations faciles à comprendre, pour accompagner infirmiers, internes et médecins dans l’apprentissage de la ventilation.',
    'peda.li1' => '<strong>Prévenir les complications</strong> : mieux comprendre les pressions ventilatoires et les risques de barotraumatisme.',
    'peda.li2' => '<strong>Créer des scénarios sur mesure</strong> : faire évoluer l’état du patient en temps réel pour adapter chaque exercice.',
    'peda.li3' => '<strong>Développer le raisonnement clinique</strong> : confronter l’apprenant à des situations pathologiques réalistes pour mieux réagir en pratique.',
    'peda.tagline' => 'Voir, comprendre, décider : une nouvelle façon d’apprendre la ventilation mécanique.',
    'peda.img.alt' => "Un soignant utilisant le casque de réalité virtuelle NexVR pour observer l'anatomie pulmonaire de LuSIM",

    // --------------------------------------------------- Section 6 : l'équipe
    'team.eyebrow' => "L'équipe",
    'team.title' => "L'équipe derrière NexSIM",
    'team.lead' => 'Des professionnels alliant expertise médicale, ingénierie et nouvelles technologies pour concevoir la meilleure solution de formation pour votre hôpital.',
    'team.jules.role' => 'Ingénieur informatique',
    'team.lucas.role' => 'Ingénieur mécatronique',
    'team.jean-sebastien.role' => 'Médecin anesthésiste-réanimateur',
    'team.laurent.role' => 'Expert en ventilation',
    'team.fabrice.role' => 'Maître de conférences IA/VR',

    // ------------------------------------------------ Section 7 : partenaires
    'partners.eyebrow' => 'Ils nous font confiance',
    'partners.title' => 'Nos établissements partenaires',
    'partners.aria' => 'Logos des établissements partenaires',

    // ---------------------------------------------------- Section 8 : contact
    'contact.title' => 'Prêt à moderniser vos formations médicales ?',
    'contact.p' => 'Contactez-nous pour organiser une démonstration de LuSIM au sein de votre établissement, que vous représentiez un pôle de soins, une direction des achats ou un centre de formation.',
    'contact.mail' => 'Envoyer un message',
    'contact.mail.title' => 'Envoyer un email de contact à Nexsim',
    'contact.linkedin' => 'Suivre sur LinkedIn',

    // ----------------------------------------------------------- Pied de page
    'footer.legal' => 'Mentions légales',
    'footer.privacy' => 'Politique de confidentialité',
    'footer.top' => 'Haut de page',
    'footer.copyright' => 'Tous droits réservés.',
    'footer.lang.label' => 'Langue',
    'footer.lang.aria' => 'Choix de la langue',
    'footer.lang.switch' => 'Afficher le site en {language}',

    // --------------------------------------------- Pages légales : commun ---
    'legal.eyebrow' => 'Informations légales',
    'legal.back' => "Retour à l'accueil",
    'legal.updated' => 'Dernière mise à jour : {date}',
    'legal.translation_notice' => '',

    // ---------------------------------------------------- Mentions légales ---
    'seo.legal.title' => 'Mentions légales | Nexsim',
    'seo.legal.description' => "Mentions légales du site nexsim.fr : éditeur, hébergeur, propriété intellectuelle et responsabilité.",
    'legal.title' => 'Mentions légales',

    'legal.s1.title' => '1. Éditeur du site',
    'legal.s1.intro' => 'Le site <a href="https://www.nexsim.fr/">www.nexsim.fr</a> est édité par :',
    'legal.s1.form' => 'SAS, société par actions simplifiée',
    'legal.s1.capital' => 'au capital de 90 000 EUR',
    'legal.s1.email' => 'E-mail :',
    'legal.s1.director' => '<strong>Directeur de la publication :</strong> Jules Ferlin, Président.',

    'legal.s2.title' => '2. Hébergement',
    'legal.s2.intro' => 'Le site est hébergé par :',

    'legal.s3.title' => '3. Propriété intellectuelle',
    'legal.s3.p1' => "L'ensemble des contenus présents sur ce site (textes, images, vidéos, modèles 3D, logos, marques, éléments graphiques et logiciels) est la propriété exclusive de Nexsim ou de ses partenaires et est protégé par le Code de la propriété intellectuelle.",
    'legal.s3.p2' => "Toute reproduction, représentation, modification, publication ou adaptation de tout ou partie de ces éléments, quel que soit le moyen ou le procédé utilisé, est interdite sans l'autorisation écrite préalable de Nexsim.",
    'legal.s3.p3' => '« LuSIM », « NexControl » et « Nexsim » sont des dénominations utilisées par Nexsim. Les logos des établissements partenaires restent la propriété de leurs titulaires respectifs et sont affichés avec leur accord.',

    'legal.s4.title' => '4. Responsabilité',
    'legal.s4.p1' => "Nexsim s'efforce de fournir sur ce site des informations aussi précises que possible. Toutefois, les informations diffusées sont présentées à titre indicatif et sont susceptibles d'évoluer. Elles ne constituent pas une offre contractuelle.",
    'legal.s4.p2' => "LuSIM est un dispositif de formation et de simulation. Il n'est pas destiné à un usage sur patient et ne constitue pas un dispositif médical.",
    'legal.s4.p3' => "Nexsim ne saurait être tenue responsable des dommages directs ou indirects résultant de l'accès au site, de son utilisation ou de l'impossibilité d'y accéder. Les liens vers des sites tiers (réseaux sociaux notamment) sont fournis à titre de commodité ; Nexsim n'exerce aucun contrôle sur leur contenu.",

    'legal.s5.title' => '5. Données personnelles et cookies',
    'legal.s5.p' => "Les modalités de traitement des données personnelles et l'usage des traceurs sont décrits dans notre <a href=\"{privacy}\">politique de confidentialité</a>.",

    'legal.s6.title' => '6. Droit applicable',
    'legal.s6.p' => 'Les présentes mentions légales sont soumises au droit français. En cas de litige et à défaut de résolution amiable, les tribunaux compétents seront ceux du ressort du siège social de Nexsim.',

    'legal.s7.title' => '7. Crédits',
    'legal.s7.p' => 'Conception et réalisation du site : Nexsim. Vidéo de présentation réalisée par Léonard Jund. Police de caractères Open Sans (licence SIL Open Font). Visionneuse 3D : <code>&lt;model-viewer&gt;</code> (licence Apache 2.0).',

    // ------------------------------------------ Politique de confidentialité ---
    'seo.privacy.title' => 'Politique de confidentialité | Nexsim',
    'seo.privacy.description' => "Politique de confidentialité du site nexsim.fr : données collectées, finalités, durées de conservation, droits des personnes et cookies.",
    'privacy.title' => 'Politique de confidentialité',
    'privacy.intro' => 'Nexsim attache une grande importance à la protection de vos données personnelles. Cette politique décrit les données susceptibles d\'être traitées lors de votre visite sur <a href="https://www.nexsim.fr/">www.nexsim.fr</a>, conformément au Règlement général sur la protection des données (RGPD) et à la loi Informatique et Libertés.',

    'privacy.s1.title' => '1. Responsable du traitement',
    'privacy.s1.p' => 'Le responsable du traitement est Nexsim, 9 Rue Becquerel, 90000 Belfort, France. Pour toute question relative à vos données : <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>.',

    'privacy.s2.title' => '2. Données collectées et finalités',
    'privacy.s2.intro' => "Le site est un site vitrine : il ne comporte ni formulaire, ni espace client, ni outil de mesure d'audience. Les traitements sont limités aux cas suivants.",
    'privacy.s2.li1' => "<strong>Demandes de contact par e-mail.</strong> Lorsque vous nous écrivez à l'adresse indiquée sur le site, nous traitons votre adresse e-mail, votre nom et le contenu de votre message afin de répondre à votre demande (démonstration, devis, information). Base légale : mesures précontractuelles prises à votre demande ou intérêt légitime à répondre aux sollicitations.",
    'privacy.s2.li2' => "<strong>Journaux techniques du serveur.</strong> L'hébergeur enregistre automatiquement l'adresse IP, la date et l'heure de la visite, les pages consultées et le navigateur utilisé, à des fins de sécurité et de maintenance. Base légale : intérêt légitime à assurer la sécurité du service.",
    'privacy.s2.li3' => "<strong>Préférences d'affichage.</strong> La langue et le thème (clair ou sombre) que vous choisissez sont enregistrés dans deux cookies de préférence décrits à la section 5. Ils ne contiennent aucun identifiant et ne permettent pas de vous reconnaître d'un site à l'autre.",
    'privacy.s2.li4' => "<strong>Langue du navigateur.</strong> Lors de votre première visite, votre navigateur transmet la liste de vos langues préférées (en-tête <code>Accept-Language</code>) ; elle sert uniquement, le temps d'afficher la page, à sélectionner la version linguistique du site. Elle n'est ni enregistrée, ni transmise à un tiers.",

    'privacy.s3.title' => '3. Durées de conservation',
    'privacy.s3.li1' => "Échanges par e-mail : durée nécessaire au traitement de la demande, puis au maximum trois ans à compter du dernier contact si aucune relation contractuelle n'est établie.",
    'privacy.s3.li2' => 'Journaux techniques : au maximum douze mois.',
    'privacy.s3.li3' => 'Cookies de préférence (langue et thème) : douze mois à compter de leur dépôt ou de leur dernière mise à jour, ou jusqu\'à leur suppression par vos soins depuis votre navigateur.',

    'privacy.s4.title' => '4. Destinataires et sous-traitants',
    'privacy.s4.intro' => 'Les données sont destinées aux seules personnes habilitées de Nexsim. Elles peuvent être traitées par nos sous-traitants techniques dans la limite de leurs missions :',
    'privacy.s4.li1' => "<strong>Hébergeur du site</strong> : OVH SAS, pour l'hébergement et les journaux techniques.",
    'privacy.s4.li2' => "<strong>Google Fonts et Google Hosted Libraries</strong> : la police Open Sans et le composant de visualisation 3D sont chargés depuis les serveurs de Google LLC. Lors de ce chargement, votre navigateur transmet votre adresse IP à Google, susceptible d'être traitée aux États-Unis dans le cadre des clauses contractuelles types de la Commission européenne.",
    'privacy.s4.end' => "Aucune donnée n'est vendue ni cédée à des tiers à des fins commerciales.",

    'privacy.s5.title' => '5. Cookies et traceurs',
    'privacy.s5.intro' => "Le site ne dépose aucun cookie publicitaire, aucun cookie de mesure d'audience et aucun traceur tiers. Seuls deux cookies de préférence, déposés par le site lui-même, sont utilisés :",
    'privacy.cookies.th.name' => 'Nom',
    'privacy.cookies.th.purpose' => 'Finalité',
    'privacy.cookies.th.duration' => 'Durée',
    'privacy.cookies.th.basis' => 'Base légale',
    'privacy.cookies.lang.purpose' => "Mémorise la langue d'affichage que vous avez choisie (fr, en ou de).",
    'privacy.cookies.theme.purpose' => 'Mémorise le thème que vous avez choisi (clair ou sombre).',
    'privacy.cookies.duration' => '12 mois',
    'privacy.cookies.basis' => 'Exempté de consentement',
    'privacy.s5.p2' => "Ces deux cookies sont strictement nécessaires à la fourniture d'un service expressément demandé par vous : afficher le site dans la langue et avec le thème que vous avez sélectionnés. Ils ne contiennent qu'une valeur de préférence, sans identifiant ni donnée personnelle, sont émis avec l'attribut <code>SameSite=Lax</code> et ne sont accessibles à aucun tiers.",
    'privacy.s5.p3' => "À ce titre, ils relèvent des traceurs exemptés de consentement au sens de l'article 82 de la loi Informatique et Libertés et des lignes directrices de la CNIL : aucun bandeau de consentement n'est donc affiché. Cette politique sera mise à jour si des traceurs soumis à consentement venaient à être ajoutés.",
    'privacy.s5.p4' => "Vous pouvez supprimer ces cookies à tout moment depuis les paramètres de votre navigateur. Après suppression, le site affiche de nouveau la langue annoncée par votre navigateur (à défaut, l'anglais) et le thème sombre par défaut.",

    'privacy.s6.title' => '6. Vos droits',
    'privacy.s6.p1' => "Conformément au RGPD, vous disposez des droits d'accès, de rectification, d'effacement, de limitation, d'opposition et de portabilité de vos données, ainsi que du droit de définir des directives relatives au sort de vos données après votre décès.",
    'privacy.s6.p2' => "Pour exercer ces droits, écrivez-nous à <a href=\"mailto:contact@nexsim.fr\">contact@nexsim.fr</a> ou par courrier à l'adresse du responsable du traitement. Une preuve d'identité pourra vous être demandée en cas de doute raisonnable. Nous répondons dans un délai d'un mois, prolongeable de deux mois en cas de demande complexe.",
    'privacy.s6.p3' => 'Si vous estimez, après nous avoir contactés, que vos droits ne sont pas respectés, vous pouvez introduire une réclamation auprès de la CNIL (<a href="https://www.cnil.fr/" rel="noopener" target="_blank">www.cnil.fr</a>).',

    'privacy.s7.title' => '7. Sécurité',
    'privacy.s7.p' => "Nexsim met en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre la perte, l'accès non autorisé ou la divulgation : chiffrement des échanges (HTTPS), accès restreint aux messageries et mise à jour régulière des systèmes.",

    'privacy.s8.title' => '8. Liens vers des sites tiers',
    'privacy.s8.p' => "Le site contient des liens vers des services tiers, notamment LinkedIn. Ces services disposent de leurs propres politiques de confidentialité, que nous vous invitons à consulter. Nexsim n'est pas responsable des traitements réalisés par ces tiers.",

    'privacy.s9.title' => '9. Modification de la politique',
    'privacy.s9.p' => 'Cette politique peut être mise à jour à tout moment, notamment en cas d\'évolution du site ou de la réglementation. La date de dernière mise à jour figure en haut de cette page.',
];
