<?php
    $jquery=true;
    $style="";
    require_once "header.php";
?>


      <main class="form-page">

        <div class="create_account">
          <div class="title_form">
            <p>Sign up to LyLart Gallery</p>
          </div>
          <div class="message-box2">
            <div class="message2"></div>
          </div>

          <form id="new_user_form" action="" method="post">

            <div class="info-box infobox-co-form top ">
              <div>
                <div class="label-form">Login</div>
                <div class="data-form">
                  <input type="text" class="data-form data-form-user-input" name="login" required>
                  <span><i class="fas fa-sign-in-alt"></i></span>
                </div>
              </div>
            </div>

            <div class="info-box infobox-co-form">
              <div>
                <div class="label-form">Mail</div>
                <div class="data-form">
                  <input type="mail" class="data-form data-form-user-input" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required><br>
                  <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                </div>
              </div>
            </div>

            <div class="info-box infobox-co-form">
              <div>
                <div class="label-form">Country</div>
                <div class="data-form">
                  <select name="pays" class="data-form data-form-user-input" required>
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
                  <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                </div>
              </div>
            </div>

            <div class="info-box infobox-co-form">
              <div>
                <div class="label-form">Password</div>
                <div class="data-form">
                  <input id="ca-password" type="password" class="data-form data-form-user-input" name="password"  required><br>
                  <span><i class="fas fa-lock"></i></span>
                </div>
              </div>
              <div>
                <div class="label-form">Confirm password</div>
                <div class="data-form">
                  <input id="ca-password-repeat" type="password" class="data-form data-form-user-input" name="password_repeat"  required><br>
                  <span><i class="fas fa-lock"></i></span>
                </div>
              </div>
            </div>

            <input type="hidden" name="from" value="creer">

            <div class="button-box">
              <input type="submit" id="submit_new_user" class="button-form" name="submit" disabled value="Sign up" bringMeTo="./">
              <div class="back">
                <div class="back-link">Go back to connection</div>
              </div>
            </div>
          </form>
        </div>






        <div class="connection">

          <div class="title_form">
            <p>Connection to LyLart Gallery</p>
          </div>
          <div class="message-box">
            <div class="message"></div>
          </div>

          <form id="connection-form" action="" method="post">

            <div class="info-box infobox-co-form top ">
              <div>
                <div class="label-form">Login</div>
                <div class="data-form">
                  <input type="text" class="data-form data-form-user-input" name="login" required>
                  <span><i class="fas fa-sign-in-alt"></i></span>
                </div>
              </div>
            </div>

            <div class="info-box infobox-co-form">
              <div>
                <div class="label-form">Password</div>
                <div class="data-form">
                  <input id="connection-password-input" type="password" class="data-form data-form-user-input" name="password" required>
                  <span><i class="fas fa-eye-slash"></i></span>
                </div>
              </div>
            </div>

            <input type="hidden" name="from" value="connection">
            <div class="button-box">
              <input type="submit" id="submit_login" class="button-form" name="submit" value="Connection" bringMeTo="./">
              <div class="no-account">
                <div class="no-account-link">I haven't got account yet</div>
              </div>
            </div>
          </form>
        </div>
      </main>












      <script type="text/javascript">
      $(function(){

        //animation

        let show=false;
        $('#connection-form > div:nth-child(2) > div > div.data-form > span').on('click',function(){
          if (show) {
            $('i[class="fas fa-eye"]').attr('class','fas fa-eye-slash');
            $('#connection-password-input').removeAttr('type');
            $('#connection-password-input').attr('type','password');
            show=false;
          }
          else {
            $('i[class="fas fa-eye-slash"]').attr('class','fas fa-eye');
            $('#connection-password-input').removeAttr('type');
            $('#connection-password-input').attr('type','text');
            show=true;
          }
        });

        $('.no-account-link').on('click',function(){
          $('.connection').css('display','none');
          $('.create_account').css('display', 'block')
          $('input[name="login"]').val("");
          $('input[name="password"]').val("");
          $('.message-box').css("display","none");
          $('.message').empty();
        });

        $('.back-link').on('click',function(){
          $('.create_account').css('display','none');
          $('.connection').css('display', 'block');
          $('input[name="login"]').val("");
          $('input[name="password"]').val("");
          $('input[name="password_repeat"]').val("");
          $('input[name="mail"]').val("");
          $('input[name="pays"]').val("");
          $('#ca-password-repeat,#ca-password').css('border','none');
          $('#ca-password-repeat,#ca-password').css('border','border-bottom: solid thin $div_back;');
          $('.message-box2').css("display","none");
          $('.message2').empty();
        });

        //_______________________NEW USER

        //éviter que le mot de passe soit différent
        $('#ca-password-repeat, #ca-password').on('input change', function(){
          if($('#ca-password-repeat').val() != $('#ca-password').val()){
            $('#message2').html('Passwords do not match');
            $('#ca-password-repeat,#ca-password').css('border','solid 2px red');

          } else {
            $('#ca-password-repeat,#ca-password').css('border','solid 2px green');
            $('#message2').html('Passwords match');
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
                $('.message-box2').css('background','#E62000');
                $('.message-box2').css('display','block');
                  $('.message2').html("vous avez bien été enregistré");
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
                $('.message-box2').css('background','#E62000');
                  $('.message-box2').css('display','block');
                  $('.message2').html("a user account already exists with this email.");
              } else if (registed == "userName_error") {
                $('.message-box2').css('background','#E62000');
                $('.message-box2').css('display','block');
                $('.message2').html("a user account already exists with this login / pseudonym.");
              } else if(registed == "mail_and_userName_error"){
                $('.message-box2').css('background','#E62000');
                $('.message-box2').css('display','block');
                $('.message2').html("A user account already exists with this login / pseudonym and with this email.");
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
                $('.message-box').css('background-color','#00c963');
                $('.message-box').css('display','block');
                $('.message').html("You are connected !");
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
                $('.message-box').css('background','#E62000');
                $('.message-box').css('display','block');
                $('.message').html("Login/Password don't match or don't exist");
                $('#submit_login').removeAttr('disabled');
              }
            }
          });//end Ajax
        });
      });//end of function (load)

      </script>
    </body>
  </html>
