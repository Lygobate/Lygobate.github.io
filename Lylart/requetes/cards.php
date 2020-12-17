<?php
    require_once "config.php";
    if (isset($_POST["iteration"])){
        $requete=$pass->prepare("SELECT id,nom,version,description,image,pseudo FROM generation,utilisateur WHERE auteur=token ORDER BY date_creation DESC LIMIT ".$_POST["iteration"].", 20;");
        $requete->execute();
        $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
        if (empty($_SESSION)){
            session_start(['cookie_lifetime' => 86400]);
            $_SESSION["number_refresh"]=0;
        }
        $_SESSION["cards"][$_SESSION["number_refresh"]]=$requete;
        $_SESSION["number_refresh"]+=1;
        print_r('$_SESSION');
    }
