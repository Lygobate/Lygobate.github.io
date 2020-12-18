<?php
    require_once "config.php";
    if (isset($_POST["typeRequete"])){
        switch ($_POST["typeRequete"]){
            case "lastPosts":
                $requete=$pass->prepare("SELECT id,nom,version,description,image,pseudo FROM generation,utilisateur WHERE auteur=token ORDER BY date_creation DESC LIMIT ".$_POST["iteration"].", 20;");
                break;
            case "fav":
                $requete=$pass->prepare("SELECT id,nom,version,description,image,pseudo FROM generation,utilisateur WHERE auteur=token ORDER BY date_creation DESC LIMIT ".$_POST["iteration"].", 20;");
                break;
        }
        $requete->execute();
        $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
        for ($i=0; $i<count($resultat); $i++){
//            $resultat[$i]["image"]=stripslashes($resultat[$i]["image"]);
        }
        echo json_encode($resultat);
    }
