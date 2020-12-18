<?php
  $jquery=true;
  $style="user";
  require_once "header.php";
?>

<main class="user">
  <div class="grid">

    <div class="pdp-container">
      <div class="pdp-box">
          <i class="fas fa-user-circle"></i>
      </div>
      <div>
        <p>Change the picture</p>
      </div>
    </div>

    <div class="info-box info-box1 top">
      <div class="label-form label-form-user">Username</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input">
        <span><i class="fas fa-lock"></span>
      </div>
      <input type="button" class="button-form button-form-user" value="Changer Username">
    </div>
    <div class="info-box info-box1">
      <div class="label-form label-form-user">Email</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <span></span>
      </div>
      <input type="button" class="button-form button-form-user" value="Change Mail">
    </div>

    <div class="info-box info-box-mdp">
      <div class="label-form label-form-user">Password</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input">
        <span></span>
      </div>

      <div class="label-form label-form-user-confirm">Confirm password</div>
      <div class="data-form data-form-user-confirm">
        <input type="text" class="data-form data-form-user-input">
      </div>
      <input type="button" class="button-form button-form-user" value="Change password">
    </div>

    <div class="osef-tous">
      <p>voici les trucs que personne ne lira, mais on vous recommande de le lire au cas où...</p>
    </div>
  </div>
</main>
<?php
    require_once "footer.php";
?>
