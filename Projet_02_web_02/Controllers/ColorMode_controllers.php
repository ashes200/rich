<?php
include_once  __DIR__."/../Models/Redirection_model.php";

if (isset($_GET['mode']) and isset($_GET['page'])) {
    $mode = $_GET['mode'];
    $page = $_GET['page'];
    $etatLog = 3;
    $errorId = 0;

    print("page " .$page."<br>");
    print("etatlog " .$etatLog."<br>");
    print("errorId " .$errorId."<br>");
    print("mode " .$mode."<br>");
    if ($page == 6) {
        $id_produit = $_GET['id_produit'];
        $page2 = $_GET['page2'];
        print("errorId " .$id_produit."<br>");
        print("mode " .$page2."<br>");
        Redirection::redirectSurProduit($page, 3, 0, $mode, $id_produit, $page2);
    }
    elseif ($page == 5) {
        $errorIdinfo = $_GET['errorId'];
        Redirection::redirectSurInfolettre($page, 3, 8, $mode, $errorIdinfo);
    }
    else{
        Redirection::redirect($page, 3, 0, $mode);
    }

}
