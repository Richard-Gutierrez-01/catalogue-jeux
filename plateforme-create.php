<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle plateforme</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <div class="container">
            <form action="plateforme-store.php" method="post">
                <h2>Nouvelle plateforme</h2>
                <label>Nom
                    <input type="text" name="nom" required>
                </label>
                <label>Description
                    <input type="text" name="description">
                </label>
                <label>Fabricant
                    <input type="text" name="fabricant">
                </label>
                <label>Date de lancement
                    <input type="date" name="date_lancement">
                </label>
                <input type="submit" class="btn" value="Enregistrer">
            </form>
        </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
