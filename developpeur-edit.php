<?php
// Formulaire de modification d'un développeur existant
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:developpeur-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Developpeur.php');

$crud = new CRUD;
$developpeur = Developpeur::trouver($crud, $id);

if($developpeur){
    extract($developpeur);
}else{
    header('location:developpeur-index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le développeur</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <main>
    <?php require_once('nav.php'); ?>
    <div class="container">
        <form action="developpeur-update.php" method="post">
            <h2>Modifier le développeur</h2>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Nom
                <input type="text" name="nom" value="<?= $nom; ?>" required>
            </label>
            <label>Pays d'origine
                <input type="text" name="pays_origine" value="<?= $pays_origine; ?>">
            </label>
            <label>Date de fondation
                <input type="date" name="date_fondation" value="<?= $date_fondation; ?>">
            </label>
            <input type="submit" class="btn" value="Enregistrer">
        </form>
    </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
