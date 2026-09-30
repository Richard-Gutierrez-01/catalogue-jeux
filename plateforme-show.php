<?php
// Affiche la fiche d'une plateforme, incluant les jeux disponibles 
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:plateforme-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Plateforme.php');

$crud = new CRUD;
$plateformeData = Plateforme::trouver($crud, $id);

if($plateformeData){
    $plateforme = new Plateforme(
        $plateformeData['id'],
        $plateformeData['nom'],
        $plateformeData['description'],
        $plateformeData['date_ajout'],
        $plateformeData['fabricant'],
        $plateformeData['date_lancement']
    );
}else{
    header('location:plateforme-index.php');
    die();
}

$jeux = $plateforme->jeux($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme — <?= $plateformeData['nom']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
    <div class="container">
        <h1><?= $plateformeData['nom']; ?></h1>
        <p><strong>Description : </strong><?= $plateformeData['description']; ?></p>
        <p><strong>Fabricant : </strong><?= $plateformeData['fabricant']; ?></p>
        <p><strong>Date de lancement : </strong><?= $plateformeData['date_lancement']; ?></p>

        <h3>Jeux disponibles</h3>
        <?php if(count($jeux) > 0){ ?>
            <ul>
                <?php foreach($jeux as $jeu){ ?>
                    <li><a href="jeu-show.php?id=<?= $jeu['id']; ?>"><?= $jeu['nom']; ?></a></li>
                <?php } ?>
            </ul>
        <?php }else{ ?>
            <p>Aucun jeu associé pour l'instant.</p>
        <?php } ?>

        <a href="plateforme-edit.php?id=<?= $id; ?>" class="btn">Modifier</a>
        <form action="plateforme-delete.php" method="post" style="display:inline">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Supprimer" class="btn red">
        </form>
    </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
