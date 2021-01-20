<?php
    session_start();
    require_once "config.php";
    if (isset($_POST["typeRequete"])){
        switch ($_POST["typeRequete"]){
            case "lastPosts":
                $requete=$pass->prepare("SELECT id,nom,version,description,image,pseudo FROM generation,utilisateur WHERE auteur=token ORDER BY date_creation DESC LIMIT ".($_POST["iteration"]*20).", 20;");
                break;
            case "fav":
                $requete=$pass->prepare("SELECT id,nom,version,description,image,pseudo FROM generation,utilisateur WHERE auteur=token and approuve=1 ORDER BY date_creation DESC LIMIT ".($_POST["iteration"]*20).", 20;");
                break;
            case "mag":
                $requete = $pass->prepare("SELECT id,nom,version,description,image,pseudo FROM generation,utilisateur WHERE auteur='" . $_SESSION["token"] . "' and auteur=token ORDER BY date_creation DESC LIMIT " . ($_POST["iteration"]*20). ", 20;");
                break;
        }
        $requete->execute();
        $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultat);
    }
