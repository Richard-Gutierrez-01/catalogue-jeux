<?php
// Formulaire de modification d'un jeu existant
if(!isset($_GET['id']) or $_GET['id']==null){
    header('location:jeu-index.php');
    die();
}
$id = $_GET['id'];

require_once('Classe/CRUD.php');
require_once('Classe/Jeu.php');
require_once('Classe/Developpeur.php');

$crud = new CRUD;
$jeu = Jeu::trouver($crud, $id);

if($jeu){
    extract($jeu);
}else{
    header('location:jeu-index.php');
    die();
}

$developpeurs = Developpeur::tous($crud);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le jeu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <?php require_once('nav.php'); ?>
    <div class="container">
        <main>
        <form action="jeu-update.php" method="post">
            <h2>Modifier le jeu</h2>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="date_ajout" value="<?= $date_ajout; ?>">
            <label>Nom
                <input type="text" name="nom" value="<?= $nom; ?>" required>
            </label>
            <label>Description
                <input type="text" name="description" value="<?= $description; ?>">
            </label>
            <label>Genre
                <input type="text" name="genre" value="<?= $genre; ?>">
            </label>
            <label>Note (sur 10)
                <input type="number" step="0.1" min="0" max="10" name="note" value="<?= $note; ?>">
            </label>
            <label>Date de sortie
                <input type="date" name="date_sortie" value="<?= $date_sortie; ?>">
            </label>
            <label>Développeur
                <select name="developpeur_id">
                    <option value="">— Aucun —</option>
                    <?php foreach($developpeurs as $developpeur){ ?>
                        <option value="<?= $developpeur['id']; ?>" <?= ($developpeur['id'] == $developpeur_id) ? 'selected' : ''; ?>>
                            <?= $developpeur['nom']; ?>
                        </option>
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
