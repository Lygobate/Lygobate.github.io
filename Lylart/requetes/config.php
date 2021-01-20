<?php
    
    $hote='localhost';
    $port='3306';
    $nom_bd='lylart_gallery';
    $identifiant='root';
    $mot_de_passe='';
    $encodage='utf8';
    $debug=true;


// option pour la gestion de l'encodage
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$encodage);

// Gestion des erreurs avec try catch
try
{
    $pass = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bd,$identifiant, $mot_de_passe,$options);
    if($debug)
    {
        $pass->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
} catch (PDOException $erreur)
{
    echo "Serveur actuellement innaccessible, veuillez nous excuser.";
    exit();
}
 ?>
