<?php
require 'config.php';

$checkUserName=$pass->prepare("SELECT pseudo FROM utilisateur WHERE pseudo = :user");
$checkMail=$pass->prepare("SELECT mail FROM utilisateur WHERE mail = :mail");
$newUser=$pass->prepare("INSERT INTO utilisateur VALUES(1, :mail, :user, :password, 0, date('Y/m/d H:i:s'), :pays, 0,0)");
                                                      //token,mail,pseudo,mdp,verifie,date_inscription,pays,nb_strike,role
$connectionTry=$pass->prepare("SELECT mdp FROM utilisateur WHERE pseudo = :pseudo");



  if (isset($_POST["from"])) {
    switch ($_POST["from"]) {
      case 'creer':
        $checkUserName->execute([":user"=>$_POST["login"]]);
        $similarUserName=$checkUserName->fetch(PDO::FETCH_ASSOC);
        $checkMail->execute([":mail"=>$_POST["mail"]]);
        $similarMail=$checkMail->fetch(PDO::FETCH_ASSOC);

        if (empty($similarMail)) {
          $doubleMail= "false";
        }
        else {
          $doubleMail = "true";
        }

        if (empty($similarUserName)) {
          $doubleUserName= "false";
        }
        else {
          $doubleUserName = "true";
        }

        if ($doubleMail == true && $doubleUserName == true) {
          $registed = "mail_and_userName_error";
        }
        else if ($doubleMail == true && $doubleUserName == false) {
          $registed = "mail_error";
        }
        else if ($doubleMail == false && $doubleUserName == true) {
          $registed = "userName_error";
        }
        else {
          $registed = "registed";
          $newUser->execute([":mail"=>$_POST["mail"], ":user"=>$_POST["login"], ":password"=>$_POST["password"], ":pays"=>$_POST["pays"]]);

          //session_start();
          //$_SESSION['token'] = $token;
        }
        echo($registed);
        break;

      case 'connexion':
        $connectionTry=execute([":pseudo"=>$_POST["login"]]);
        $mdp = $connectionTry->fetch(PDO::FETCH_ASSOC);

        if (empty($mdp)) {
          $connection = "false";
        }
        else {
          if ($mdp["mdp"] == $_POST["mdp"]) {
            //session_start();
            //$_SESSION['token'] = $token;
            $connection = "true";
          }
          else {
            $connection = "false";
          }
        }
        echo($connection);
        break;
    }
  }

?>
