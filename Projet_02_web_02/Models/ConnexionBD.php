<?php
class Connexion {
    private static $instance = null;
    private $connexion;

    // Constructeur privé
    private function __construct() {
        $server = "localhost";
        $login = "ricky";
        $pin = "picasso";
        $dbname= "ricasso";

        try {
            $this->connexion = new PDO("mysql:host=$server;dbname=$dbname", $login, $pin);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //print("connexion établie avec succès");
        } catch (PDOException $e) {
            echo ' e    ' . $e->getMessage();
        }
    }

    // Méthode statique pour obtenir l'instance unique de la classe
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Méthode pour obtenir la connexion à la base de données
    public function getConnexion() {
        return $this->connexion;
    }
}