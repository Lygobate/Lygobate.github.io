<?php
    $jquery=true;
    require_once "header.php";
?>


      <main class="form-page">

        <div id="is_registed"></div>
        <form id="new_user_form" action="" method="post">
          <input type="text" name="login" placeholder="Login/pseudo..." required><br>
          <input type="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Addresse mail" required><br>
          <input type="password" name="password" placeholder="Mot de passe" required><br>
          <input type="password" name="password_repeat" placeholder="Confirmez votre mot de passe" required><br>
          <span id="wrong_repeat"></span><br>
          <select name="pays" required>
            <?php
            $listOfCountry = array("AF" => "Afghanistan", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "AX" => "Åland Islands", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "BQ" => "British Antarctic Territory", "IO" => "British Indian Ocean Territory", "VG" => "British Virgin Islands", "BN" => "Brunei", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CT" => "Canton and Enderbury Islands", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos [Keeling] Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo - Brazzaville", "CD" => "Congo - Kinshasa", "CK" => "Cook Islands", "CR" => "Costa Rica", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "CI" => "Côte d’Ivoire", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "NQ" => "Dronning Maud Land", "DD" => "East Germany", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "FQ" => "French Southern and Antarctic Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island and McDonald Islands", "HN" => "Honduras", "HK" => "Hong Kong SAR China", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JT" => "Johnston Island", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Laos", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macau SAR China", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "FX" => "Metropolitan France", "MX" => "Mexico", "FM" => "Micronesia", "MI" => "Midway Islands", "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar [Burma]", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NT" => "Neutral Zone", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "KP" => "North Korea", "VD" => "North Vietnam", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PC" => "Pacific Islands Trust Territory", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territories", "PA" => "Panama", "PZ" => "Panama Canal Zone", "PG" => "Papua New Guinea", "PY" => "Paraguay", "YD" => "People's Democratic Republic of Yemen", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn Islands", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RO" => "Romania", "RU" => "Russia", "RW" => "Rwanda", "RE" => "Réunion", "BL" => "Saint Barthélemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "MF" => "Saint Martin", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa", "SM" => "San Marino", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "CS" => "Serbia and Montenegro", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and the South Sandwich Islands", "KR" => "South Korea", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "ST" => "São Tomé and Príncipe", "TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UM" => "U.S. Minor Outlying Islands", "PU" => "U.S. Miscellaneous Pacific Islands", "VI" => "U.S. Virgin Islands", "UG" => "Uganda", "UA" => "Ukraine", "SU" => "Union of Soviet Socialist Republics", "AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States", "ZZ" => "Unknown or Invalid Region", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VA" => "Vatican City", "VE" => "Venezuela", "VN" => "Vietnam", "WK" => "Wake Island", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe");
            foreach ($listOfCountry as $key => $country) {
              if ($country=="France") {
                echo '<option value='.$country.' selected>'.$key.'  '.$country.'</option>';
              } else {
                echo '<option value='.$country.'>'.$key.'  '.$country.'</option>';
              }
            }
            ?>
          </select><br>
          <input type="hidden" name="from" value="creer"><br><br>
          <input type="submit" id="submit_new_user" name="submit" value="Créer un compte" disabled>
        </form>


        <div class="connection">
          <div id="is_connected"></div>
          <form id="connection-form" action="" method="post">

            <div class="info-box top">
              <div class="label-form">Login</div>
              <div class="data-form">
                <input type="text" class="data-form data-form-user-input" name="login" placeholder="..." required>
                <span>█</span>
              </div>
            </div>
            <div class="info-box">
              <div class="label-form">Mail</div>
              <div class="data-form">
                <input type="password" class="data-form data-form-user-input" name="password" placeholder="..." required>
                <span>█</span>
              </div>
            </div>
            <div class="info-box">
              <div class="label-form">Password</div>
              <div class="data-form">
                <input type="password" class="data-form data-form-user-input" name="password" placeholder="..." required>
                <span>█</span>
              </div>
            </div>
            <input type="hidden" name="from" value="connection">
            <input type="submit" id="submit_login" class="button-form" name="submit" value="Se connecter" bringMeTo="./">

            <input type="text" name="login" placeholder="votre login/pseudo..." required>
            <span id="wrong_pseudo"></span>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="hidden" name="from" value="connection">
            <input type="submit" id="submit_login" class="button-form" name="submit" value="Se connecter" bringMeTo="./">
          </form>
        </div>
      </main>












      <script type="text/javascript">
      $(function(){
        //_______________________NEW USER

        //éviter que le mot de passe soit différent
        $('input[name="password_repeat"], input[name="password"]').on('input change', function(){

          if($('input[name="password_repeat"]').val() != $('input[name="password"]').val()){
            $('#wrong_repeat').html('Les mots de passes ne correspondent pas niké de té more');
            $('input[name="password_repeat"],input[name="password"]').css('border','solid 2px red');

          } else {
            $('input[name="password_repeat"],input[name="password"]').css('border','solid 2px green');
            $('#wrong_repeat').html('Cool, bienvenue');
            $('#submit_new_user').removeAttr('disabled');
          }
        });

        //envoi des données
        $('#new_user_form').submit(function(e){
          e.preventDefault();
          let form_data = $(this).serialize();
          //console.log(form_data);
          $.ajax({
            url: 'requetes/new_user_and_connection.php',
            type: 'POST',
            dataType: 'text',
            data: form_data,
            success: function(registed,statut){
              console.log("OK");
              if (registed == "registed") {
                  $('#is_registed').html("vous avez bien été enregistré");
                  <?php if (isset($_POST["given_title"])) { ?>
                  data = {
                    image: "<?=$_POST["compressed-generation"]?>",
                    version: "<?=$_POST["lylart_generator_version"]?>",
                    title: "<?=$_POST["given_title"]?>",
                    desc: "<?=$_POST["given_description"]?>"
                  }
                  $.post("requetes/img_to_bdd.php",
                      data,
                      function(resultat){
                        console.log(resultat);
                      },
                      "text");
                window.location.href = "<?=$_POST["target-url"]?>";
                <?php
                }
                ?>
                window.location.href = $('#submit_login').attr('bringMeTo');
              } else if (registed == "mail_error") {
                  $('#is_registed').html("un compte utilisateur existe déjà sous ce mail");
              } else if (registed == "userName_error") {
                  $('#is_registed').html("un compte utilisateur existe déjà sous ce login/pseudonyme");
              } else if(registed == "mail_and_userName_error"){
                  $('#is_registed').html("un compte utilisateur existe déjà sous ce login/pseudonyme et sous ce mail. Tu as déjà un compte ? connecte toi ICI");
              }
            }
          });//end Ajax
        });


        $('#connection-form').submit(function(e){
          e.preventDefault();
          $('#submit_login').attr('disabled','disabled');
          let form_data = $(this).serialize();
          //console.log(form_data);
          $.ajax({
            url: 'requetes/new_user_and_connection.php',
            type: 'POST',
            dataType: 'text',
            data: form_data,
            success: function(connection,statut){
              //console.log(connection);
              if (connection == "true"){
                //console.log("FDDDDPPPP");
                $('#is_connected').html("Vous êtes bien connecté");
                <?php if (isset($_POST["given_title"])) { ?>
                data = {
                  image: "<?=$_POST["compressed-generation"]?>",
                  version: "<?=$_POST["lylart_generator_version"]?>",
                  title: "<?=$_POST["given_title"]?>",
                  desc: "<?=$_POST["given_description"]?>"
                }
                $.post("requetes/img_to_bdd.php",
                    data,
                    function(resultat){
                      console.log(resultat);
                    },
                    "text");
                window.location.href = "<?=$_POST["target-url"]?>";
              <?php
              }
              ?>
              window.location.href = $('#submit_login').attr('bringMeTo');
              } else if (connection == "false") {
                $('#is_connected').html("Login/Password don't match or don't exist");
                $('#submit_login').removeAttr('disabled');
              }
            }
          });//end Ajax
        });
      });//end of function (load)

      </script>
    </body>
  </html>
