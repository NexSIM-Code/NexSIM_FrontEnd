<?php
$equipe = [
    [
        'name' => 'Romary Lucas',
        'role' => 'CEO',
        'description' => 'Ingénieur mécatronique',
        'image' => 'image/person/lucas.png'
    ],
    [
        'name' => 'Ferlin Jules',
        'role' => 'CTO',
        'description' => 'Ingénieur informatique',
        'image' => 'image/person/jules.png'
    ],
    [
        'name' => 'Faivre Laurent',
        'role' => 'Vacataire formateur',
        'description' => 'Infirmier coordonnateur, responsable du centre de simulation de l\'Hôpital Nord Franche-Comté',
        'image' => 'image/person/laurent.png'
    ],
    [
        'name' => 'Lauri Fabrice',
        'role' => 'Développeur VR',
        'description' => 'Maitre de conférence Intelligence artificielle et réalité virtuelle à l\'Université de Technologie de Belfort-Montbéliard',
        'image' => 'image/person/fabrice.png'
    ],
    [
        'name' => 'Buvat Jean-Sebastien',
        'role' => 'Vacataire formateur',
        'description' => 'Médecin anesthésiste-réanimateur',
        'image' => 'image/person/jean-sebastien.png'
    ]
]
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="image/favicon.png" type="image/png">
    <?php
      $seo = [
        'title' => "L'équipe Nexsim – Experts en simulation médicale",
        'description' => "Découvrez l'équipe pluridisciplinaire de Nexsim : ingénieurs, soignants et experts VR qui conçoivent des simulateurs médicaux innovants.",
        'path' => '/equipe.php'
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
        <h2>L'équipe NexSim</h2>
        <p>Nexsim est formé d'une équipe pluridisciplinaire ce qui lui procure une force de frappe puissante pour une
            petite équipe. L'enjeu est de trouver un langage commun entre ingénieur et infirmier.</p>
        <p>Cette diversité dans le groupe nous permet de concevoir et imaginer des solutions pensées par les soignants
            et créées par les ingénieurs pour les soignants.</p>
    </section>

    <section class="content-section">
        <h2>Notre expertise</h2>
        <p>Notre équipe combine des compétences variées et complémentaires :</p>
        <ul class="benefits-list">
            <li><strong>Expertise médicale</strong> - Professionnels de santé expérimentés dans la formation et la
                simulation
            </li>
            <li><strong>Ingénierie de pointe</strong> - Spécialistes en mécatronique, informatique et réalité virtuelle
            </li>
            <li><strong>Pédagogie innovante</strong> - Approches modernes d'apprentissage adaptées aux besoins des
                soignants
            </li>
            <li><strong>Développement technologique</strong> - Création de solutions sur mesure pour répondre aux défis
                de la formation médicale
            </li>
        </ul>
        <p>Cette synergie de compétences nous permet de développer des simulateurs médicaux à la fois réalistes,
            pédagogiques et technologiquement avancés.</p>
    </section>

    <section class="content-section">
        <h2>Notre équipe</h2>
        <div class="team-container">
            <?php foreach ($equipe as $membre): ?>
                <div class="team-card">
                    <div class="team-image-container">
                        <?php
                        $imagePath = $membre['image'];
                        if (!file_exists($imagePath)) {
                            $imagePath = 'image/person/default.png';
                        }
                        ?>
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $membre['name']; ?>"
                             class="team-image">
                    </div>
                    <div class="team-info">
                        <h3><?php echo $membre['name']; ?></h3>
                        <div class="team-role"><?php echo $membre['role']; ?></div>
                        <div class="team-description"><?php echo $membre['description']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>
