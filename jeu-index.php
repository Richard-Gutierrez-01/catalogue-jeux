<?php
// Affiche la liste de tous les jeux avec le nom de leur développeur
require_once('Classe/CRUD.php');
require_once('Classe/Jeu.php');

$crud = new CRUD;
$jeux = Jeu::tousAvecDeveloppeur($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <h1>Catalogue de jeux</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Note</th>
                    <th>Date de sortie</th>
                    <th>Développeur</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($jeux as $jeu){ ?>
                <tr>
                    <td><a href="jeu-show.php?id=<?= $jeu['id']; ?>"><?= $jeu['nom']; ?></a></td>
                    <td><?= $jeu['genre']; ?></td>
                    <td><?= $jeu['note']; ?></td>
                    <td><?= $jeu['date_sortie']; ?></td>
                    <td><?= $jeu['nom_developpeur'] ?? '—'; ?></td>
                    <td><a href="jeu-show.php?id=<?= $jeu['id']; ?>" class="btn">Voir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="jeu-create.php" class="btn table-button">Nouveau jeu</a>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
