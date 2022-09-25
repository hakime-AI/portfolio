<?php

namespace App\Models;

use DateTime;
use Pdo;
class Produit extends Model{

    protected $id;
    protected $titre;
    protected $description;
    protected $prix;
    protected $categorie;
    protected $image1;
    protected $image2;
    protected $image3;
    protected $image4;
    protected $image5;
    public $table = 'produits';

    public function getCreatedAt(): string
    // Fonction pour retourner la date
    {
        return (new DateTime($this->date))->format('d/m/Y');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getImage1()
    {
        return $this->image1;
    }

    public function setImage1($image1)
    {
        $this->image1 = $image1;
        return $this;
    }

    public function getImage2()
    {
        return $this->image2;
    }

    public function setImage2($image2)
    {
        $this->image2 = $image2;
        return $this;
    }

    public function getImage3()
    {
        return $this->image3;
    }

    public function setImage3($image3)
    {
        $this->image3 = $image3;
        return $this;
    }

    public function getImage4()
    {
        return $this->image4;
    }

    public function setImage4($image4)
    {
        $this->image4 = $image4;
        return $this;
    }

    public function getImage5()
    {
        return $this->image5;
    }

    public function setImage5($image5)
    {
        $this->image5 = $image5;
        return $this;
    }

    public function create(Model $data, ?array $relation = null)
    {
        parent::create($data);

        return true;
    }
    public function update(int $id, Model $data, ?array $relations = null)
    {
        parent::update($id, $data);
        
        return true;
    }

    public function delete(int $id)
    {
        parent::delete($id);
        
        return true;
    }

    public function search($offset, $limit)
    {
        // Fonction pour effectuer la recherche
        @$categorie = $_GET['categorie'];
        @$envoyer=$_GET["envoyer"];
        if(isset($envoyer)&& !empty(trim($categorie))){
        $search = $this->conn->getPDO()->prepare("SELECT * FROM {$this->table} WHERE categorie LIKE '%$categorie%' ORDER BY date DESC LIMIT :offset, :limit");
        $search->bindParam(':offset', $offset, PDO::PARAM_INT);
        $search->bindParam(':limit', $limit, PDO::PARAM_INT);
        $search->execute();
        return $search->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function pagingSearch()
    {
        /* Fonction pour calculer le nombre d'élément dans la base de donnée (colonne id) utiliser dans la pagination pour la recherche
        */
        @$categorie = $_GET['categorie'];
        $pagingSearch = $this->conn->getPDO()->prepare("SELECT COUNT(*) AS id FROM `produits` WHERE categorie LIKE '%$categorie%';");
        $pagingSearch->setFetchMode(PDO::FETCH_ASSOC);
        $pagingSearch->execute();
        return $pagingSearch->fetch();
    }

    public function paging()
    {
        /* Fonction pour calculer le nombre d'élément dans la base de donnée (colonne id) utilise dans la pagination sur tous les produits
        */
        $paging = $this->conn->getPDO()->prepare("SELECT COUNT(*) AS id FROM `produits`;");
        $paging->setFetchMode(PDO::FETCH_ASSOC);
        $paging->execute();
        return $paging->fetch();
        //$nbannonce = (int) $result2->getId();
    }
}

?>