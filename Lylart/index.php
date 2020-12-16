<?php
  $style="index"
  require_once "header.php";
?>

<div id="accueil">
    <div class="video">
        <div>
            <div>
                <h1>Slogan</h1>
                <h2>Autre chose ? Peut-être que oui ^^</h2>
            </div>
            <a href="gen/"><div class="button">Créer</div></a>
        </div>
        <video autoplay loop playsinline > <!-- autoplay loop controls playsinline-->
            <source src="video/EEEAAAOOO.mp4" type="video/mp4">
        </video>
    </div>
    <div class="grid-card">
        <?php
            for ($i=0; $i<8; $i++){
        ?>
        <div class="card">
            <div class="card_login">Mia Khalifa</div>
            <div class="card_gen">
                <img src="images/gen_test.jpg" alt="gen">
            </div>
            <div class="card_desc">
                <h3>Titre</h3>
                <p>Description, description description description description description description ...</p>
                <span>Suite</span>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<?php
    require_once "footer.php";
?>
