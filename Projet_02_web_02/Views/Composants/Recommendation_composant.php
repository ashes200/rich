<div class="recommendation">
    <h3>A voir aussi</h3>
    <div>
        <?php
            $nb1 = rand(1,10);
            $produit->chargerProduitParId($nb1);
            $chaineLongue = $produit->afficherDescription() ;
            $chaineCourte = substr($chaineLongue, 0, 10);
        ?>
        <?php
            if ($page == 6){
                ?>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=<?php echo $nb1 ?>&page=<?php echo $page2 ?>" style=" background-image: url('<?php echo $produit->afficherImage() ?>');">
                <?php
            }
            else{
                ?>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=<?php echo $nb1 ?>&page=<?php echo $page ?>" style=" background-image: url('<?php echo $produit->afficherImage() ?>');">
                <?php
            }
        ?>

            <p class="prix"> <?php echo "" .$produit->afficherPrix(). "$";?> </p>
            <h3 class="titre"> <?php echo "" .$produit->afficherNom(); ?> </h3>
            <p class="description"> <?php echo "" .$chaineCourte; ?> </p>
        </a>
        <?php
            $nb2 = $nb1;
            while ($nb2 == $nb1) {
                $nb2 = rand(1,10);
            }
            $produit->chargerProduitParId($nb2);
            $chaineLongue = $produit->afficherDescription() ;
            $chaineCourte = substr($chaineLongue, 0, 10);
        ?>
        <?php
            if ($page == 6){
                ?>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=<?php echo $nb2 ?>&page=<?php echo $page2 ?>" style=" background-image: url('<?php echo $produit->afficherImage() ?>');">
                <?php
            }
            else{
                ?>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=<?php echo $nb2 ?>&page=<?php echo $page ?>" style=" background-image: url('<?php echo $produit->afficherImage() ?>');">
                <?php
            }
        ?>
            <p class="prix"> <?php echo "" .$produit->afficherPrix(). "$"; ?> </p>
            <h3 class="titre"> <?php echo "" .$produit->afficherNom(); ?> </h3>
            <p class="description"> <?php echo "" .$chaineCourte; ?> </p>
        </a>
        <?php
            $nb3 = $nb2;
            while ($nb3 == $nb2 or $nb3 == $nb1) {
                $nb3 = rand(1,10);
            }
            $produit->chargerProduitParId($nb3);
            $chaineLongue = $produit->afficherDescription() ;
            $chaineCourte = substr($chaineLongue, 0, 10);
        ?>
        <?php
            if ($page == 6){
                ?>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=<?php echo $nb3 ?>&page=<?php echo $page2 ?>" style=" background-image: url('<?php echo $produit->afficherImage() ?>');">
                <?php
            }
            else{
                ?>
                    <a href="/Project_Web_2/Projet_02_web_02/Views/produit.php?id_produit=<?php echo $nb3 ?>&page=<?php echo $page ?>" style=" background-image: url('<?php echo $produit->afficherImage() ?>');">
                <?php
            }
        ?>
            <p class="prix"> <?php echo "" .$produit->afficherPrix(). "$"; ?> </p>
            <h3 class="titre"> <?php echo "" .$produit->afficherNom(); ?> </h3>
            <p class="description"> <?php echo "" .$chaineCourte; ?> </p>
        </a>
    </div>
</div>