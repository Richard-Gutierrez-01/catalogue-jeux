<?php
require_once('Catalogable.php');
require_once('CRUD.php');

// Représente un jeu et ses relations avec le développeur et les plateformes
class Jeu extends Catalogable {

    protected $genre;
    protected $note;
    protected $dateSortie;
    protected $developpeurId;

    public function __construct($id = null, $nom = null, $description = null, $dateAjout = null, $genre = null, $note = null, $dateSortie = null, $developpeurId = null){
        parent::__construct($id, $nom, $description, $dateAjout);
        $this->genre = $genre;
        $this->note = $note;
        $this->dateSortie = $dateSortie;
        $this->developpeurId = $developpeurId;
    }

    // Ajoute le jeu dans la base et met à jour son propre id
    public function enregistrer(CRUD $crud){
        $data = [
            'nom' => $this->nom,
            'description' => $this->description,
            'date_ajout' => $this->dateAjout,
            'genre' => $this->genre,
            'note' => $this->note,
            'date_sortie' => $this->dateSortie,
            'developpeur_id' => $this->developpeurId
        ];
        $insert = $crud->insert('jeu', $data);
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
            'genre' => $this->genre,
            'note' => $this->note,
            'date_sortie' => $this->dateSortie,
            'developpeur_id' => $this->developpeurId
        ];
        return $crud->update('jeu', $data);
    }

    public function supprimer(CRUD $crud){
    $crud->delete('jeu_plateforme', $this->id, 'jeu_id');
    return $crud->delete('jeu', $this->id);
    }

    public static function tous(CRUD $crud){
        return $crud->select('jeu');
    }

    public static function trouver(CRUD $crud, $id){
        return $crud->selectId('jeu', $id);
    }

    // Retourne tous les jeux avec le nom de leur développeur (relation 1-à-plusieurs)
    public static function tousAvecDeveloppeur(CRUD $crud){
        $sql = "SELECT jeu.*, developpeur.nom AS nom_developpeur
                FROM jeu
                LEFT JOIN developpeur ON jeu.developpeur_id = developpeur.id
                ORDER BY jeu.nom ASC";
        $stmt = $crud->query($sql);
        return $stmt->fetchAll();
    }

    // Compte sur combien de plateformes ce jeu est disponible (relation N-N)
    public function nombrePlateformes(CRUD $crud){
        $stmt = $crud->prepare("SELECT COUNT(*) FROM jeu_plateforme WHERE jeu_id = :id");
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    // Retourne les plateformes associées à ce jeu (relation N-N)
    public function plateformes(CRUD $crud){
        $sql = "SELECT plateforme.* FROM plateforme
                INNER JOIN jeu_plateforme ON plateforme.id = jeu_plateforme.plateforme_id
                WHERE jeu_plateforme.jeu_id = :id";
        $stmt = $crud->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
