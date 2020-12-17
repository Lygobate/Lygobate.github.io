<?php
require 'config.php';
session_start();

echo $_SESSION["token"];

$insertImg=$pass->prepare("INSERT INTO generation (nom,version,description,date_creation,image,auteur)VALUES(:nom,:version,:description,:date_creation,:image,:auteur)");

  if (isset($_POST["image"])) {
    $insertImg->execute([
      ":nom"=>$_POST["title"],
      ":version"=>$_POST["version"],
      ":description"=>$_POST["desc"],
      ":date_creation"=>date('Y-m-d H:i:s'),
      ":image"=>$_POST["image"],
      ":auteur"=>$_SESSION["token"]
    ]);

    echo"Super, ta création à bien été envoyée. Retrouves la dès maintenant dans ta gallerie !"
  } else {
    echo "/!\Une erreur est survenue. Un problème d'envoie de l'image dans la base de donnée a été détectée.";
  }
?>
