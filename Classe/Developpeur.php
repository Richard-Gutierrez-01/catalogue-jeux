<?php
require_once('CRUD.php');

// Représente un développeur et ses jeux
class Developpeur {

    protected $id;
    protected $nom;
    protected $paysOrigine;
    protected $dateFondation;

    public function __construct($id = null, $nom = null, $paysOrigine = null, $dateFondation = null){
        $this->id = $id;
        $this->nom = $nom;
        $this->paysOrigine = $paysOrigine;
        $this->dateFondation = $dateFondation;
    }

    public function getProp($prop){
        return $this->$prop;
    }

    public function setProp($prop, $value){
        $this->$prop = $value;
    }

    public function enregistrer(CRUD $crud){
        $data = [
            'nom' => $this->nom,
            'pays_origine' => $this->paysOrigine,
            'date_fondation' => $this->dateFondation
        ];
        $insert = $crud->insert('developpeur', $data);
        if($insert){
            $this->id = $insert;
        }
        return $insert;
    }

    public function modifier(CRUD $crud){
        $data = [
            'id' => $this->id,
            'nom' => $this->nom,
            'pays_origine' => $this->paysOrigine,
            'date_fondation' => $this->dateFondation
        ];
        return $crud->update('developpeur', $data);
    }

    public function supprimer(CRUD $crud){
        return $crud->delete('developpeur', $this->id);
    }

    public static function tous(CRUD $crud){
        return $crud->select('developpeur');
    }

    public static function trouver(CRUD $crud, $id){
        return $crud->selectId('developpeur', $id);
    }

    // Retourne les jeux de ce développeur (relation 1-à-plusieurs)
    public function jeux(CRUD $crud){
        $stmt = $crud->prepare("SELECT * FROM jeu WHERE developpeur_id = :id");
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
