<?php

class Erreur {
    private static $instance;

    private function __construct() {
    }

    final public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Erreur();
        }
        return self::$instance;
    }

    public function getError($code) {
        switch ($code) {
            // erreur pour la connexion d'utilisateur
            case 1:
                ?>
                    <script>
                        document.getElementsByClassName('errorConnection').style.display= 'block';
                    </script>
                <?php
                $texte = "Nom d'utilisateur et/ou mot de passe incorrect";
                return $texte;
            case 2:
                ?>
                    <script>
                        document.getElementsByClassName('errorConnection').style.display= 'block';
                    </script>
                <?php
                $texte = "Connexion reussi";
                return $texte;
            case 3:
                ?>
                    <script>
                        document.getElementsByClassName('errorConnection').style.display= 'block';
                    </script>
                <?php
                $texte = "Erreur de server";
                return $texte;
            // erreur pour l'inscription d'utilisateur
            case 4:
                ?>
                    <script>
                        document.getElementsByClassName('errorInscription').style.display= 'block';
                    </script>
                <?php
                $texte = "Email et/ou nom d'utilisateur deja utilisee";
                return $texte;
            case 5:
                ?>
                    <script>
                        document.getElementsByClassName('errorInscription').style.display= 'block';
                    </script>
                <?php
                $texte = "Inscription reussi";
                return $texte;
            case 6:
                ?>
                    <script>
                        document.getElementsByClassName('errorInscription').style.display= 'block';
                    </script>
                <?php
                $texte = "Erreur de server";
                return $texte;
            // erreur pour l'update d'utilisateur
            case 7:
                ?>
                    <script>
                        document.getElementsByClassName('errorDetail').style.display= 'block';
                    </script>
                <?php
                $texte = "Mise a jour non effectuee";
                return $texte;
            case 8:
                ?>
                    <script>
                        document.getElementsByClassName('errorDetail').style.display= 'block';
                    </script>
                <?php
                $texte = "mise a jour reussie";
                return $texte;
            case 9:
                ?>
                    <script>
                        document.getElementsByClassName('errorDetail').style.display= 'block';
                    </script>
                <?php
                $texte = "Probleme avec le server";
                return $texte;
            // erreur pour le logout d'utilisateur
            case 10:
                $texte = "Probleme avec le server";
                return $texte;
            // erreur pour inscription a l'infolettre
            case 11:
                $texte = "vous etes deja inscris a l'infolettre";
                return $texte;
            case 12:
                $texte = "l'inscription a l'infolettre reussie";
                return $texte;
            case 13:
                $texte = "Probleme avec le server";
                return $texte;
            // erreur pour la desinscription a l'infolettre
            case 14:
                $texte = "l'utilisateur n'existe pas";
                return $texte;
            case 15:
                $texte = "la desinscription a l'infolettre reussie";
                return $texte;
            case 16:
                $texte = "Probleme avec le server";
                return $texte;
        default:
                ?>
                    <script>
                        document.getElementsByClassName('errorConnection').style.display= 'none';
                        document.getElementsByClassName('errorInscription').style.display= 'block';
                        document.getElementsByClassName('errorDetail').style.display= 'block';
                    </script>
                <?php
        }
    }
}