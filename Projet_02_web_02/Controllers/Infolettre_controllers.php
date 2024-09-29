<?php
require_once  __DIR__."/../Models/infolettre_model.php";
include_once  __DIR__."/../Models/Error_model.php";
include_once  __DIR__."/../Models/Redirection_model.php";

$error_inst = Erreur::getInstance();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mode;
$errorId = 0;
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}
$info = Infolettre::getInstance();
$info->InscritInfolettre($nom, $prenom, $email, $mode, false);
?>

