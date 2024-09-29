<?php

include_once __DIR__."/connexionBD.php";
include_once __DIR__."/Session_model.php";

class Infolettre
{
    private $nom;
    private $prenom;
    private $email;
    private $connectionDB;
    private static $instance;



    private function __construct()
    {
        try {
            $connection = Connexion::getInstance();
            $this->connectionDB = $connection->getConnexion();
        } catch (PDOEXCEPTION $e) {
            echo 'echec de la connexion : ' . $e->getMessage();
        }
    }

    final public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Infolettre();
        }
        return self::$instance;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    // Fonction pour vérifier si un utilisateur existe déjà
    public function utilisateurExisteDeja($email, $nom, $prenom)
    {
        $sql = "SELECT COUNT(*) FROM infolettre WHERE email = '$email' AND nom = '$nom' AND prenom = '$prenom'";
        $result = $this->connectionDB->query($sql);
        $count = $result->fetchColumn();
        return $count > 0;
    }
    public function InscritInfolettre($nom, $prenom, $email, $mode, $user)
    {
        if ($this->utilisateurExisteDeja($email, $nom, $prenom)) {
            if($user == false){
                Redirection::redirectSurInfolettre(5, 0, 0, $mode, 11);
            }
            else{
                return -1;
            }
        } else {
            $this->nom = $nom;
            try {
                // Préparez la requête SQL d'insertion
                $requete_user = $this->connectionDB->prepare("INSERT INTO infolettre(nom,prenom,email) VALUES (?, ?, ?)");
                $requete_user->execute([$nom, $prenom, $email]);
                if($user == false){
                    Redirection::redirectSurInfolettre(5, 0, 0, $mode, 12);
                }
                else{
                    return -1;
                }

            } catch (PDOException $e) {
                // Gérez les erreurs de base de données ici (journalisation, affichage d'un message d'erreur, etc.)
                echo "Erreur d'inscription : " . $e->getMessage();

                // Retournez faux pour indiquer que l'inscription a échoué
                if($user == false){
                    Redirection::redirectSurInfolettre(5, 0, 0, $mode, 13);
                }
                else{
                    return -1;
                }
            }
        }
    }

    public function Desinscrire($nom, $prenom, $email, $mode, $user)
    {
        $bool = $this->utilisateurExisteDeja($nom, $prenom, $email);
        print("result : " .$bool);
        if (!$this->utilisateurExisteDeja($nom, $prenom, $email) == false) {
            if($user == false){
                Redirection::redirectSurInfolettre(5, 0, 0, $mode, 14);
            }
            else{
                print('truc 1');
                return -1;
            }

        } else {
            try {
                $requete_delete = $this->connectionDB->prepare("DELETE FROM infolettre WHERE nom = ? AND prenom = ? AND email = ?");
                $requete_delete->execute([$nom, $prenom, $email]);
                $nombre_lignes_affected = $requete_delete->rowCount();

                if ($nombre_lignes_affected > 0) {
                    // La suppression a réussi
                    if($user == false){
                        Redirection::redirectSurInfolettre(5, 0, 0, $mode, 15);
                    }
                    else{
                        print('truc 2');
                        return -1;
                    }
                }
            } catch (PDOException $e) {
                // Gérez les erreurs de base de données ici (journalisation, affichage d'un message d'erreur, etc.)
                //echo "Erreur de suppression d'abonné : " . $e->getMessage();
                // Retournez faux pour indiquer que la suppression a échoué
                if($user == false){
                    Redirection::redirectSurInfolettre(5, 0, 0, $mode, 16);
                }
                else{
                    return -1;
                }
            }
        }

    }


}
?>