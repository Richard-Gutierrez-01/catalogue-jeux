<?php

// Classe abstraite commune à Jeu et Plateforme (héritage)
abstract class Catalogable {

    protected $id;
    protected $nom;
    protected $description;
    protected $dateAjout;

    public function __construct($id = null, $nom = null, $description = null, $dateAjout = null){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->dateAjout = $dateAjout;
    }

    public function getProp($prop){
        return $this->$prop;
    }

    public function setProp($prop, $value){
        $this->$prop = $value;
    }

    public function afficher(){
        return $this->nom." — ".$this->description;
    }
}
