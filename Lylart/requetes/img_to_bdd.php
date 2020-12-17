<?php
require 'config.php';
session_start();

echo $_SESSION["token"];

$insertImg=$pass->prepare("INSERT INTO generation (nom,version,description,date_creation,image,auteur)VALUES(:nom,:version,:description,:date_creation,:image,:auteur)");
$getGenerationId=$pass->prepare("SELECT id from generation where");

  if (isset($_POST["image"])) {
    echo "Coucou";
    $insertImg->execute([":nom"=>$_POST["title"], ":version"=>$_POST["version"],":description"=>$_POST["desc"],]);
  } else {
    echo "/!\Une erreur est survenue. Un problème d'envoie de l'image dans la base de donnée a été détectée.";
  }
?>
