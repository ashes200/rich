<?php

include_once __DIR__."/connexionBD.php";
include_once __DIR__."/Session_model.php";
include_once __DIR__."/infolettre_model.php";
include_once __DIR__."/Redirection_model.php";

class Utilisateur {
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $username;
    
    private $infolettre_admin;
    private $connectionDB;
    private $session_instance;

    private $infoletttre_instance;


    private static $user_instance;

    private function __construct() {
        $this->session_instance = SessionManager::getInstance(); // Utilisez $this->session_instance
        $this->session_instance->startSession();
        $this->infoletttre_instance = Infolettre::getInstance();

        try {
            $connection = Connexion::getInstance();
            $this->connectionDB = $connection->getConnexion();
        }
        catch(PDOEXCEPTION $e) {
            echo 'echec de la connexion : ' .$e->getMessage();
        }
    }

    final public static function getInstance() {
        if (!isset(self::$user_instance)) {
            self::$user_instance = new Utilisateur();
        }
        return self::$user_instance;
    }

    // Getter pour l'attribut $nom
    public function getNom() {
        return $this->nom;
    }

    // Getter pour l'attribut $prenom
    public function getPrenom() {
        return $this->prenom;
    }

    // Getter pour l'attribut $email
    public function getEmail() {
        return $this->email;
    }

    // Getter pour l'attribut $password
    public function getPassword() {
        return $this->password;
    }

    public function getInfolettre_admin() {
        return $this->infolettre_admin;
    }

    public function setInfolettre_admin($infolettre_admin) {
        $this->infolettre_admin = $infolettre_admin;
    }
    // Getter pour l'attribut $username
    public function getUsername() {
        return $this->username;
    }

    private function hasherMotDePasse($motDePasse) {
        // Génére un hachage sécurisé du mot de passe
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
        return $hash;
    }

    private function verifierMotDePasse($motDePasse, $hachage) {
        // Vérifie si le mot de passe correspond au hachage
        if (password_verify($motDePasse, $hachage)) {
            return true; // Mot de passe valide
        } else {
            return false; // Mot de passe invalide
        }
    }
    
