<?php
    if($page == 6){
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Inscription_controllers.php?mode=<?php echo $mode  ?>&id_produit=<?php echo $id_produit  ?>&page2=<?php echo $page2  ?>" method="post" class="inscription_form">
        <?php
    }
    elseif($page == 5){
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Inscription_controllers.php?mode=<?php echo $mode  ?>&errorId=<?php echo $errorId  ?>" method="post" class="inscription_form">
        <?php
    }
    else{
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/Inscription_controllers.php?mode=<?php echo $mode  ?>" method="post" class="inscription_form">
        <?php
    }
?>


    <span onclick="document.getElementById('inscription').style.display='none'"
        title="fermer" class="fermer">&times;</span>
    <h2>Inscription</h2>
    <div class="formulaire_inscription">
        <input type="text" name="page" value="<?php echo $page ?>" style="display: none;">
        
        <p class="errorInscription"><?php echo $error_inst->getError($errorId) ?></p>

        <label for="nomInscription" ><b>Nom</b></label><br><br>
        <input type="text" name="nomInscription" id="nomInscription"placeholder="Entrer votre nom" required><br><br>

        <label for="prenomInscription" ><b>Prenom</b></label><br><br>
        <input type="text" name="prenomInscription" id="prenomInscription" placeholder="Entrer votre prenom" required><br><br>

        <label for="emailInscription" ><b>Email</b></label><br><br>
        <input type="email" name="emailInscription" id="emailInscription" placeholder="Entrer votre email" required><br><br>

        <label for="identifiantInscription" ><b>Nom d'utilisateur</b></label><br><br>
        <input type="text" name="identifiantInscription" id="identifiantInscription" placeholder="Entrer votre nom d'utilisateur" required><br><br>

        <label for="passwordInscription" ><b>Mot de passe</b></label><br><br>
        <input type="password" name="passwordInscription" id="passwordInscription"placeholder="Entrer votre mot de passe" required><br><br>

        <div class="buttonInscription">
            <button type="submit" class="boutton_inscription">Inscription</button>
            <button type="button" onclick="document.getElementById('inscription').style.display='none', document.getElementById('connexion').style.display='block'" class="annulerInscription">
                Annuler</button>
        </div><br><br>
    </div>
</form>