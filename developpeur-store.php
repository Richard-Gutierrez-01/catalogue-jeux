<?php
// Enregistre un nouveau développeur dans la base de données

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:developpeur-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Developpeur.php');

$crud = new CRUD;
$developpeur = new Developpeur(
    null,
    $_POST['nom'],
    $_POST['pays_origine'],
    $_POST['date_fondation'] !== '' ? $_POST['date_fondation'] : null
);
$insert = $developpeur->enregistrer($crud);

if($insert){
    header("location:developpeur-show.php?id=$insert");
}else{
    header("location:developpeur-index.php");
}
