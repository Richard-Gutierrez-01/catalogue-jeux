<?php
// Affiche la fiche détaillée d'un jeu, incluant les plateformes disponibles
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:jeu-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Jeu.php');

$crud = new CRUD;
$jeuData = Jeu::trouver($crud, $id);

if($jeuData){
    $jeu = new Jeu(
        $jeuData['id'],
        $jeuData['nom'],
        $jeuData['description'],
        $jeuData['date_ajout'],
        $jeuData['genre'],
        $jeuData['note'],
        $jeuData['date_sortie'],
        $jeuData['developpeur_id']
    );
}else{
    header('location:jeu-index.php');
    die();
}

$plateformes = $jeu->plateformes($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu — <?= $jeuData['nom']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
    <div class="container">
        <h1><?= $jeuData['nom']; ?></h1>
        <p><strong>Description : </strong><?= $jeuData['description']; ?></p>
        <p><strong>Genre : </strong><?= $jeuData['genre']; ?></p>
        <p><strong>Note : </strong><?= $jeuData['note']; ?></p>
        <p><strong>Date de sortie : </strong><?= $jeuData['date_sortie']; ?></p>

        <h3>Disponible sur</h3>
        <?php if(count($plateformes) > 0){ ?>
            <ul>
                <?php foreach($plateformes as $plateforme){ ?>
                    <li><?= $plateforme['nom']; ?></li>
                <?php } ?>
            </ul>
        <?php }else{ ?>
            <p>Aucune plateforme associée pour l'instant.</p>
        <?php } ?>

        <a href="jeu-edit.php?id=<?= $id; ?>" class="btn">Modifier</a>
        <form action="jeu-delete.php" method="post" style="display:inline">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Supprimer" class="btn red">
        </form>
    </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
