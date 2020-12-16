<?php
    $style="gen";
    require_once "../header.php";
?>

<div id="generator">
    <!-- Canvas -->
    <div id="canvas"></div>
    <div id="interface">
        <!-- Couleurs -->
        <div class="couleurs">
            <label for="curveColor">Shape color
                <input class="input" id="curveColor" name="curveColor" data-jscolor="{value:'#FFFFFF'}" readonly>
            </label>
            <label id="bgColorLabel" for="bgColor">Background
                <input class="input" id="bgColor" name="bgColor" data-jscolor="{value:'#000000'}" readonly>
            </label>
        </div>

        <!-- <label for="timeGeneration">Generation duration :
        <input class="input" type="number" name="timeGeneration" id="timeGeneration" min="1" max="300" step="1">
        </label> -->

        <!-- Sliders -->
        <div class="sliders">
            <label for="nbPoints" class="label flex1 to-right mr-3">
                Number of points : <span id="valeur_nbPoints">4</span>
                <input name="nbPoints" id="nbPoints" max="30" min="4" step="1" type="range" value="4">
            </label>
            <label for="rotate" class="label flex1 ml-3">
                Rotation :
                <input id="rotate" name="rotate" type="checkbox">
                <span class="speed">
                    <span id="valeur_rotateSpeed">5</span>
                    <span> || </span>
                </span>
                <span id="rotateSpeedComment">normal</span>
                <input id="rotateSpeed" max="15" min="0" step="1" type="range" value="5">
            </label>
        </div>

        <!-- Checkbox -->
        <div class="checkboxes">
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
        </div>

        <!-- Boutons -->
        <div class="buttonList">
            <input class="newCurve" id="newCurve" name="newCurve" value="New Curve" type="button">
            <input class="startGeneration" id="showGeometry" name="showGeometry" value="Start Generation" type="button">
            <input class="stopGeneration" id="stopGeneration" name="stopGeneration" value="Stop Generation" type="button">
            <input class="saveCanvas" id="saveCanvas" name="saveCanvas" value="Download" type="button">
            <input class="shareCanvas reserved_to_member" id="shareCanvas" name="shareCanvas" value="Share" type="button" bringMeTo="/../gen/index.php"><!-- target link depuis le formulaire-->
        </div>

        <!-- Ouvrir le modal -->
        <div id="infos" alt="Infos">En savoir plus sur Lylart Générator</div>
    </div>




    <?php

    function getCookieContent($name){
      $cookie = $name;
      $cookieContent = $_COOKIE[$cookie];
      return $cookieContent;
    }

    $session = @getCookieContent("statut");//le @ masque l'erreur dans la page quand le cookie n'existe pas
    $from = $style; //récupère le "nom" de la page donné dans $style
    ?>

    <form hidden="transmit_data" action="new_user_and_connection_form.php" method="post">
      <input type="hidden" class="from-url" name="from-url" value="<?=$url?>">
      <input type="hidden" class="target-url" name="target-url" value=""><!-- value ajoutée en jquery -->
    </form>

    <script type="text/javascript">
    var session = "<?=$session?>";
    var from = "<?=$from?>";
    var currentUrl = "<?=$url?>";

    console.log(currentUrl);
    console.log("session : " + session);
    console.log("from : " + from);

    $('.reserved_to_member').on('click',function(){ // listener for reserved_to_member
      var bringMeTo = $(this).attr('bringMeTo');//relative URL
      var targetUrl_from_newUserAndConnectionForm = "";

      if (session == "") {//le cookie n'exite pas ()
        console.log("pas connecté");
        $('.target-url').attr('value', bringMeTo);
        if (from == "gen") {
          var newUserAndConnectionForm_Url = currentUrl.concat('../new_user_and_connection_form.php');
          window.location.href = newUserAndConnectionForm_Url;
        }
        else{
          var newUserAndConnectionForm_Url = currentUrl.concat('new_user_and_connection_form.php');
          window.location.href = newUserAndConnectionForm_Url;
        }
        //submit formulaire transmit_data
      }
      else {
        console.log("connecté");
        if (from == "gen") {
          //script récup génération + toDataURL() + compression hexa lz-string + envoi dn la BDD
          //lz-string doc : https://pieroxy.net/blog/pages/lz-string/index.html
          //lz-string démo : https://pieroxy.net/blog/pages/lz-string/demo.html
        }
        else {
          window.location.href = currentUrl.concat(bringMeTo);
        }
      }
    });


    </script>

    <!-- Modal -->
    <div class="modal hidden">
        <div class="modal-card">
            <div class="modal-card-head">
                <p class="modal-card-title">About Lylart Generator v<span class="liragVersion"></span></p>
                <button class="delete"></button>
            </div>
            <section class="modal-card-body">
                <?php
                    require_once "lylart_modal.html";
                ?>
            </section>
            <div class="modal-card-footer">
                <button>Close</button>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "../footer.php"
?>
