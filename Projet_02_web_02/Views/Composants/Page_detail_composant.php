<?php
    if($page == 6){
        ?>
            <form method="post" action="/Project_Web_2/Projet_02_web_02/Controllers/User_controllers.php?mode=<?php echo $mode  ?>&id_produit=<?php echo $id_produit  ?>&page2=<?php echo $page2  ?>" class="detail_form">
        <?php
    }
    elseif($page == 5){
        ?>
            <form action="/Project_Web_2/Projet_02_web_02/Controllers/User_controllers.php?mode=<?php echo $mode  ?>&errorId=<?php echo $errorId  ?>" method="post" class="detail_form">
        <?php
    }
    else{
        ?>
            <form method="post" action="/Project_Web_2/Projet_02_web_02/Controllers/User_controllers.php?mode=<?php echo $mode  ?>" class="detail_form">
        <?php
    }
?>

    <span onclick="document.getElementById('detail').style.display='none'"
            title="fermer" class="fermer">&times;</span>
    <div class="avatar">
        <img src="/Project_Web_2/Projet_02_web_02/Ressources/Image/default.PNG" alt="avatar" title="avatar" style="width:200px;" class="image_avatar">
    </div>

    <div class="formulaire_detail">
        
        <input type="text" name="page" value="<?php echo $page ?>" style="display: none;">
        
        <p class="errorDetail"><?php echo $error_inst->getError($errorId) ?></p>
        <?php
            $user_inst->GetUtilisateurinfo($_SESSION['user_id'])
        ?>

        <label for="nomDetail" ><b>Nom</b></label><br><br>
        <input type="text" name="nomDetail" id="nomDetail"placeholder="Entrer votre nom" required value="<?php echo $user_inst->getNom() ?>"> <br><br>

        <label for="prenomDetail" ><b>Prenom</b></label><br><br>
        <input type="text" name="prenomDetail" id="prenomDetail"placeholder="Entrer votre prenom" required value="<?php echo  $user_inst->getPrenom() ?>"><br><br>

        <label for="emailDetail" ><b>Email</b></label><br><br>
        <input type="email" name="emailDetail" id="emailDetail"placeholder="Entrer votre email" required value="<?php echo  $user_inst->getEmail() ?>"><br><br>

        <label for="identifiantDetail" ><b>Nom d'utilisateur</b></label><br><br>
        <input type="text" name="identifiantDetail" id="identifiantDetail"placeholder="Entrer votre nom d'utilisateur" required value="<?php echo  $user_inst->getUsername() ?>"><br><br>

        <label for="passwordDetail" ><b>Mot de passe</b></label><br><br>
        <input type="password" name="passwordDetail" id="passwordDetail"placeholder="Entrer votre mot de passe"><br><br>

        <div class="infolettreDiv">
            <?php
                if($user_inst->getInfolettre_admin()){
                    ?>
                        <input type="checkbox" name="infolettre" id="infolettre" checked value="yes">
                    <?php
                }
                else{
                    ?>
                        <input type="checkbox" name="infolettre" id="infolettre" value="yes">
                    <?php
                }
            ?>
            
            <label for="infolettre">s'inscrire a l'infolettre</label>
        </div><br><br>

        <div class="displayDiv">
            <?php

            ?>
            <?php
                if($page == 6){
                    echo '<script>';
                    echo 'var page = ' . json_encode($page) . ';';
                    echo 'var page2 = ' . json_encode($page2) . ';';
                    echo 'var id_produit = ' . json_encode($id_produit) . ';';
                    echo '</script>';
                    ?>
                        <input type="radio" id="whiteMode" name="display" value="white">
                        <label for="whiteMode" class="whiteMode_label" onclick="changeModeProduit(page, 1, id_produit, page2)">White Mode</label>

                        <input type="radio" id="blackMode" name="display" value="black">
                        <label for="blackMode" class="blackMode_label" onclick="changeModeProduit(page, 2, id_produit, page2)">Black Mode</label>
                    <?php
                }
                elseif($page == 5){
                    echo '<script>';
                    echo 'var page = ' . json_encode($page) . ';';
                    echo 'var errorIdInfolettre = ' . json_encode($errorIdInfolettre) . ';';
                    echo '</script>';
                    ?>
                        <input type="radio" id="whiteMode" name="display" value="white">
                        <label for="whiteMode" class="whiteMode_label" onclick="changeModeInfolettre(page, 1, errorIdInfolettre)">White Mode</label>

                        <input type="radio" id="blackMode" name="display" value="black">
                        <label for="blackMode" class="blackMode_label" onclick="changeModeInfolettre(page, 2, errorIdInfolettre)">Black Mode</label>
                    <?php
                }
                else{
                    echo '<script>';
                    echo 'var page = ' . json_encode($page) . ';';
                    echo '</script>';
                    ?>
                        <input type="radio" id="whiteMode" name="display" value="white">
                        <label for="whiteMode" class="whiteMode_label" onclick="changeMode(page, 1)">White Mode</label>

                        <input type="radio" id="blackMode" name="display" value="black">
                        <label for="blackMode" class="blackMode_label" onclick="changeMode(page, 2)">Black Mode</label>
                    <?php
                }
            ?>

        </div><br><br>

        <div class="buttonDetail">
            <input type="submit" name="action" class="boutton_detail" value="Mettre a jour">
            <input type="submit" name="action" class="deConnection" value="Deconnecte">

        </div>
        <br><br>
    </div>
</form>
<script>
    //script de changement de mode d'affichage
    function changeMode(page, mode) {
        window.location.replace("/Project_Web_2/Projet_02_web_02/Controllers/colorMode_controllers.php?mode=" +mode+ "&page="+page);
    }
    function changeModeProduit(page, mode, id_produit, page2) {
        window.location.replace("/Project_Web_2/Projet_02_web_02/Controllers/colorMode_controllers.php?mode=" +mode+ "&page="+page+"&id_produit=" +id_produit+ "&page2="+page2);
    }
    function changeModeInfolettre(page, mode, errorId) {
        window.location.replace("/Project_Web_2/Projet_02_web_02/Controllers/colorMode_controllers.php?mode=" +mode+ "&page="+page+"&errorId=" +errorId);
    }
</script>