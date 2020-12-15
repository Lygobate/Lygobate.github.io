<?php
require 'config.php';

$newUser=$pass->prepare("INSERT INTO utilisateur VALUES(1, :mail, :user, :password, 0, date('Y/m/d H:i:s'), :pays, 0,0)");
                                                      //token,mail,pseudo,mdp,verifie,date_inscription,pays,nb_strike,role
$connexionTry=$pass->prepare("SELECT mdp FROM utilisateur WHERE pseudo = :pseudo");



  if (isset($_POST["from"])) {
    switch ($_POST["from"]) {
      case 'creer':
        $newUser->execute([":mail"=>$_POST["mail"], ":user"=>$_POST["login"], ":password"=>$_POST["password"], ":pays"=>$_POST["pays"]]);

        break;

      case 'connexion':
        $connexionTry=execute([":pseudo"=>$_POST["login"]]);
        $mdp = $connexionTry->fetch(PDO::FETCH_ASSOC);

        if (empty($mdp)) {
          $connexion = false;
        }
        else {
          if ($mdp["mdp"] == $_POST["mdp"]) {
            $connexion = true;
          }
          else {
            $connexio = false;
          }
        }

        break;
    }
  }

?>
