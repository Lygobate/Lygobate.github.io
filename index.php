<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Random generative processing art">
    <meta name="author" content="Axel AVININ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            padding: 0;
            margin: 0;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js"></script>
    <script src="js/sketch.js"></script>

</head>

<body>
    <main>
        Nombre de points : <input type="range" id="nbPoints" min="4" max="30" step="1" value="30"><span id="valeur_nbPoints">30</span><br>
        Rotation :<input id="rotate" type="checkbox" name="rotate" checked>
        Vitesse : <input type="range" id="rotateSpeed" min="0" max="15" step="0.5" value="5"><span id="valeur_rotateSpeed">5</span><br>
        CrossedLine :<input id="crossLine" type="checkbox" name="CrossedLine" checked><br>
        Centre statique :<input id="staticCenter" type="checkbox" name="staticCenter" checked><br>
        Forme fermée :<input id="closeShape" type="checkbox" name="closeShape" checked><br>
        Montrer géométrie :<input id="showGeometry" type="checkbox" name="showGeometry" checked><br>
    </main>
</body>

</html>
