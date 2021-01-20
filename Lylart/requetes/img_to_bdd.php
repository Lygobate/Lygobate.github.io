<?php
require 'config.php';
session_start(['cookie_lifetime' => 86400]);


echo $_SESSION["token"];

$insertImg=$pass->prepare("INSERT INTO generation (nom,version,description,date_creation,image,auteur)VALUES(:nom,:version,:description,:date_creation,:image,:auteur)");

  if (isset($_POST["image"])) {
    $fileImg_parts = explode(";base64,", $_POST["image"]);
    $image_type_aux = explode("image/", $fileImg_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($fileImg_parts[1]);
    $img_file = "images/gens/".$_SESSION["token"]."_".uniqid().".".$image_type;
    file_put_contents("../".$img_file, $image_base64);
    $insertImg->execute([
      ":nom"=>$_POST["title"],
      ":version"=>$_POST["version"],
      ":description"=>$_POST["desc"],
      ":date_creation"=>date('Y-m-d H:i:s'),
      ":image"=>$img_file,
      ":auteur"=>$_SESSION["token"]
    ]);

    echo"Super, ta création à bien été envoyée. Retrouves la dès maintenant dans ta galerie !";
  } else {
    echo "/!\Une erreur est survenue. Un problème d'envoie de l'image dans la base de donnée a été détectée.";
  }
?>
