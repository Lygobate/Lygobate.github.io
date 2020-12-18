<?php
  session_start(['cookie_lifetime' => 86400]);

  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      $url = "https://";
  } else {
      $url = "http://";
  }
  $url .= $_SERVER['HTTP_HOST'];
  $url .= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage des caractères -->
    <meta charset="UTF-8">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Nom des auteurs -->
    <meta name="author" content="Enzo Vetromile, Axel Avinin">
    <!-- Description pour le référencement -->
    <meta name="description" content="Lylart est un site de génération et de partage de ces derniers.">
    <!-- Icone de l'onglet -->
    <link rel="icon" type="image/x-icon" href="<?php if(isset($style)&&$style=="gen"){echo "../images/fav.png";}else{echo "images/fav.png";}?>">
    <!-- Titre de l'onglet -->
    <title><?php if (!empty($style) && $style=="gen"){echo "Lylart Generator";}else{echo "Lylart Gallery";};?></title>
    <meta property="og:title" content="Lylart Project">
    <meta property="og:image" content="<?php if(isset($style)&&$style=="gen"){echo "../images/logo.png";}else{echo "images/logo.png";}?>">
    <meta property="og:description" content="Lylart project by Axel & Enzo">
    <!-- Importer CSS et scripts -->
    <?php
        if (empty($style)||(isset($style)&&$style!="gen")){
            echo '<link rel="stylesheet" href="css/style.css">
                  <script src="https://cdn.lex-agone.fr/fontawesome.js" type="text/javascript"></script>';
            $index="./";
            if (isset($jquery)){
                echo '<script src="https://cdn.lex-agone.fr/jquery.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/jquery.cookie.js" type="text/javascript"></script>
                      <script src="js/js_site.js" type="text/javascript"></script>
                      <script src="js/ajax.js" type="text/javascript"></script>';
            }
        } else {
            echo '<link rel="stylesheet" href="../css/style.css">
                  <script src="https://cdn.lex-agone.fr/fontawesome.js" type="text/javascript"></script>
                  <script src="https://cdn.lex-agone.fr/jquery.js" type="text/javascript"></script>
                  <script src="https://cdn.lex-agone.fr/jquery.cookie.js" type="text/javascript"></script>';
            $index="../";
            if ($style=="gen"){
                echo '<script src="https://cdn.lex-agone.fr/p5.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/color-picker.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/lz-string.js" type="text/javascript"></script>
                      <script src="js/version.js" type="text/javascript"></script>
                      <script src="../js/js_site.js" type="text/javascript"></script>
                      <script src="js/functions.js" type="text/javascript"></script>
                      <script src="js/sketch.js" type="text/javascript"></script>';
            }
        }
    ?>

</head>
<body>
    <div id="loader"><img src="<?php if(isset($style)&&$style=="gen"){echo "../images/loader.gif";}else{echo "images/loader.gif";}?>" alt="loader">Loading...</div>
    <header>
        <?php
          if(isset($style)&&$style!="gen"){
              echo '<a class="generatorButton" href="./gen" title="Generator">
                  <div>
                      <img src="images/gen.png" alt="Generator">
                  </div>
              </a>';
          }
          else if(isset($style)&&$style!="connection"){
            echo '<a class="generatorButton" href="/index.php" title="Generator"><div>Home</div></a>';
          }
          else{
              echo '<a class="generatorButton" href="../"><div>Home</div></a>';
          }
        ?>
        <a class="logo" href="<?=$index?>">
            <img src="<?php if(isset($style)&&$style=="gen"){echo "../images/logo.png";}else{echo "images/logo.png";}?>" alt="Logo">
        </a>
        <input type="text" placeholder="Search">
        <?php
            if(isset($style)&&$style!="gen"){
                if(isset($_COOKIE["statut"])){
                    echo '<a href="user.php">
                    <div id="is-connected" title="My account">
                        <i class="fas fa-user-circle"></i>
                        <div>Disconnect</div>
                    </div>
                </a>';
                }else{
                    echo '<a href="new_user_and_connection_form.php">Log in</a>';
                }
            }else{
                if(isset($_COOKIE["statut"])){
                    echo '<a href="../user.php">
                    <div id="is-connected" title="My account">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </a>';
                }else{
                    echo '<a href="../new_user_and_connection_form.php">Log in</a>';
                }
            }
        ?>
    </header>
