<label class="accueil_label"><a href="/Project_Web_2/Projet_02_web_02/Views/accueil.php?mode=<?php echo $mode  ?>">accueil</a></label>

<input type="checkbox" id="catalogue" class="catalogue_input">
<label for="catalogue" class="catalogue_label">Catalogue</label>
<div class="sous_catalogue">
    <label class="catalogues" ><a href="/Project_Web_2/Projet_02_web_02/Views/catalogue.php?mode=<?php echo $mode  ?>">Listes catalogues</a></label>
    <label class="cravates"><a href="/Project_Web_2/Projet_02_web_02/Views/catalogueCravate.php?mode=<?php echo $mode  ?>">Cravates</a></label>
    <label class="chemises"><a href="/Project_Web_2/Projet_02_web_02/Views/catalogueChemise.php?mode=<?php echo $mode  ?>">Chemises</a></label>
</div>
<label class="infolettre_label"><a href="/Project_Web_2/Projet_02_web_02/Views/infolettre.php?mode=<?php echo $mode  ?>">Infolettre</a></label>
<label><a href="#" id="meteo2"  class="meteo2"></a></label>
<?php 
    if($etat_connect == true){
        ?>
        <label><a class="connexion2" href="#" 
            onclick="document.getElementById('detail').style.display='block'"><img src="/Project_Web_2/Projet_02_web_02/Ressources/Image/default.PNG" alt="Profil"></a></label>
        <?php
    }
    else {
        ?>
        <label><a class="connexion" href="#" 
            onclick="document.getElementById('connexion').style.display='block'">connexion</a></label>
        <?php
    }
?>

