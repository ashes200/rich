<?php
include_once __DIR__."/connexionBD.php";


class Produit {
    // Attributs
    private $id;
    private $nom;
    private $categorie;
    private $description;
    private $image;
    private $taille = [];
    private $prix;
    private $connectionDB;
    private static $instance;

    // Constructeur
    private function __construct() {
        try {
            $connexion = Connexion::getInstance();
            $this->connectionDB = $connexion->getConnexion();
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
    }

    final public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Produit();
        }
        return self::$instance;
    }

    // Méthode pour charger un produit depuis la base de données par son ID
    public function chargerProduitParId($id) {
        try {
            $query = $this->connectionDB->prepare("SELECT * FROM produits WHERE id = ?");
            $query->execute([$id]);
            $produit = $query->fetch(PDO::FETCH_ASSOC);

            // Remplir les propriétés de l'objet avec les données du produit
            if ($produit) {
                $this->id = $produit['id'];
                $this->nom = $produit['nom'];
                $this->categorie = $produit['categorie'];
                $this->description = $produit['description'];
                $this->image = $produit['image'];
                $this->taille = explode(',', $produit['taille']);
                $this->prix = $produit['prix'];
            }

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    public function getCategorieParId($id) {
        try {
            $query = $this->connectionDB->prepare("SELECT categorie FROM produits WHERE id = ?");
            $query->execute([$id]);
            $produit = $query->fetch(PDO::FETCH_ASSOC);

            // Remplir les propriétés de l'objet avec les données du produit
            if ($produit) {
                return $produit['categorie'];
            }
            else {
                return null;
            }

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    // Méthode pour afficher les détails du produit
    public function afficherDetails() {
        echo "<h1>Détails du Produit</h1>";
        echo "<p>ID: {$this->id}</p>";
        echo "<p>Nom: {$this->nom}</p>";
        echo "<p>Catégorie: {$this->categorie}</p>";
        echo "<p>Description: {$this->description}</p>";
        echo "<p>Prix: {$this->prix}</p>";
    }
    public function afficherDescription() {
        return $this->description;
    }
    public function afficherNom() {
        return $this->nom;
    }
    public function afficherPrix() {
        return $this->prix;
    }
    public function afficherImage() {
        return $this->image;
    }
    public function getId() {
        return $this->id;
    }
}