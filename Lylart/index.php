<?php
  $style="index";
  $jquery=true;
  require_once "header.php";
?>

<div id="accueil">
    <div class="video">
        <div>
            <div>
                <h1>Slogan</h1>
                <h2>Autre chose ? Peut-être que oui ^^</h2>
            </div>
            <a href="gen/"><div class="button">Create</div></a>
        </div>
        <video autoplay loop playsinline muted> <!-- autoplay loop controls playsinline muted-->
            <source src="video/video.mp4" type="video/mp4">
        </video>
    </div>
    <div class="choix">
        <div>Last posts</div>
        <div>The bests</div>
        <div>My gallery</div>
    </div>
    <div class="grid-card">
    </div>
</div>
<?php
    require_once "footer.php";
?>
