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
            <input class="shareCanvas reserved_to_member" id="shareCanvas" name="shareCanvas" value="Share" type="button" bringMeTo="/../gen/"><!-- target link depuis le formulaire-->
        </div>

        <!-- Ouvrir le modal -->
        <div id="infos" alt="Infos">More about Lylart Generator</div>
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

    <form id="transmit_data" action="../new_user_and_connection_form.php" method="post">
      <input type="hidden" class="from-url" name="from-url" value="<?=$url?>">
      <input type="hidden" class="target-url" name="target-url" value=""><!-- value ajoutée en jquery -->
      <input type="hidden" class="compressed-generation" name="compressed-generation" value="">
      <input type="hidden" class="lylart_generator_version" name="lylart_generator_version" value="">
      <input type="hidden" class="given_title" name="given_title" value="">
      <input type="hidden" class="given_description" name="given_description" value="">
    </form>

    <script type="text/javascript">
    let session = "<?=$session?>";
    let from = "<?=$from?>";
    let currentUrl = "<?=$url?>";
    let action_url;



    <?php /*
    if (isset($_SESSION['token'])) {
      echo "
      <script>
      let token = '".$_SESSION['token']."';
      console.log(token);
      </script>
      ";
    }*/
     ?>


    //console.log(currentUrl);
    //console.log("session : " + session);
    console.log("from : " + from);
    //console.log();
    $(function(){
      $('.reserved_to_member').on('click',function(){ // listener for reserved_to_member
        let bringMeTo = $(this).attr('bringMeTo');//relative URL
        console.log(bringMeTo);

        if (session == "") {//le cookie n'exite pas ()
          console.log("pas connecté");
          $('.target-url').attr('value', bringMeTo);
          $('.lylart_generator_version').attr('value',lylart_generator_version);

          if (from == "gen") {
            console.log("");
            compressed_image = $(canvas)[0].toDataURL("image/jpeg",0.6);
            $('.compressed-generation').attr('value',compressed_image)

            $(".modal-card-title").html("Share your generation !");
            $(".modal-card-body").html(`
              <h2>Share your creation on LyLart Gallery</h2>
              <div>
                <img src="`+compressed_image+`" alt="your image">
                <label for="titre">Title*
                  <input id="titleImage" type="text" name="title"  placeholder="3 chars minimum">
                </label>
                <label for="desc">Description
                  <textarea id="descImage" name="desc" maxlength="300" rows="5" cols="40" wrap="soft" placeholder="300 chars maximum"></textarea>
                </label>
                <input type="button" value="Share" id="shareGen" disabled>
              </div>
            `);

            $(".modal").toggleClass("hidden");
            $('.modal,.modal-card,.modal-card-body').removeClass("modalInfo");
            $("html").scrollTop(0);

            $('#titleImage').on("input change", function(){
                if ($('#titleImage').val().length>=3){
                    $('#shareGen').removeAttr("disabled");
                } else{
                    $('#shareGen').attr("disabled", "disabled");
                }
            });

            if (currentUrl[currentUrl.length - 1] == '/') {
              action_url = '../new_user_and_connection_form.php';
            }
            else{
              action_url = '/../new_user_and_connection_form.php';
            }
            $('.transmit_data').attr('action', action_url);
          }
          else{
            //not connected and not from gen
          }
          $('#shareGen').on('click',function(){
            $('.given_title').val($('#titleImage').val());
            $('.given_description').val($('#descImage').val());
            // console.log($('.given_title').val());
            // console.log($('.given_description').val());
            // console.log($('.lylart_generator_version').val());
            // console.log($('.compressed-generation').val());
            // console.log($('.target-url').val());
            // console.log($('.from-url').val());
            $('#transmit_data').submit();
          });
        }
        else {
          console.log("connecté");
          if (from == "gen") {
            compressed_image = $(canvas)[0].toDataURL("image/jpeg",0.6); //LZString.compress($(canvas)[0].toDataURL("image/jpeg",0.7));
            $(".modal-card-title").html("Share your generation !");
            $(".modal-card-body").html(`
              <h2>Share your creation on LyLart Gallery</h2>
              <div>
                <img src="`+compressed_image+`" alt="your image">
                <label for="titre">Title*
                  <input id="titleImage" type="text" name="title"  placeholder="3 chars minimum">
                </label>
                <label for="desc">Description
                  <textarea id="descImage" name="desc" maxlength="300" rows="5" cols="40" wrap="soft" placeholder="300 chars maximum"></textarea>
                </label>
                <input type="button" value="Share" id="shareGen" disabled>
              </div>
            `);

            $(".modal").toggleClass("hidden");
            $('.modal,.modal-card,.modal-card-body').removeClass("modalInfo");
            $("html").scrollTop(0);
            $('#titleImage').on("input change", function(){
                if ($('#titleImage').val().length>=3){
                    $('#shareGen').removeAttr("disabled");
                } else{
                    $('#shareGen').attr("disabled", "disabled");
                }
            });
            $('#shareGen').on("click", function(){
              $('#shareGen').attr("disabled", "disabled");
              data = {
                image: compressed_image,
                version: lylart_generator_version,
                title: $("#titleImage").val(),
                desc: $("#descImage").val()
              }
              $.post("../requetes/img_to_bdd.php",
                  data,
                  function(resultat){
                    console.log(resultat);
                    $('.modal').addClass("hidden");
                  },
                  "text");
            });
          }
          else {
            window.location.href = currentUrl.concat(bringMeTo);
          }
        }
      });
      saveModalTitle=$(".modal-card-title").html();
      saveModalbody=$(".modal-card-body").html();
      $("#infos").on("click", function(){$('.modal').removeClass("hidden");$('.modal,.modal-card,.modal-card-body').addClass("modalInfo");$(".modal-card-title").html(saveModalTitle);$(".modal-card-body").html(saveModalbody);$("html").scrollTop(0);});
      $(".modal button").on("click", function(){$('.modal').addClass("hidden");});
    });


    </script>

    <!-- Modal -->
    <div class="modal hidden">
        <div class="modal-card">
            <div class="modal-card-head">
                <p class="modal-card-title">About Lylart Generator v<span class="lylart_generator_version"></span></p>
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
