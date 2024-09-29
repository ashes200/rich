<?php
    // les includes
    include_once  __DIR__."/../../Models/Session_model.php";
    include_once __DIR__."/../../Models/Utilisateur_model.php";
    include_once __DIR__."/../../Models/Error_model.php";
    include_once __DIR__."/../../Models/Redirection_model.php";

    $session_inst = SessionManager::getInstance();
    $user_inst= Utilisateur::getInstance();
    $error_inst = Erreur::getInstance();

    $session_inst->startSession();

    /* les diferents etatLog ->
    0 = rien
    1 = fenetre connection ouverte
    2 = fenetre inscription ouverte
    3 = fenetre login ouverte

    */

    $etat_connect= false; // etat de la session (true ou false)

    $page; // la page actuel (de 0 - 7)

    $error_texte = ''; // le message d'erreur

    // verifie si l'utilisateur est connecte
    if ($session_inst->isSessionStarted() == 2 or $session_inst->isSessionStarted() == 1){
        if (isset($_SESSION['connect'])){
            if($_SESSION['connect'] == true){
                $etat_connect = true;
            }
        }
    }

    $etatLog = 0;
    $errorId = 0;
    $mode = 1;

    if (isset($_GET['etatLog'])) {
        $etatLog = $_GET['etatLog'];
    }
    if (isset($_GET['errorId'])) {
        $errorId = $_GET['errorId'];
    }
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    }

?>
<!-- Le HTML -->

    <!-- les menu -->

        <!-- le menu grand format -->
<nav>
    <?php
        include_once __DIR__."/Nav_grand_ecran_composant.php";
    ?>
</nav>

        <!-- menu petit format -->
<input type="checkbox" id="menu" class="menu_input">
<label class="menu" for="menu">menu</label>
<form class="mini_menu">
    <?php
        include_once __DIR__."/Nav_petit_ecran_composant.php";
    ?>
</form>


    <!-- les fenetre de gestion d'utilisateur -->

            <!--fenetre de connexion-->
<div id="connexion" class="connexion_onglet">
    <?php
        include_once __DIR__."/Page_connection_composant.php";
    ?>
</div>

<!--fenetre d'inscription'-->
<div id="inscription" class="inscription_onglet">
    <?php
        include_once __DIR__."/Page_inscription_composant.php";
    ?>  
</div>

<!--fenetre de detail-->
<div id="detail" class="detail_onglet">
    <?php
        include_once __DIR__."/Page_detail_composant.php";
    ?> 
</div>


<!-- les gestions d'etats -->
<?php
        // get les message d'erreurs
    if ($errorId != 0){
        $error_texte = $error_inst->getError($errorId);
    }
    //print($error_texte);
?>

<!-- les fenetre de gestion d'utilisateur -->
<?php
    if($etatLog == 1){ // get 
        ?>
            <!--fenetre de connexion-->
            <style>
                /*les styles pour la fenetre de connexion*/
                .connexion_onglet {
                    display: block;
                }
            </style>
        <?php
    }
    else if($etatLog == 2){
        ?>        
            <!--fenetre d'inscription'-->
            <style>
                /*les styles pour la fenetre de connexion*/
                .inscription_onglet {
                    display: block;
                }
            </style>
        <?php
    }
    else if($etatLog == 3){
        ?>
            <!--fenetre de detail-->
            <style>
                /*les styles pour la fenetre de connexion*/
                .detail_onglet {
                    display: block;
                }
            </style>
        <?php
    }
?>

<?php
    if ($errorId == 2){
        ?>
            <style>
                .errorConnection{
                    display: block;
                    border-color: blue;
                    color: blue;
                }
                .errorDetail{
                    display: none;
                }
                .errorInscription{
                    display: none;
                }
            </style>
        <?php
    }
    else if ($errorId == 1 or $errorId == 3){
        ?>
            <style>
                .errorConnection{
                    display: block;
                    border-color: red;
                    color: red;
                }
                .errorDetail{
                    display: none;
                }
                .errorInscription{
                    display: none;
                }
            </style>
        <?php
    }
    else if ($errorId == 5){
        ?>
            <style>
                .errorInscription{
                    display: block;
                    border-color: blue;
                    color: blue;
                }
                .errorDetail{
                    display: none;
                }
                .errorConnection{
                    display: none;
                }
            </style>
        <?php
    }
    else if ($errorId == 4 or $errorId == 6){
        ?>
            <style>
                .errorInscription{
                    display: block;
                    border-color: red;
                    color: red;
                }
                .errorDetail{
                    display: none;
                }
                .errorConnection{
                    display: none;
                }
            </style>
        <?php
    }
    else if ($errorId == 8){
        ?>
            <style>
                .errorDetail{
                    display: block;
                    border-color: blue;
                    color: blue;
                }
                .errorConnection{
                    display: none;
                }
                .errorInscription{
                    display: none;
                }
            </style>
        <?php
    }
    else if ($errorId == 7 or $errorId == 9){
        ?>
            <style>
                .errorDetail{
                    display: block;
                    border-color: red;
                    color: red;
                }
                .errorConnection{
                    display: none;
                }
                .errorInscription{
                    display: none;
                }
            </style>
        <?php
    }
    else{
        ?>
            <style>
                .errorDetail{
                    display: none;
                }
                .errorConnection{
                    display: none;
                }
                .errorInscription{
                    display: none;
                }
            </style>
        <?php
    }
?>
    <!-- gestion du mode d'affichage -->
    <?php 
        if($mode == '2'){
            ?>
                <script>
                    document.getElementById('blackMode').checked = true;
                </script>
                <style>
                    .footer {
                        color: white;
                    }
                    .footer a {
                        color: white;
                    }
                    .sous_catalogue label{
                        color: white;
                    }
                    .nav li, .nav a{
                        color: white;
                    }
                    #musiq{
                        color: white;
                    }
                </style>
            <?php
        }
    ?>
<!-- Les differents script JavaScript -->
<?php
    $urlMeteo = __DIR__."../JS/meteo_script.js";
?>

<script src="/Project_Web_2/Projet_02_web_02/Views/JS/meteo_script.js"></script>
<script src="/Project_Web_2/Projet_02_web_02/Views/JS/header_script.js"></script>