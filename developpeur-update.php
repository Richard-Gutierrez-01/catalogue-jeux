<?php
// Traite le formulaire de modification d'un développeur et redirige vers sa fiche

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:developpeur-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Developpeur.php');

$crud = new CRUD;
$developpeur = new Developpeur(
    $_POST['id'],
    $_POST['nom'],
    $_POST['pays_origine'],
    $_POST['date_fondation'] !== '' ? $_POST['date_fondation'] : null
);
$update = $developpeur->modifier($crud);

if($update){
    header('location:developpeur-show.php?id='.$_POST['id']);
}else{
    echo "Erreur lors de la mise à jour";
}
