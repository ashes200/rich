<?php
    $page = 5;
    include __DIR__."/Views/Composants/Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Views/Style/style.css">
    <link rel="stylesheet" href="./Views/Style/style_accueil.css">
    <title>Document</title>

</head>
<body>
    <?php
        include __DIR__."/Views/Composants/Header.php";
    ?>
    <section>
        <img src=".\Ressources\Image\logo_0020.png" alt="">
    </section>
    <?php
        include __DIR__."/Views/Composants/footer.php"
    ?>
        <style>
        select {
            /* From https://css.glass */
            background: rgba(1, 205, 254, 0.27);
        }
        section {
            width: 100%;
            margin: 0%;
            padding: 0px;
            text-align: center;
        }
        section > img {
            width: 50%;
            margin: 9% 0% 2% 0%;
        }
        
    </style>

    <!-- gestion du mode d'affichage -->
    <?php 
        if($mode == '2'){
            ?>
                <script>
                    document.getElementById('blackMode').checked = true;
                </script>
                <style>
                    body {
                        background: linear-gradient(rgba(0, 0, 0, 0.933) 0%, rgba(1,205,254,1) 50%, rgba(0, 0, 0, 1) 100%);
                    }
                    nav > ul > li:hover > a {
                        /* From https://css.glass */
                        background: rgb(30, 77, 89);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(6.1px);
                        -webkit-backdrop-filter: blur(6.1px);
                        border: 1px solid rgba(1, 205, 254, 0.23);
                    }
                    nav > ul > li:hover > .sous_catalogue > li {
                        /* From https://css.glass */
                        background: rgb(45, 73, 80);
                    }
                    .cravates:hover, .chemises:hover {
                        /* From https://css.glass */
                        background: rgb(58, 77, 82);
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
                        background: linear-gradient(rgba(255,255,255,0.9332983193277311) 0%, rgba(1,205,254,1) 50%, rgba(255,255,255,1) 100%);
                    }
                </style>
            <?php
        }
    ?>
</body>
</html>