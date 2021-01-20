<?php
    session_start();
    require_once "config.php";
    $requete=$pass->prepare("UPDATE utilisateur SET `".$_POST["requete"]."`=:valeur WHERE token=:token");
    $requete->execute([':valeur'=>$_POST["valeur"], ':token'=>$_SESSION["token"]]);
    $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);