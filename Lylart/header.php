<?php
  session_start();
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
    <!-- Importer CSS et scripts -->
    <?php
        if (empty($style)||$style!="gen"){
            echo '<link rel="stylesheet" href="css/style.css">';
            $index="./";
            if (isset($jquery)){
                echo '<script src="https://cdn.lex-agone.fr/jquery.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/jquery.cookie.js" type="text/javascript"></script>
                      <script src="js/ajax.js" type="text/javascript"></script>';
            }
        } else {
            echo '<link rel="stylesheet" href="../css/style.css">
                  <script src="https://cdn.lex-agone.fr/jquery.js" type="text/javascript"></script>
                  <script src="https://cdn.lex-agone.fr/jquery.cookie.js" type="text/javascript"></script>';
            $index="../";
            if ($style=="gen"){
                echo '<script src="https://cdn.lex-agone.fr/p5.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/color-picker.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/lz-string.js" type="text/javascript"></script>
                      <script src="js/version.js" type="text/javascript"></script>
                      <script src="js/functions.js" type="text/javascript"></script>
                      <script src="js/sketch.js" type="text/javascript"></script>';
            }
        }
    ?>
</head>
<body>
    <header>
        <?php if(isset($style)&&$style!="gen"){
            echo '<a class="generatorButton" href="./gen">
                <div>
                    <img src="images/gen.png" alt="Generator">
                </div>
            </a>';
        }else{
            echo '<a class="generatorButton" href="../">
                <div>Accueil</div>
            </a>';
        }
        ?>
        <a class="logo" href="<?=$index?>">
            <img src="<?php if(isset($style)&&$style=="gen"){echo "../images/logo.png";}else{echo "images/logo.png";}?>" alt="">
        </a>
        <input type="text" placeholder="Rechercher">
        <?php
            if(isset($style)&&$style!="gen"){
                if(isset($_COOKIE["statut"])){
                    echo '<a href="user.php">
                    <div id="is-connected">
                    </div>
                </a>';
                }else{
                    echo '<a href="new_user_and_connection_form.php">Se connecter</a>';
                }
            }else{
                if(isset($_COOKIE["statut"])){
                    echo '<a href="../user.php">
                    <div id="is-connected">
                    </div>
                </a>';
                }else{
                    echo '<a href="../new_user_and_connection_form.php">Se connecter</a>';
                }
            }
        ?>
    </header>
