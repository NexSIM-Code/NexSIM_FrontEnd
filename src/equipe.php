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

<?php include 'partials/i18n.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($GLOBALS['NX_LANG'] ?? (function_exists('nx_detect_lang') ? nx_detect_lang() : 'fr'), ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars(t('team.seo.title'), ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    $seo = [
            'title' => t('team.seo.title'),
            'description' => t('team.seo.description'),
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
        <h2><?php echo htmlspecialchars(t('team.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('team.p1'), ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo htmlspecialchars(t('team.p2'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('team.expertise.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><?php echo htmlspecialchars(t('team.expertise.p'), ENT_QUOTES, 'UTF-8'); ?></p>
        <ul class="benefits-list">
            <li><?php echo htmlspecialchars(t('team.expertise.li1'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('team.expertise.li2'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('team.expertise.li3'), ENT_QUOTES, 'UTF-8'); ?></li>
            <li><?php echo htmlspecialchars(t('team.expertise.li4'), ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
        <p><?php echo htmlspecialchars(t('team.expertise.end'), ENT_QUOTES, 'UTF-8'); ?></p>
    </section>

    <section class="content-section">
        <h2><?php echo htmlspecialchars(t('team.members.title'), ENT_QUOTES, 'UTF-8'); ?></h2>
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
