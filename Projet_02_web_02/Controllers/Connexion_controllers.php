<?php
include_once  __DIR__."/../Models/Utilisateur_model.php";

$mode;
$id_produit;
$page = $_POST['page'];
$page2;
$errorId;
// verifie le mode d'affichage
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

$user = Utilisateur::getInstance();
if ($page == 6) {
    $id_produit = $_GET['id_produit'];
    $page2 = $_GET['page2'];
   $user->GetUtilisateurSurProduit($_POST['identifiantConnexion'], $_POST['passwordConnexion'], $_POST['page'], $mode, $id_produit, $page2);
} elseif ($page == 5) {
    $errorId = $_GET['errorId'];
   $user->GetUtilisateurSurInfolettre($_POST['identifiantConnexion'], $_POST['passwordConnexion'], $_POST['page'], $mode, $errorId);
} 
else{
    $user->GetUtilisateur($_POST['identifiantConnexion'], $_POST['passwordConnexion'], $_POST['page'], $mode);
}