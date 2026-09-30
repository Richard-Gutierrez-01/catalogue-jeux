<?php
// Traite le formulaire de modification d'une plateforme et redirige vers sa fiche

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:plateforme-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Plateforme.php');

$crud = new CRUD;
$plateforme = new Plateforme(
    $_POST['id'],
    $_POST['nom'],
    $_POST['description'],
    $_POST['date_ajout'],
    $_POST['fabricant'],
    $_POST['date_lancement'] !== '' ? $_POST['date_lancement'] : null
);
$update = $plateforme->modifier($crud);

if($update){
    header('location:plateforme-show.php?id='.$_POST['id']);
}else{
    echo "Erreur lors de la mise à jour";
}
