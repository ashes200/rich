<?php
include_once  __DIR__."/../Models/Utilisateur_model.php";

$mode;
$page = $_POST['page'];
// verifie le mode d'affichage
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

$user = Utilisateur::getInstance();
if ($page == 6) {
    $id_produit;
    $page2;
    // verifie le mode d'affichage
    if (isset($_GET['mode'])) {
        $id_produit = $_GET['id_produit'];
        $page2 = $_GET['page2'];
    }
    if($_POST["action"] == "Mettre a jour"){
        print('password ' .$_POST["passwordDetail"]);
        $infolettre;
        if (isset($_POST["infolettre"])) {
            $infolettre = $_POST['infolettre'];
        }
        else {
            $infolettre = 'no';
        }
        $user->UpdateUtilisateurInfoSurProduit($_SESSION["user_id"],$_POST["nomDetail"],$_POST["prenomDetail"],$_POST["emailDetail"],$_POST["identifiantDetail"],$_POST["passwordDetail"],$infolettre,$_POST["page"], $mode, $id_produit, $page2);
        
    }
    else if($_POST["action"] == "Deconnecte"){
        $user->LogoutSurProduit($_POST['page'], $mode, $id_produit, $page2);
    }
} elseif ($page == 5) {
    $errorId = $_GET['errorId'];
    if($_POST["action"] == "Mettre a jour"){
        print('password ' .$_POST["passwordDetail"]);
        $infolettre;
        if (isset($_POST["infolettre"])) {
            $infolettre = $_POST['infolettre'];
        }
        else {
            $infolettre = 'no';
        }
        $user->UpdateUtilisateurInfoSurInfolettre($_SESSION["user_id"],$_POST["nomDetail"],$_POST["prenomDetail"],$_POST["emailDetail"],$_POST["identifiantDetail"],$_POST["passwordDetail"],$infolettre,$_POST["page"], $mode, $errorId);
        
    }
    else if($_POST["action"] == "Deconnecte"){
        $user->LogoutSurInfolettre($_POST['page'], $mode, $errorId);
    }
} else{
    if($_POST["action"] == "Mettre a jour"){
        print('password ' .$_POST["passwordDetail"]);
        $infolettre;
        if (isset($_POST["infolettre"])) {
            $infolettre = $_POST['infolettre'];
        }
        else {
            $infolettre = 'no';
        }
        $user->UpdateUtilisateurInfo($_SESSION["user_id"],$_POST["nomDetail"],$_POST["prenomDetail"],$_POST["emailDetail"],$_POST["identifiantDetail"],$_POST["passwordDetail"],$infolettre,$_POST["page"], $mode);
        
    }
    else if($_POST["action"] == "Deconnecte"){
        $user->Logout($_POST['page'], $mode);
    }
}

