<?php
// Supprime un jeu à partir de son id

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:jeu-index.php');
    die();
}

require_once('Classe/CRUD.php');
require_once('Classe/Jeu.php');

$id = $_POST['id'];
$crud = new CRUD;
$jeu = new Jeu($id);
$delete = $jeu->supprimer($crud);

if($delete){
    header('location:jeu-index.php');
}else{
    echo "Erreur";
}
