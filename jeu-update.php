<?php
// Traite le formulaire de modification d'un jeu et redirige vers sa fiche

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:jeu-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Jeu.php');

$crud = new CRUD;
$jeu = new Jeu(
    $_POST['id'],
    $_POST['nom'],
    $_POST['description'],
    $_POST['date_ajout'],
    $_POST['genre'],
    $_POST['note'] !== '' ? $_POST['note'] : null,
    $_POST['date_sortie'] !== '' ? $_POST['date_sortie'] : null,
    $_POST['developpeur_id'] !== '' ? $_POST['developpeur_id'] : null
);
$update = $jeu->modifier($crud);

if($update){
    header('location:jeu-show.php?id='.$_POST['id']);
}else{
    echo "Erreur lors de la mise à jour";
}
