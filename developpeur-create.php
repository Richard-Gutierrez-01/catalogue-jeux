<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau développeur</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <main>
    <?php require_once('nav.php'); ?>
    <div class="container">
        <form action="developpeur-store.php" method="post">
            <h2>Nouveau développeur</h2>
            <label>Nom
                <input type="text" name="nom" required>
            </label>
            <label>Pays d'origine
                <input type="text" name="pays_origine">
            </label>
            <label>Date de fondation
                <input type="date" name="date_fondation">
            </label>
            <input type="submit" class="btn" value="Enregistrer">
        </form>
    </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
