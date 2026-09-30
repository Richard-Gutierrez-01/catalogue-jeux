<?php
// Formulaire de modification d'une plateforme existante
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:plateforme-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Plateforme.php');

$crud = new CRUD;
$plateforme = Plateforme::trouver($crud, $id);

if($plateforme){
    extract($plateforme);
}else{
    header('location:plateforme-index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la plateforme</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <main>
        <div class="container">
            <form action="plateforme-update.php" method="post">
                <h2>Modifier la plateforme</h2>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="hidden" name="date_ajout" value="<?= $date_ajout; ?>">
                <label>Nom
                    <input type="text" name="nom" value="<?= $nom; ?>" required>
                </label>
                <label>Description
                    <input type="text" name="description" value="<?= $description; ?>">
                </label>
                <label>Fabricant
                    <input type="text" name="fabricant" value="<?= $fabricant; ?>">
                </label>
                <label>Date de lancement
                    <input type="date" name="date_lancement" value="<?= $date_lancement; ?>">
                </label>
                <input type="submit" class="btn" value="Enregistrer">
            </form>
        </div>
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>
