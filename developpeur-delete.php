<?php
// Supprime un développeur

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:developpeur-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Developpeur.php');

$id = $_POST['id'];
$crud = new CRUD;
$developpeur = new Developpeur($id);
$delete = $developpeur->supprimer($crud);

if($delete){
    header('location:developpeur-index.php');
}else{
    echo "Erreur : ce développeur a peut-être encore des jeux qui lui sont associés.";
}
