<?php
    if (!isset($_COOKIE["statut"])){
        header('Location: ./');
    }
    $jquery=true;
    $style="user";
    require_once "header.php";
    require_once "requetes/config.php";
    $requete=$pass->prepare("SELECT pseudo, mail FROM utilisateur WHERE token=:token");
    $requete->execute([':token'=> $_SESSION["token"]]);
    $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="user">
    <div class="grid">

    <div class="pdp-container">
      <div class="pdp-box">
          <i class="fas fa-user-circle"></i>
      </div>
      <div>
        <p style="cursor: not-allowed;">Change the picture</p>
      </div>
    </div>

    <div class="div">
      <div class="success-box success-box-user">
        <div class="success-message success-message-user">
          <!-- emplacement message -->
        </div>
      </div>
    </div>

    <div class="info-box info-box1 top">
      <div class="label-form label-form-user">Username</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input" id="pseudo_modify" value="<?= $resultat[0]['pseudo'] ?>">
        <span><i class="fas fa-edit"></i></i></span>
      </div>
      <input type="button" class="button-form button-form-user" id="pseudo_modify_but" value="Change username">
    </div>
    <div class="info-box info-box1">
      <div class="label-form label-form-user">Email</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input" id="mail_modify" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?= $resultat[0]['mail'] ?>">
        <span><i class="fas fa-edit"></i></span>
      </div>
      <input type="button" class="button-form button-form-user" id="mail_modify_but" value="Change mail">
    </div>

    <div class="info-box info-box-mdp">
      <div class="label-form label-form-user">New password</div>
      <div class="data-form data-form-user">
        <input type="text" class="data-form data-form-user-input" id="password_modify">
        <span><i class="fas fa-edit"></i></span>
      </div>

      <div class="label-form label-form-user-confirm">Confirm password</div>
      <div class="data-form data-form-user-confirm">
        <input type="text" class="data-form data-form-user-input">
      </div>
      <input type="button" class="button-form button-form-user" id="password_modify_but" value="Change password">
    </div>

    <div class="disconnect-box">
      <input id="disconnect" type="button" class="button-form button-form-user" value="Disconnect">
    </div>
    <div class="osef-tous">
      <p>Things that none will read, but common read this : <a href="mentions.php">Legal Disclaimer</a></p>
    </div>
  </div>
</main>

<script type="text/javascript">
  $('#disconnect').on('click', function(){
    $('#disconnect').attr('disabled','disabled');
    var currentUrl = "<?=$url?>";
    set_disconnect = {
      disconnect: true
    };
    $.post(
      'requetes/disconnect.php',
      set_disconnect,
      function(disconnected){
        console.log(disconnected);
        window.location.href = currentUrl.concat('/../index.php');
      },
      'text');
  });
</script>


<?php
    require_once "footer.php";
?>
