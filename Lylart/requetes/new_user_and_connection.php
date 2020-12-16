<?php
require 'config.php';

$checkToken=$pass->prepare("SELECT token FROM utilisateur WHERE token = :token");
$checkUserName=$pass->prepare("SELECT pseudo FROM utilisateur WHERE pseudo = :user");
$checkMail=$pass->prepare("SELECT mail FROM utilisateur WHERE mail = :mail");
$newUser=$pass->prepare("INSERT INTO utilisateur VALUES(:token, :mail, :user, :password, 0, :datecrea, :pays, 0,0)");
                                                      //token,mail,pseudo,mdp,verifie,date_inscription,pays,nb_strike,role
$connectionTry=$pass->prepare("SELECT mdp,token FROM utilisateur WHERE pseudo = :pseudo");


function createToken(){
  $token="";
  $aleat = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $count=strlen($aleat);
  for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $count-1);
    $token .= $aleat[$n];
  }
  return $token;
}
$token= createToken();

if (isset($_POST["from"])) {
  switch ($_POST["from"]) {
    case 'creer':

      $checkUserName->execute([":user"=>$_POST["login"]]);
      $similarUserName=$checkUserName->fetchAll(PDO::FETCH_ASSOC);
      $checkMail->execute([":mail"=>$_POST["mail"]]);
      $similarMail=$checkMail->fetchAll(PDO::FETCH_ASSOC);
      $checkToken->execute([":token"=>$token]);
      $similarToken=$checkToken->fetchAll(PDO::FETCH_ASSOC);

      while (!empty($similarToken)) {
        //echo "non mais oh, copieur de l'improbable";
        $token = createToken();
        $checkToken->execute([":token"=>$token]);
        $similarToken=$checkToken->fetchAll(PDO::FETCH_ASSOC);
      }

      if (empty($similarMail)) {
        $doubleMail= false;
      }
      else {
        $doubleMail = true;

      }

      if (empty($similarUserName)) {
        $doubleUserName= false;
      }
      else {
        $doubleUserName = true;
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
        $newUser->execute([":token"=>$token, ":mail"=>$_POST["mail"], ":user"=>$_POST["login"], ":password"=>password_hash($_POST["password"], PASSWORD_BCRYPT), ":datecrea"=>date('Y-m-d H:i:s'), ":pays"=>$_POST["pays"]]);

        session_start();
        $_SESSION['token'] = $token;
      }
      echo($registed);
      break;

    case 'connection':
      $connectionTry->execute([":pseudo"=>$_POST["login"]]);
      $mdp = $connectionTry->fetchAll(PDO::FETCH_ASSOC);
      print_r($mdp);
      if (empty($mdp)) {
        $connection = "false";
      }
      else {
        if (password_verify($_POST["password"], $mdp[0]["mdp"])){
          session_start();
          $_SESSION['token'] = $mdp[0]["token"];
          setcookie("token_ma_gueule_!", $mdp[0]["token"]);
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
