<?php
require_once('Catalogable.php');
require_once('CRUD.php');

// Représente une plateforme et sa relation avec les jeux
class Plateforme extends Catalogable {

    protected $fabricant;
    protected $dateLancement;

    public function __construct($id = null, $nom = null, $description = null, $dateAjout = null, $fabricant = null, $dateLancement = null){
        parent::__construct($id, $nom, $description, $dateAjout);
        $this->fabricant = $fabricant;
        $this->dateLancement = $dateLancement;
    }

    public function enregistrer(CRUD $crud){
        $data = [
            'nom' => $this->nom,
            'description' => $this->description,
            'date_ajout' => $this->dateAjout,
            'fabricant' => $this->fabricant,
            'date_lancement' => $this->dateLancement
        ];
        $insert = $crud->insert('plateforme', $data);
        if($insert){
            $this->id = $insert;
        }
        return $insert;
    }

    public function modifier(CRUD $crud){
        $data = [
            'id' => $this->id,
            'nom' => $this->nom,
            'description' => $this->description,
            'date_ajout' => $this->dateAjout,
            'fabricant' => $this->fabricant,
            'date_lancement' => $this->dateLancement
        ];
        return $crud->update('plateforme', $data);
    }

    public function supprimer(CRUD $crud){
    $crud->delete('jeu_plateforme', $this->id, 'plateforme_id');
    return $crud->delete('plateforme', $this->id);
    }

    public static function tous(CRUD $crud){
        return $crud->select('plateforme');
    }

    public static function trouver(CRUD $crud, $id){
        return $crud->selectId('plateforme', $id);
    }

    // Compte sur combien de jeux cette plateforme est disponible (relation N-N)
    public function nombreJeux(CRUD $crud){
        $stmt = $crud->prepare("SELECT COUNT(*) FROM jeu_plateforme WHERE plateforme_id = :id");
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    // Retourne les jeux associés à cette plateforme (relation N-N)
    public function jeux(CRUD $crud){
        $sql = "SELECT jeu.* FROM jeu
                INNER JOIN jeu_plateforme ON jeu.id = jeu_plateforme.jeu_id
                WHERE jeu_plateforme.plateforme_id = :id";
        $stmt = $crud->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
