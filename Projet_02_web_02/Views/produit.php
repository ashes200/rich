<?php
    include_once __DIR__."/../Models/Catalogue_Model.php";
    include_once __DIR__."/../Models/Produit_Model.php";

    $produit = Produit::getInstance();
    $page =  6 ;
    $page2;

    // Vérifiez si l'ID du produit a été passé en paramètre d'URL
    if (isset($_GET['id_produit'])) {
        // Récupérez l'ID du produit à partir des paramètres d'URL
        $id_produit = $_GET['id_produit'];
        $page2 = $_GET['page'];
    } else {
        // Si aucun ID de produit n'est passé, affichez un message d'erreur ou redirigez l'utilisateur
        echo "ID du produit non spécifié.";
        // Vous pouvez également rediriger l'utilisateur vers une autre page avec header() ou afficher un message d'erreur.
    }
    print($page2);
    $produit->chargerProduitParId($id_produit);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/style_souscatalogue.css">
    <link rel="stylesheet" href="./Style/style_produit.css">
    <?php
        if ($page2 == 1) { ?><link rel="stylesheet" href="./Style/style_catalogue.css"> <?php }
        else if ($page2 == 2) { ?><link rel="stylesheet" href="./Style/style_catalogue_chemise.css"> <?php }
        else if ($page2 == 3) { ?><link rel="stylesheet" href="./Style/style_catalogue_cravate.css"> <?php }
        else { ?> <link rel="stylesheet" href="./Style/style_accueil.css"> <?php }
    ?>
    <title>Document</title>
</head>
<body>
    <?php
        include  __DIR__."/Composants/Header.php"
    ?>
    <section>
        <div class="produit">
            <div class="imageProduit"> <img src="<?php echo $produit->afficherImage() ?>" alt="produit.php"> </div>
            <div class="allInfo">
                <h2><?php echo "" .$produit->afficherNom(); ?> </h2>
                <p class="prixProduit"> <?php echo "" .$produit->afficherPrix(). "$"; ?> </p>
                <?php 
                    $prodCategorie = $produit->getCategorieParId($id_produit);
                    if ($prodCategorie != "Cravate") {
                        ?>
                            <select name="taille" id="taille">
                                <option value="1" id="01">44</option>
                                <option value="2" id="02">46</option>
                                <option value="2" id="02">48</option>
                                <option value="2" id="02">50</option>
                                <option value="2" id="02">52</option>
                                <option value="2" id="02">54</option>
                                <option value="2" id="02">56</option>
                            </select>
                        <?php
                    }
                ?>

                <p class="descriptionProduit"> <?php echo "" .$produit->afficherDescription(); ?> </p>
                <button id="boutonProduit">Ajouter au panier</button>
            </div>
        </div>
        
        <?php
            include __DIR__."/Composants/Recommendation_composant.php";
        ?>
    </section>
    <?php
        include __DIR__."/Composants/Footer.php"
    ?>
    
    <!-- gestion du mode d'affichage -->
    <?php 
        if($mode == '2'){
            if($page2 == 0 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(1,205,254,1) 50%, rgba(0, 0, 0, 1) 100%);
                        }
                <?php
            }
            else if ($page2 == 1 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(185,103,255,1) 40%, rgba(0, 0, 0, 1) 100%);
                        }
                        .catalogue {
                            /* From https://css.glass */
                            background: rgba(79, 39, 83, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(1, 205, 254, 0.23);
                        }
                    </style>
                <?php
            }
            else if ($page2 == 2 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(255,251,150,1) 50%, rgba(0, 0, 0, 1) 100%);
                        }
                        .catalogue {
                            /* From https://css.glass */
                            background: rgba(78, 75, 0, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(1, 205, 254, 0.23);
                        }
                        .chemises {
                            /* From https://css.glass */
                            background: rgba(251, 248, 168, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(252, 254, 255, 0.23);
                            color: black;
                        }
                    </style>
                <?php
            }
            else if ($page2 == 3 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(5,255,161,1) 50%, rgba(0, 0, 0, 1) 100%);
                        }
                        .catalogue {
                            /* From https://css.glass */
                            background: rgba(0, 76, 47, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(1, 205, 254, 0.23);
                        }
                        .cravates {
                            /* From https://css.glass */
                            background: rgba(174, 255, 224, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(252, 254, 255, 0.23);
                            color: black;
                        }
                    </style>
                <?php
            }
            
        }else{
            if($page2== 0 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(1,205,254,1) 50%, rgba(255,255,255,1) 100%);
                        }
                <?php
            }
            else if ($page2 == 1 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(185,103,255,1) 40%, rgba(255,255,255,1) 100%);
                        }
                        .catalogue {
                            /* From https://css.glass */
                            background: rgba(243, 119, 255, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(1, 205, 254, 0.23);
                        }
                    </style>
                <?php
            }
            else if ($page2 == 2 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(255,251,150,1) 50%, rgba(255,255,255,1) 100%);
                        }
                        .catalogue {
                            /* From https://css.glass */
                            background: rgba(255, 247, 4, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(1, 205, 254, 0.23);
                            
                        }
                        .chemises {
                            /* From https://css.glass */
                            background: rgba(85, 84, 58, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(252, 254, 255, 0.23);
                            color: black;
                        }
                    </style>
                <?php
            }
            else if ($page2 == 3 ){
                ?>
                    <script>
                        document.getElementById('blackMode').checked = true;
                    </script>
                    <style>
                        body {
                            background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%,rgba(5,255,161,1) 50%, rgba(255,255,255,1) 100%);
                        }
                        .catalogue {
                            /* From https://css.glass */
                            background: rgba(0, 252, 155, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(1, 205, 254, 0.23);
                            
                        }
                        .cravates {
                            /* From https://css.glass */
                            background: rgba(49, 72, 63, 0.27);
                            border-radius: 16px;
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(6.1px);
                            -webkit-backdrop-filter: blur(6.1px);
                            border: 1px solid rgba(252, 254, 255, 0.23);
                            color: black;
                        }
                    </style>
                <?php
            }

        }
    ?>
        <!-- gestion du mode d'affichage -->
        <?php 
        if($mode == '2'){
            ?>
                <script>
                    document.getElementById('blackMode').checked = true;
                </script>
            <?php
        }else{
            ?>
                <script>
                    document.getElementById('whiteMode').checked = true;
                </script>
            <?php
        }
    ?>
</body>
</html>