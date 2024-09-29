<?php
include_once __DIR__."/connexionBD.php";
class Catalogue {
    // Attributs
    public $Produits = [];
    private $connectionDB;
    private static $instance;

    // Constructeur
    public function __construct() {
        try {
            $connexion = Connexion::getInstance();
            $this->connectionDB = $connexion->getConnexion();
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
    }

    final public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Catalogue();
        }
        return self::$instance;
    }


    // Méthode pour charger les produits depuis la base de données
    public function chargerProduits($type) {
        if ($type == 'Chemise') {
            try {
                $query = $this->connectionDB->query("SELECT * FROM produits WHERE categorie='Chemise'");
                $this->Produits = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
        else if ($type == 'Cravate') {
            try {
                $query = $this->connectionDB->query("SELECT * FROM produits WHERE categorie='Cravate'");
                $this->Produits = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
        else{
            try {
                $query = $this->connectionDB->query("SELECT * FROM produits");
                $this->Produits = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
    }

    // Autres méthodes de la classe...

    // Méthode pour obtenir la liste des produits
    public function getProduits() {
        return $this->Produits;
    }
}