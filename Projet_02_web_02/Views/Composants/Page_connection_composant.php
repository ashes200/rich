<?php
    if($page == 6){
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Connexion_controllers.php?mode=<?php echo $mode  ?>&id_produit=<?php echo $id_produit  ?>&page2=<?php echo $page2  ?>" method="post" class="connexion_form">
        <?php
    }
    elseif($page == 5){
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Connexion_controllers.php?mode=<?php echo $mode  ?>&errorId=<?php echo $errorId  ?>" method="post" class="connexion_form">
        <?php
    }
    else{
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Connexion_controllers.php?mode=<?php echo $mode  ?>" method="post" class="connexion_form">
        <?php
    }
?>

    
    <span onclick="document.getElementById('connexion').style.display='none'"
            title="fermer" class="fermer">&times;</span>
    <div class="avatar">
        <img src="/Project_Web_2/Projet_02_web_02/Ressources/Image/default.PNG" alt="avatar" title="avatar" style="width:200px;" class="image_avatar">
    </div>

    <div class="formulaire_connexion">
        <input type="text" name="page" value="<?php echo $page ?>" style="display: none;">

        <p class="errorConnection"> <?php echo $error_inst->getError($errorId) ?> </p>

        
        <label for="identifiantConnexion" ><b>Nom d'utilisateur</b></label><br><br>
        <input type="text" name="identifiantConnexion" id="identifiantConnexion"placeholder="Entrer votre nom d'utilisateur" required><br><br>

        <label for="passwordConnexion" ><b>Mot de passe</b></label><br><br>
        <input type="password" name="passwordConnexion" id="passwordConnexion" placeholder="Entrer votre mot de passe" required><br><br>

        <div class="buttonConnection">
            <button type="submit" class="boutton_connexion">Connexion</button>
            <button type="button" onclick="document.getElementById('connexion').style.display='none'" class="annulerConnection">
                Annuler</button>
        </div>

        <hr><br><br>

        <span class="forget"><a href="#">J'ai oublier mon mot de passe.</a></span>
        <span class="new"><a href="#"
        onclick="document.getElementById('inscription').style.display='block'; document.getElementById('connexion').style.display='none'"
        >Je n'ai pas encore de compte.</a></span>
    </div>
</form>