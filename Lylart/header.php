<?php
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
    <link rel="icon" type="image/x-icon" href="">
    <!-- Titre de l'onglet -->
    <title><?php if (!empty($style) && $style=="gen"){echo "Lylart Generator";}else{echo "Lylart Gallery";};?></title>
    <!-- Importer CSS et scripts -->
    <?php
        if (empty($style)||$style!="gen"){
            echo '<link rel="stylesheet" href="css/style.css">';
            $index="";
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
                      <script src="js/functions.js" type="text/javascript"></script>
                      <script src="js/sketch.js" type="text/javascript"></script>';
            }
        }
    ?>
</head>
<body>
    <header>
        <a class="generatorButton" href="">
            <div>
            </div>
        </a>
        <a class="logo" href="<?=$index?>">
            <div>LYLART</div> <!-- à remplacer avec le logo ? -->
            <div>THINK, CREATE, <span>SHARE</span>.</div>
        </a>
        <input type="text" placeholder="Rechercher">
        <a href="">
            <div>
            </div>
        </a>
    </header>
