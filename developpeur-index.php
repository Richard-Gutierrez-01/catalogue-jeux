<?php
// Affiche la liste de tous les développeurs
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
    <title>Développeurs</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <h1>Développeurs</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pays d'origine</th>
                    <th>Date de fondation</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($developpeurs as $developpeur){ ?>
                <tr>
                    <td><a href="developpeur-show.php?id=<?= $developpeur['id']; ?>"><?= $developpeur['nom']; ?></a></td>
                    <td><?= $developpeur['pays_origine']; ?></td>
                    <td><?= $developpeur['date_fondation']; ?></td>
                    <td><a href="developpeur-show.php?id=<?= $developpeur['id']; ?>" class="btn">Voir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="developpeur-create.php" class="btn table-button">Nouveau développeur</a>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