    private function getUserId($nomUtilisateur, $motDePasse) {
        try {
            $select = "SELECT id, mot_de_passe FROM utilisateur WHERE nom_utilisateur = :nomUtilisateur";
            $stmt = $this->connectionDB->prepare($select);
            $stmt->bindParam(':nomUtilisateur', $nomUtilisateur);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Vérifier le mot de passe en utilisant la méthode verifierMotDePasse
                if ($this->verifierMotDePasse($motDePasse, $result['mot_de_passe'])) {
                    return $result['id']; // Retourne l'ID de l'utilisateur s'il est authentifié
                } else {
                    return null; // Mot de passe invalide
                }
            } else {
                return null; // Nom d'utilisateur non trouvé
            }
        } catch (PDOException $e) {
            //echo 'Erreur : ' . $e->getMessage();
            return null; // Gestion de l'erreur
        }
    }
    
    
    
    public function UpdateUtilisateurInfo($userId, $nom, $prenom, $email, $username, $password, $infolettre, $page, $mode) {      
        print($infolettre);  
        if($infolettre == 'yes'){
            //print('1');
            $this->infoletttre_instance->InscritInfolettre($nom, $prenom, $email, $mode, true);
        }
        else{
            //print('2');
            $this->infoletttre_instance->Desinscrire($nom,$prenom,$email, $mode, true);
        };
        try {
            // Utilisez la fonction hasherMotDePasse pour hasher le nouveau mot de passe
            if (empty($password)){
                print('1');
                $query = $this->connectionDB->prepare("
                    UPDATE utilisateur 
                    SET nom = ?, prenom = ?, email = ?, nom_utilisateur = ?
                    WHERE id = ?
                ");
                
                $query->execute([$nom, $prenom, $email, $username, $userId]);
            } 
            else {
                print('2');
                $hashedPassword = $this->hasherMotDePasse($password);
                $query = $this->connectionDB->prepare("
                    UPDATE utilisateur 
                    SET nom = ?, prenom = ?, email = ?, nom_utilisateur = ?, mot_de_passe = ?
                    WHERE id = ?
                ");
                
                $query->execute([$nom, $prenom, $email, $username, $hashedPassword, $userId]);
            }
    
            // Check if the update was successful
            $updateSuccess = $query->rowCount() > 0;
    
            if ($updateSuccess) {
                // Redirect to the specified page upon successful update
                Redirection::redirect($page, 3, 8, $mode);
            } else {
                // Redirect to the specified page if the user ID is not found
                Redirection::redirect($page, 3, 8, $mode);
                
                
            }
        } catch (PDOException $e) {
            // Handle the exception, e.g., log or display an error message
            //echo 'Erreur : ' . $e->getMessage();
            Redirection::redirect($page, 3, 9, $mode);
        }
    }
    
    public function UpdateUtilisateurInfoSurProduit($userId, $nom, $prenom, $email, $username, $password, $infolettre, $page, $mode, $id_produit, $page2) {      
        print($infolettre);  
        if($infolettre == 'yes'){
            //print('1');
            $this->infoletttre_instance->InscritInfolettre($nom, $prenom, $email, $mode, true);
        }
        else{
            //print('2');
            $this->infoletttre_instance->Desinscrire($nom,$prenom,$email, $mode, true);
        };
        try {
            // Utilisez la fonction hasherMotDePasse pour hasher le nouveau mot de passe
            if (empty($password)){
                print('1');
                $query = $this->connectionDB->prepare("
                    UPDATE utilisateur 
                    SET nom = ?, prenom = ?, email = ?, nom_utilisateur = ?
                    WHERE id = ?
                ");
                
                $query->execute([$nom, $prenom, $email, $username, $userId]);
            } 
            else {
                print('2');
                $hashedPassword = $this->hasherMotDePasse($password);
                $query = $this->connectionDB->prepare("
                    UPDATE utilisateur 
                    SET nom = ?, prenom = ?, email = ?, nom_utilisateur = ?, mot_de_passe = ?
                    WHERE id = ?
                ");
                
                $query->execute([$nom, $prenom, $email, $username, $hashedPassword, $userId]);
            }
    
            // Check if the update was successful
            $updateSuccess = $query->rowCount() > 0;
    
            if ($updateSuccess) {
                // Redirect to the specified page upon successful update
                Redirection::redirectSurProduit($page, 3, 8, $mode, $id_produit, $page2);
            } else {
                // Redirect to the specified page if the user ID is not found
                Redirection::redirectSurProduit($page, 3, 8, $mode, $id_produit, $page2);
                
                
            }
        } catch (PDOException $e) {
            // Handle the exception, e.g., log or display an error message
            //echo 'Erreur : ' . $e->getMessage();
            Redirection::redirectSurProduit($page, 3, 9, $mode, $id_produit, $page2);
        }
    }

    public function UpdateUtilisateurInfoSurInfolettre($userId, $nom, $prenom, $email, $username, $password, $infolettre, $page, $mode, $errorId) {      
        print($infolettre);  
        if($infolettre == 'yes'){
            //print('1');
            $this->infoletttre_instance->InscritInfolettre($nom, $prenom, $email, $mode, true);
        }
        else{
            //print('2');
            $this->infoletttre_instance->Desinscrire($nom,$prenom,$email, $mode, true);
        };
        try {
            // Utilisez la fonction hasherMotDePasse pour hasher le nouveau mot de passe
            if (empty($password)){
                print('1');
                $query = $this->connectionDB->prepare("
                    UPDATE utilisateur 
                    SET nom = ?, prenom = ?, email = ?, nom_utilisateur = ?
                    WHERE id = ?
                ");
                
                $query->execute([$nom, $prenom, $email, $username, $userId]);
            } 
            else {
                print('2');
                $hashedPassword = $this->hasherMotDePasse($password);
                $query = $this->connectionDB->prepare("
                    UPDATE utilisateur 
                    SET nom = ?, prenom = ?, email = ?, nom_utilisateur = ?, mot_de_passe = ?
                    WHERE id = ?
                ");
                
                $query->execute([$nom, $prenom, $email, $username, $hashedPassword, $userId]);
            }
    
            // Check if the update was successful
            $updateSuccess = $query->rowCount() > 0;
    
            if ($updateSuccess) {
                // Redirect to the specified page upon successful update
                Redirection::redirectSurInfolettre($page, 3, 8, $mode, $errorId);
            } else {
                // Redirect to the specified page if the user ID is not found
                Redirection::redirectSurInfolettre($page, 3, 8, $mode, $errorId);
                
                
            }
        } catch (PDOException $e) {
            // Handle the exception, e.g., log or display an error message
            //echo 'Erreur : ' . $e->getMessage();
            Redirection::redirectSurInfolettre($page, 3, 9, $mode, $errorId);
        }
    }

    public function CreateUtilisateur($nom, $prenom, $email, $nomUtilisateur, $motDePasse, $page, $mode){
    
        // Étape 1 : Vérifier si l'utilisateur existe déjà
        if ($this->utilisateurExisteDeja($email, $nomUtilisateur)) {
            // L'utilisateur existe déjà, vous pouvez rediriger ou afficher un message d'erreur
            Redirection::redirect($page, 2, 4, $mode);
            return;
        }
        else {
            try {
                $motDePasseHasher = $this->hasherMotDePasse($motDePasse);
                // Étape 2 : Insérer un nouvel utilisateur
                $insertion = "INSERT INTO utilisateur(nom, prenom, email, nom_utilisateur, mot_de_passe)
                VALUES('$nom', '$prenom', '$email', '$nomUtilisateur', '$motDePasseHasher')";
        
                $this->connectionDB->exec($insertion);
                $userID = $this->getUserId($nomUtilisateur, $motDePasse);
                //print($userID);
                $this->session_instance->setSessionVariable("id", $userID);
                $this->session_instance->setSessionVariable("user_id", $userID);
                $this->session_instance->setSessionVariable("connect", true);
        
            
                Redirection::redirect($page, 3, 0, $mode);
            } catch (PDOException $e) {
                //echo 'Erreur : ' . $e->getMessage();
                Redirection::redirect($page, 2, 6, $mode);
            }
        }
    }
    public function CreateUtilisateurSurProduit($nom, $prenom, $email, $nomUtilisateur, $motDePasse, $page, $mode, $id_produit, $page2){
    
        // Étape 1 : Vérifier si l'utilisateur existe déjà
        if ($this->utilisateurExisteDeja($email, $nomUtilisateur)) {
            // L'utilisateur existe déjà, vous pouvez rediriger ou afficher un message d'erreur
            Redirection::redirectSurProduit($page, 2, 4, $mode, $id_produit, $page2);
            return;
        }
        else {
            try {
                $motDePasseHasher = $this->hasherMotDePasse($motDePasse);
                // Étape 2 : Insérer un nouvel utilisateur
                $insertion = "INSERT INTO utilisateur(nom, prenom, email, nom_utilisateur, mot_de_passe)
                VALUES('$nom', '$prenom', '$email', '$nomUtilisateur', '$motDePasseHasher')";
        
                $this->connectionDB->exec($insertion);
                $userID = $this->getUserId($nomUtilisateur, $motDePasse);
                //print($userID);
                $this->session_instance->setSessionVariable("id", $userID);
                $this->session_instance->setSessionVariable("user_id", $userID);
                $this->session_instance->setSessionVariable("connect", true);
        
            
                Redirection::redirectSurProduit($page, 3, 0, $mode, $id_produit, $page2);
            } catch (PDOException $e) {
                //echo 'Erreur : ' . $e->getMessage();
                Redirection::redirectSurProduit($page, 2, 6, $mode, $id_produit, $page2);
            }
        }
    }
    public function CreateUtilisateurSurInfolettre($nom, $prenom, $email, $nomUtilisateur, $motDePasse, $page, $mode, $errorId){
    
        // Étape 1 : Vérifier si l'utilisateur existe déjà
        if ($this->utilisateurExisteDeja($email, $nomUtilisateur)) {
            // L'utilisateur existe déjà, vous pouvez rediriger ou afficher un message d'erreur
            Redirection::redirectSurInfolettre($page, 2, 4, $mode, $errorId);
            return;
        }
        else {
            try {
                $motDePasseHasher = $this->hasherMotDePasse($motDePasse);
                // Étape 2 : Insérer un nouvel utilisateur
                $insertion = "INSERT INTO utilisateur(nom, prenom, email, nom_utilisateur, mot_de_passe)
                VALUES('$nom', '$prenom', '$email', '$nomUtilisateur', '$motDePasseHasher')";
        
                $this->connectionDB->exec($insertion);
                $userID = $this->getUserId($nomUtilisateur, $motDePasse);
                //print($userID);
                $this->session_instance->setSessionVariable("id", $userID);
                $this->session_instance->setSessionVariable("user_id", $userID);
                $this->session_instance->setSessionVariable("connect", true);
        
            
                Redirection::redirectSurInfolettre($page, 3, 0, $mode, $errorId);
            } catch (PDOException $e) {
                //echo 'Erreur : ' . $e->getMessage();
                Redirection::redirectSurInfolettre($page, 2, 6, $mode, $errorId);
            }
        }
    }
    // Fonction pour vérifier si un utilisateur existe déjà
    private function utilisateurExisteDeja($email, $nomUtilisateur) {
        $sql = "SELECT COUNT(*) FROM utilisateur WHERE email = '$email' OR nom_utilisateur = '$nomUtilisateur'";
        $result = $this->connectionDB->query($sql);
        $count = $result->fetchColumn();
        return $count > 0;
    }
    
    public function GetUtilisateurinfo($id){
        try {
            if(!empty($id))  {
                $requet_user = $this->connectionDB ->prepare("SELECT * FROM utilisateur where id = ?");
                $requet_user->execute(array($id));
                $user_exist = $requet_user->rowCount();
                $user_info = $requet_user->fetch(PDO::FETCH_ASSOC);

                if($user_exist == 1){
                    $this->nom = $user_info['nom'];
                    $this->prenom = $user_info['prenom'];
                    $this->email = $user_info['email'];
                    $this->username = $user_info['nom_utilisateur'];
                    $this->password = $user_info['mot_de_passe'];

                    $nb = $this->infoletttre_instance->utilisateurExisteDeja($this->email, $this->nom, $this->prenom);
                    if($nb > 0){
                        $this->infolettre_admin=true;
                    }
                    else{
                        $this->infolettre_admin=false;
                    }
                }

            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    public function GetUtilisateur($nomUtilisateur, $motDePasse, $page, $mode) {
        try {
            if (!empty($nomUtilisateur) && !empty($motDePasse)) {
                // Utilisez la fonction hasherMotDePasse pour hacher le mot de passe
                $requete_user = $this->connectionDB->prepare("SELECT * FROM utilisateur where nom_utilisateur = ?");
                $requete_user->execute(array($nomUtilisateur));
                
                // Vérifie si l'utilisateur existe
                if ($requete_user->rowCount() == 1) {
                    $row = $requete_user->fetch(PDO::FETCH_ASSOC);
                    $motDePasseStocke = $row['mot_de_passe'];
                    
                    // Utilisez la fonction verifierMotDePasse pour comparer les hachages
                    if ($this->verifierMotDePasse($motDePasse, $motDePasseStocke)) {
                        // Mot de passe valide
                        $this->session_instance->setSessionVariable("user_id", $row['id']);
                        $this->session_instance->setSessionVariable("connect", true);
                        //print($row["id"]. "<br>");
                        
                        Redirection::redirect($page, 3, 0, $mode);
                    } else {
                        // Mot de passe invalide
                        //print("Mot de passe invalide");
                        $this->session_instance->setSessionVariable("connect", false);
                        $this->session_instance->destroySession();
                        Redirection::redirect($page, 1, 1, $mode);
                    }
                } else {
                    // Utilisateur non trouvé
                    //print("Utilisateur non trouvé");
                    $this->session_instance->setSessionVariable("connect", false);
                    $this->session_instance->destroySession();
                    Redirection::redirect($page, 1, 1, $mode);
                }
            }
        } catch (PDOException $e) {
            //echo 'Erreur : ' . $e->getMessage();
            Redirection::redirect($page, 1, 3, $mode);
        }
    }
    public function GetUtilisateurSurProduit($nomUtilisateur, $motDePasse, $page, $mode, $id_produit, $page2) {
        print("page2 ".$page2);
        print("id prod ".$id_produit);
        print("mode ".$mode);
        try {
            if (!empty($nomUtilisateur) && !empty($motDePasse)) {
                // Utilisez la fonction hasherMotDePasse pour hacher le mot de passe
                $requete_user = $this->connectionDB->prepare("SELECT * FROM utilisateur where nom_utilisateur = ?");
                $requete_user->execute(array($nomUtilisateur));
                
                // Vérifie si l'utilisateur existe
                if ($requete_user->rowCount() == 1) {
                    $row = $requete_user->fetch(PDO::FETCH_ASSOC);
                    $motDePasseStocke = $row['mot_de_passe'];
                    
                    // Utilisez la fonction verifierMotDePasse pour comparer les hachages
                    if ($this->verifierMotDePasse($motDePasse, $motDePasseStocke)) {
                        // Mot de passe valide
                        $this->session_instance->setSessionVariable("user_id", $row['id']);
                        $this->session_instance->setSessionVariable("connect", true);
                        //print($row["id"]. "<br>");
                        
                        Redirection::redirectSurProduit($page, 3, 0, $mode, $id_produit, $page2);
                    } else {
                        // Mot de passe invalide
                        //print("Mot de passe invalide");
                        $this->session_instance->setSessionVariable("connect", false);
                        $this->session_instance->destroySession();
                        Redirection::redirectSurProduit($page, 1, 1, $mode, $id_produit, $page2);
                    }
                } else {
                    // Utilisateur non trouvé
                    //print("Utilisateur non trouvé");
                    $this->session_instance->setSessionVariable("connect", false);
                    $this->session_instance->destroySession();
                    Redirection::redirectSurProduit($page, 1, 1, $mode, $id_produit, $page2);
                }
            }
        } catch (PDOException $e) {
            //echo 'Erreur : ' . $e->getMessage();
            Redirection::redirectSurProduit($page, 1, 3, $mode, $id_produit, $page2);
        }
    }
    public function GetUtilisateurSurInfolettre($nomUtilisateur, $motDePasse, $page, $mode, $errorId) {
        try {
            if (!empty($nomUtilisateur) && !empty($motDePasse)) {
                // Utilisez la fonction hasherMotDePasse pour hacher le mot de passe
                $requete_user = $this->connectionDB->prepare("SELECT * FROM utilisateur where nom_utilisateur = ?");
                $requete_user->execute(array($nomUtilisateur));
                
                // Vérifie si l'utilisateur existe
                if ($requete_user->rowCount() == 1) {
                    $row = $requete_user->fetch(PDO::FETCH_ASSOC);
                    $motDePasseStocke = $row['mot_de_passe'];
                    
                    // Utilisez la fonction verifierMotDePasse pour comparer les hachages
                    if ($this->verifierMotDePasse($motDePasse, $motDePasseStocke)) {
                        // Mot de passe valide
                        $this->session_instance->setSessionVariable("user_id", $row['id']);
                        $this->session_instance->setSessionVariable("connect", true);
                        //print($row["id"]. "<br>");
                        
                        Redirection::redirectSurInfolettre($page, 3, 0, $mode, $errorId);
                    } else {
                        // Mot de passe invalide
                        //print("Mot de passe invalide");
                        $this->session_instance->setSessionVariable("connect", false);
                        $this->session_instance->destroySession();
                        Redirection::redirectSurInfolettre($page, 1, 1, $mode, $errorId);
                    }
                } else {
                    // Utilisateur non trouvé
                    //print("Utilisateur non trouvé");
                    $this->session_instance->setSessionVariable("connect", false);
                    $this->session_instance->destroySession();
                    Redirection::redirectSurInfolettre($page, 1, 1, $mode, $errorId);
                }
            }
        } catch (PDOException $e) {
            //echo 'Erreur : ' . $e->getMessage();
            Redirection::redirect($page, 1, 3, $mode);
        }
    }
    public function Logout($page, $mode) {
        //print('truc');
        $this->session_instance->setSessionVariable("connect", false);
        $this->session_instance->destroySession();
        Redirection::redirect($page, 1, 0, $mode);
    }    
    public function LogoutSurProduit($page, $mode, $id_produit, $page2) {
        //print('truc');
        $this->session_instance->setSessionVariable("connect", false);
        $this->session_instance->destroySession();
        Redirection::redirectSurProduit($page, 1, 0, $mode, $id_produit, $page2);
    }
    public function LogoutSurInfolettre($page, $mode, $errorId) {
        //print('truc');
        $this->session_instance->setSessionVariable("connect", false);
        $this->session_instance->destroySession();
        Redirection::redirectSurInfolettre($page, 1, 0, $mode, $errorId);
    }
   
}


?>