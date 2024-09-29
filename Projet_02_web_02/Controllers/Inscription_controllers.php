<?php
include_once   __DIR__."/../Models/Utilisateur_model.php";

$mode;
$id_produit;
$page = $_POST['page'];
$page2;
// verifie le mode d'affichage
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    $id_produit = $_GET['id_produit'];
    $page2 = $_GET['page2'];
}

$user = Utilisateur::getInstance();
if ($page == 6) {
    $user->CreateUtilisateurSurProduit($_POST['nomInscription'], $_POST['prenomInscription'], $_POST['emailInscription'],
    $_POST['identifiantInscription'], $_POST['passwordInscription'], $_POST['page'], $mode, $id_produit, $page2);
} elseif ($page == 5) {
    $errorId = $_GET['errorId'];
   $user->CreateUtilisateurSurInfolettre($_POST['nomInscription'], $_POST['prenomInscription'], $_POST['emailInscription'],
   $_POST['identifiantInscription'], $_POST['passwordInscription'], $_POST['page'], $mode, $errorId);
} 
 else{
    $user->CreateUtilisateur($_POST['nomInscription'], $_POST['prenomInscription'], $_POST['emailInscription'],
                         $_POST['identifiantInscription'], $_POST['passwordInscription'], $_POST['page'], $mode);
}