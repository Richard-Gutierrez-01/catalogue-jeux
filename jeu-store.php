<?php
// Enregistre un nouveau jeu dans la base de données

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:jeu-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Jeu.php');

$crud = new CRUD;
$jeu = new Jeu(
    null,
    $_POST['nom'],
    $_POST['description'],
    date('Y-m-d'),
    $_POST['genre'],
    $_POST['note'] !== '' ? $_POST['note'] : null,
    $_POST['date_sortie'] !== '' ? $_POST['date_sortie'] : null,
    $_POST['developpeur_id'] !== '' ? $_POST['developpeur_id'] : null
);
$insert = $jeu->enregistrer($crud);

if($insert){
    header("location:jeu-show.php?id=$insert");
}else{
    header("location:jeu-index.php");
}
