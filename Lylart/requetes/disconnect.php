
<?php

  if (isset($_POST["disconnect"])) {
    session_start();
    session_destroy();
    setcookie('statut', "", time()-3600, '/');
    setcookie('PHPSESSID', "", time()-3600, '/');
    echo "success, statut :".$_COOKIE['statut'];
  }
  else {
    echo "error";
  }

?>
