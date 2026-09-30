<?php
// Supprime une plateforme à partir de son id

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:plateforme-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Plateforme.php');

$id = $_POST['id'];
$crud = new CRUD;
$plateforme = new Plateforme($id);
$delete = $plateforme->supprimer($crud);

if($delete){
    header('location:plateforme-index.php');
}else{
    echo "Erreur";
}
