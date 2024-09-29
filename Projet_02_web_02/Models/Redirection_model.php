<?php
    Class Redirection{
        public static function redirect($page,$etatLog, $errorId, $mode) {
            
            if ($page == 0) {
                print("<br> 0");
                header("Location: /Project_Web_2/Projet_02_web_02/Views/accueil.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
            elseif ($page == 1) {
                print("<br> 1");
                header("Location: /Project_Web_2/Projet_02_web_02/Views/catalogue.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
            elseif ($page == 2) {
                print("<br> 2");
                header("Location: /Project_Web_2/Projet_02_web_02/Views/catalogueChemise.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
            elseif ($page == 3) {
                print("<br> 3");
                header("Location: /Project_Web_2/Projet_02_web_02/Views/catalogueCravate.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
            elseif ($page == 4) {
                print("<br> 4");
                header("Location: /Project_Web_2/Projet_02_web_02/Views/Infolettre.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
            elseif ($page == 6) {
                print("<br> 5");
                header("Location: /Project_Web_2/Projet_02_web_02/Views/produit.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
            else {
                print("<br> -1");
                header("Location: /Project_Web_2/Projet_02_web_02/index.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode);
            }
        }
        public static function redirectSurProduit($page,$etatLog, $errorId, $mode, $id_produit, $page2) {
            header("Location: /Project_Web_2/Projet_02_web_02/Views/produit.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode."&id_produit=".$id_produit."&page=".$page2);
        }
        public static function redirectSurInfolettre($page,$etatLog, $errorId, $mode, $errorIdInfolettre) {
            header("Location: /Project_Web_2/Projet_02_web_02/Views/infolettre_confirmation.php?errorId=".$errorId."&etatLog=".$etatLog."&mode=".$mode."&errorIdInfolettre=".$errorIdInfolettre);
        }
    }