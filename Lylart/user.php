<?php
  $jquery=true;
  $style="user";
  require_once "header.php";
?>

<main class="user">
  <div class="grid">

    <div class="pdp-container">
      <div class="pdp-box">
        <img src="" alt="">
      </div>
      <div>
        <p>Changer photo de profil</p>
      </div>
    </div>

    <div class="info-box info-box1 top">
      <div class="label-form label-form-user">Nom d'utilisateur</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input"></input>
        <span>█</span>
      </div>
      <input type="button" class="button-form button-form-user" value="Changer pseudo"></input>
    </div>
    <div class="info-box info-box1">
      <div class="label-form label-form-user">Email</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"></input>
        <span>█</span>
      </div>
      <input type="button" class="button-form button-form-user" value="Changer d'Email"></input>
    </div>

    <div class="info-box info-box-mdp">
      <div class="label-form label-form-user">Mot de passe</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input"></input>
        <span>█</span>
      </div>

      <div class="label-form label-form-user-confirm">Confirmer mot de passe</div>
      <div class="data-form data-form-user-confirm">
        <input type="text" class="data-form data-form-user-input"></input>
      </div>
      <input type="button" class="button-form button-form-user" value="Changer mdp"></input>
    </div>

    <div class="osef-tous">
      <p>voici les trucs que personne ne lira, mais on vous recommande de le lire au cas où...</p>
    </div>
  </div>
</main>
<?php
    require_once "footer.php";
?>
