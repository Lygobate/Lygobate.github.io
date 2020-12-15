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
    <title>Lylart Gallery</title>
    <!-- Importer CSS et scripts -->
    <?php
        if (empty($style)){
            echo '<link rel="stylesheet" href="css/style.css">';
            if (isset($jquery)){
                echo '<script src="https://cdn.lex-agone.fr/jquery.js" type="text/javascript"></script>
                      <script src="https://cdn.lex-agone.fr/jquery.cookie.js" type="text/javascript"></script>';
            }
        } else {
            echo '<link rel="stylesheet" href="../css/style.css">
                  <script src="https://cdn.lex-agone.fr/jquery.js" type="text/javascript"></script>
                  <script src="https://cdn.lex-agone.fr/jquery.cookie.js" type="text/javascript"></script>';
            if (isset($gen)){
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
        <a href="">
            <div>
            </div>
        </a>
        <a href="">
            <div>LYLART</div> <!-- à remplacer avec le logo ? -->
            <div>THINK, CREATE, <span>SHARE</span>.</div>
        </a>
        <a href="">
            <div>
            </div>
        </a>
    </header>