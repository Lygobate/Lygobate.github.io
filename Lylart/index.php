<?php
  $style="index";
  $jquery=true;
  require_once "header.php";
//  session_start(['cookie_lifetime' => 86400]);
?>

<div id="accueil">
    <div class="video">
        <div>
            <div>
                <h1>LYLART</h1>
                <h2>Lylart gallery is a brand new social network allowing users to share their creations on <a href="./gen">Lylart Generator</a>. This project, realized by students, is innovative and above all creative.</h2>
            </div>
            <a href="gen/"><div class="button">Create</div></a>
        </div>
        <video autoplay loop playsinline muted> <!-- autoplay loop controls playsinline muted-->
            <source src="video/video.mp4" type="video/mp4">
        </video>
    </div>
    <div class="choix">
        <div req="lastPosts">Last posts</div>
        <div req="fav">The bests</div>
        <?php
            if (isset($_SESSION["token"])){
                echo '<div req="mag">My gallery</div>';
            } else{
                echo '<a href="new_user_and_connection_form.php"><div title="Log in">My gallery</div></a>';
            }
        ?>
    </div>
    <div class="grid-card">
    </div>
</div>

<?php
    require_once "footer.php";
?>
