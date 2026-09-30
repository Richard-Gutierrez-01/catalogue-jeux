<?php
// Affiche la fiche d'un développeur, incluant ses jeux
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:developpeur-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Developpeur.php');

$crud = new CRUD;
$developpeurData = Developpeur::trouver($crud, $id);

if($developpeurData){
    $developpeur = new Developpeur(
        $developpeurData['id'],
        $developpeurData['nom'],
        $developpeurData['pays_origine'],
        $developpeurData['date_fondation']
    );
}else{
    header('location:developpeur-index.php');
    die();
}

$jeux = $developpeur->jeux($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Développeur — <?= $developpeurData['nom']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <main>
    <?php require_once('nav.php'); ?>
    <div class="container">
        <h1><?= $developpeurData['nom']; ?></h1>
        <p><strong>Pays d'origine : </strong><?= $developpeurData['pays_origine']; ?></p>
        <p><strong>Date de fondation : </strong><?= $developpeurData['date_fondation']; ?></p>

        <h3>Jeux</h3>
        <?php if(count($jeux) > 0){ ?>
            <ul>
                <?php foreach($jeux as $jeu){ ?>
                    <li><a href="jeu-show.php?id=<?= $jeu['id']; ?>"><?= $jeu['nom']; ?></a></li>
                <?php } ?>
            </ul>
        <?php }else{ ?>
            <p>Aucun jeu associé pour l'instant.</p>
        <?php } ?>

        <a href="developpeur-edit.php?id=<?= $id; ?>" class="btn">Modifier</a>
        <form action="developpeur-delete.php" method="post" style="display:inline">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Supprimer" class="btn red">
        </form>
    </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
