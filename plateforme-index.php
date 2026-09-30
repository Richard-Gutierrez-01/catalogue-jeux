<?php
// Affiche la liste de toutes les plateformes
require_once('Classe/CRUD.php');
require_once('Classe/Plateforme.php');

$crud = new CRUD;
$plateformes = Plateforme::tous($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateformes</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <h1>Plateformes</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Fabricant</th>
                    <th>Date de lancement</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($plateformes as $plateforme){ ?>
                <tr>
                    <td><a href="plateforme-show.php?id=<?= $plateforme['id']; ?>"><?= $plateforme['nom']; ?></a></td>
                    <td><?= $plateforme['fabricant']; ?></td>
                    <td><?= $plateforme['date_lancement']; ?></td>
                    <td><a href="plateforme-show.php?id=<?= $plateforme['id']; ?>" class="btn">Voir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="plateforme-create.php" class="btn table-button">Nouvelle plateforme</a>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
