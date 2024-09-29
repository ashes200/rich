<div class="logo" >
        <a href="/Project_Web_2/Projet_02_web_02/index.php"><img src="/Project_Web_2/Projet_02_web_02/Ressources/Image/logo_0020.png" alt="#"></a>
    </div>
    <ul class="nav">
        <li><a class="accueil" href="/Project_Web_2/Projet_02_web_02/Views/accueil.php?mode=<?php echo $mode ?>">Accueil</a></li>
        <li><a class="catalogue" href="/Project_Web_2/Projet_02_web_02/Views/catalogue.php?mode=<?php echo $mode ?>">Catalogue</a>
            <ul class="sous_catalogue">
                <li style="border-top: 3px solid white;"><a class="cravates" href="/Project_Web_2/Projet_02_web_02/Views/catalogueCravate.php?mode=<?php echo $mode ?>">Cravates</a></li>
                <li><a class="chemises" href="/Project_Web_2/Projet_02_web_02/Views/catalogueChemise.php?mode=<?php echo $mode ?>">Chemises</a></li>
            </ul>
        </li>
        <li><a class="infolettre" href="/Project_Web_2/Projet_02_web_02/Views/infolettre.php?mode=<?php echo $mode ?>">Infolettre</a></li>
        <li id="meteo" class="meteo2"></li></li>
        <?php 
            if($etat_connect == true){
                ?>
                <li style="float: right;"><a class="connexion2" href="#"
                    onclick="document.getElementById('detail').style.display='block'"><img src="/Project_Web_2/Projet_02_web_02/Ressources/Image/default.PNG" alt="Profil"></a></li>
                <?php
            }
            else {
                ?>
                <li style="float: right;"><a class="connexion" href="#"
                    onclick="document.getElementById('connexion').style.display='block'">connexion</a></li>
                <?php
            }
        ?>
    </ul>