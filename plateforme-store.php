<?php
// Enregistre une nouvelle plateforme dans la base de données

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:plateforme-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Plateforme.php');

$crud = new CRUD;
$plateforme = new Plateforme(
    null,
    $_POST['nom'],
    $_POST['description'],
    date('Y-m-d'),
    $_POST['fabricant'],
    $_POST['date_lancement'] !== '' ? $_POST['date_lancement'] : null
);
$insert = $plateforme->enregistrer($crud);

if($insert){
    header("location:plateforme-show.php?id=$insert");
}else{
    header("location:plateforme-index.php");
}
