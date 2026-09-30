<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de jeux vidéo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <section class="hero">
            <img src="img/hero.jpg" alt="" class="hero-image">

            <div class="hero-content">
                <p class="hero-eyebrow">CATALOGUE DE JEUX</p>

                <h1>Explorer le catalogue:</h1>

                <p>
                    Un système de gestion simple pour suivre tes jeux,
                    leurs développeurs et les plateformes sur lesquelles
                    ils sont disponibles.
                </p>
            </div>
        </section>
            <a href="jeu-index.php" class="btn hero-button">Voir les jeux</a>
                <section class="home-features">

            <a href="jeu-index.php" class="feature">
                <img src="img/Asset-3.svg" alt="" class="feature-icon">
                <h3>Jeux</h3>
                <p>Découvrez notre catalogue.</p>
            </a>

            <a href="developpeur-index.php" class="feature">
                <img src="img/Asset-2.svg" alt="" class="feature-icon">
                <h3>Développeurs</h3>
                <p>Explorez les développeurs.</p>
            </a>

            <a href="plateforme-index.php" class="feature">
                <img src="img/Asset-1.svg" alt="" class="feature-icon">
                <h3>Plateformes</h3>
                <p>Consultez les plateformes disponibles.</p>
            </a>
        </section>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
