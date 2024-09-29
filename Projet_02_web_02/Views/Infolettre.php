<?php
    $page = 4;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/style_infolettre.css">

    <title>Document</title>
</head>
<body>
    <?php
        include   __DIR__."/Composants/Header.php";
    ?>
    <section>
        <div class="infolettrePage">
            <p class="info"> Vous vous trouvez actuellement sur l'infolettre du site. Si vous souhaitez être mis
                au courant des nouveautés, des produits ou bien juste savoir s'il y a des offres
                vous avez juste a vous inscrire a notre infolettre pour recevoir tout l'actualité du site.
            </p>
            <h2>Formulaire d'inscription pour l'infolettre</h2>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Infolettre_controllers.php?mode=<?php echo $mode ?>" method="post">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" required><br>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" required><br>
                <label for="email">E-mail :</label>
                <input type="email" name="email" required><br>

                <input type="submit" value="Soumettre">

            </form>
        </div>
    </section>


    <?php
        include   __DIR__."/Composants/Footer.php";
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