<?php
    require_once "header.php";
?>

<div id="generator">
    <!-- Canvas -->
    <div id="canvas"></div>
    
    <!-- Boutons -->
    <ul class="buttonList">
        <li><input class="button is-danger mr-4" id="stopGeneration" name="stopGeneration" value="Stop Generation"
                   type="button"></li>
        <li><input class="button is-primary mr-4" id="showGeometry" name="showGeometry" value="Start Generation"
                   type="button"></li>
        <li><input class="button is-link" id="newCurve" name="newCurve" value="New Curve" type="button"></li>
        <li><input class="button is-info mr-4" id="saveCanvas" name="saveCanvas" value="Download" type="button"></li>
    </ul>

    <!-- Couleurs -->
    <label class="mr-6 mb-6" for="curveColor" class="label">Shape color :
        <input class="input" id="curveColor" name="curveColor" data-jscolor="{value:'#FFFFFF'}">
    </label>
    <label id="bgColorLabel" class="mb-6" for="bgColor" class="label">Background :
        <input class="input" id="bgColor" name="bgColor" data-jscolor="{value:'#000000'}">
    </label>
    <!-- <label for="timeGeneration">Generation duration :
    <input class="input" type="number" name="timeGeneration" id="timeGeneration" min="1" max="300" step="1">
    </label> -->

    <!-- Sliders -->
    <label for="nbPoints" class="label flex1 to-right mr-3">Number of points :
        <input name="nbPoints" id="nbPoints" max="30" min="4" step="1" type="range" value="4">
        <span id="valeur_nbPoints">4</span>
    </label>
    <label for="rotate" class="label flex1 ml-3">Rotation :
        <input id="rotate" name="rotate" type="checkbox">
        <span class="speed">
            <input id="rotateSpeed" max="15" min="0" step="1" type="range" value="5">
            <span id="valeur_rotateSpeed">5</span>
            <span> || </span>
            <span id="rotateSpeedComment">normal</span>
        </span>
    </label>
    
    <!-- Checkbox -->
    <label for="closeShape" class="label">Close shape :
        <input checked class="mr-6" id="closeShape" name="closeShape" type="checkbox">
    </label>
    <label for="staticCenter" class="label">Static center :
        <input checked class="mr-6" id="staticCenter" name="staticCenter" type="checkbox">
    </label>
    <label for="angularNoise" class="label">Angular Noise :
        <input checked class="mr-6" id="angularNoise" name="angularNoise" type="checkbox">
    </label>
    <label for="radiusNoise" class="label">Radius Noise :
        <input checked id="radiusNoise" name="radiusNoise" type="checkbox">
    </label>
    
    <img id="infos" src="https://portfolio.lex-agone.fr/images/infos.svg" alt="Infos">
    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <div class="modal-card-head">
                <p class="modal-card-title">À propos de LIRAG v<span class="liragVersion"></span></p>
                <button class="delete" aria-label="close"></button>
            </div>
            <section class="modal-card-body">
                <iframe src="https://docs.google.com/document/d/e/2PACX-1vR5hqf-0XhNOn-lykVSad9tdJfjpvcjfGz9VRBYfL_RYPaYtZoHPJfYzmT5hAiqGjdZ6tWcxwTKJxS5/pub?embedded=true"></iframe>
            </section>
            <div class="modal-card-foot">
                <button class="button">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "../footer.php"
?>
