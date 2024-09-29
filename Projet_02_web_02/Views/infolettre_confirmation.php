<?php
require_once  __DIR__."/../Models/infolettre_model.php";
include_once  __DIR__."/../Models/Error_model.php";
include_once  __DIR__."/../Models/Redirection_model.php";

$error_inst = Erreur::getInstance();

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}
if(isset($_GET['errorIdInfolettre'])){
    $errorIdInfolettre = $_GET['errorIdInfolettre'];
}
$info = Infolettre::getInstance();
$nom = $info->getNom();
$page = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style_infolettre.css">
    <link rel="stylesheet" href="./Style/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        include   __DIR__."/Composants/Header.php"
    ?>
    <div class="result">
        <?php
            if ($errorIdInfolettre == 11) {
                $error_texte = $error_inst->getError($errorIdInfolettre);
                ?>
                    <h3><?php echo $error_texte ?></h3>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/Infolettre.php?mode=<?php echo $mode  ?>" class="retour">retour a l'inscription</a>
                <?php
            }
            else if ($errorIdInfolettre == 13) {
                $error_texte = $error_inst->getError($errorIdInfolettre);
                ?>
                    <h3><?php echo $error_texte ?></h3>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/Infolettre.php?mode=<?php echo $mode  ?>"class="retour">retour a l'inscription</a>
                <?php
            }
            else {
                $error_texte = $error_inst->getError($errorIdInfolettre);
                ?>
                    <h3><?php echo $error_texte ?></h3>
                    <h5></h5>Merci à vous, vous receverez une info lettre bientôt</h5>
                    <style>
                        h5 {
                            margin-bottom: 10%;
                        }
                    </style>
                <?php
            }
        ?>
    </div>
    <?php
        include  __DIR__."/Composants/footer.php"
    ?>
    <!-- gestion du mode d'affichage -->
    <?php 
        if($mode == '2'){
            ?>
                <script>
                    document.getElementById('blackMode').checked = true;
                </script>
                <style>
                    body {
                        background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(255,113,206,1) 50%, rgba(0, 0, 0, 1) 100%);
                    }
                    .infolettre {
                        /* From https://css.glass */
                        background: rgba(59, 7, 41, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    }
                    nav > ul > li:hover > a{
                        /* From https://css.glass */
                        background: rgba(68, 9, 47, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                        }
                        nav > ul > li:hover > .sous_catalogue > li {
                        /* From https://css.glass */
                        background: rgba(71, 37, 59, 0.27);
                        }
                        footer, select  {

                        /* From https://css.glass */
                        background: rgba(255, 113, 206, 0.27);
                        }
                        .cravates:hover, .chemises:hover {
                        /* From https://css.glass */
                        background: rgba(64, 47, 58, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(252, 254, 255, 0.23);
                    }
                </style>
            <?php
        }else{
            ?>
                <script>
                    document.getElementById('whiteMode').checked = true;
                </script>
                <style>
                    body {
                        background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(255,113,206,1) 50%, rgba(255,255,255,1) 100%);
                    }
                    .infolettre {
                        /* From https://css.glass */
                        background: rgba(252, 31, 175, 0.27);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    } 
                </style>
            <?php
        }
    ?>
</body>
</html>
