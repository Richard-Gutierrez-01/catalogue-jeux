<?php
require_once('Classe/CRUD.php');
require_once('Classe/Developpeur.php');


$crud = new CRUD;
$developpeurs = Developpeur::tous($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau jeu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <div class="container">
            <form action="jeu-store.php" method="post">
                <h2>Nouveau jeu</h2>
                <label>Nom
                    <input type="text" name="nom" required>
                </label>
                <label>Description
                    <input type="text" name="description">
                </label>
                <label>Genre
                    <input type="text" name="genre">
                </label>
                <label>Note (sur 10)
                    <input type="number" step="0.1" min="0" max="10" name="note">
                </label>
                <label>Date de sortie
                    <input type="date" name="date_sortie">
                </label>
                <label>Développeur
                    <select name="developpeur_id">
                        <option value="">— Aucun —</option>
                        <?php foreach($developpeurs as $developpeur){ ?>
                            <option value="<?= $developpeur['id']; ?>"><?= $developpeur['nom']; ?></option>
                        <?php } ?>
                    </select>
                </label>
                <input type="submit" class="btn" value="Enregistrer">
            </form>
        </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
