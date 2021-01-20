$(function(){
    $('#loader').toggleClass('hidden');
    $(window).scroll(function() {
        if ($(this).scrollTop()>300)
        {
            $('.mentions a').hide(500);
        }
        else
        {
            $('.mentions a').show(500);
        }
    });
    let req = "lastPosts";
    let data={
        iteration:0,
        typeRequete: req
    }
    $.post(
        'requetes/cards.php',
        data,
        function(success){
            //console.log(success[0]['image']);
            for (i=0;i<success.length;i++) {
                $('.grid-card').append(`
                    <div class="card">
                        <div class="card_login">` + success[i]['pseudo'] + `</div>
                        <div class="card_gen">
                            <img src="`+success[i]['image']+`" alt="gen">
                        </div>
                        <div class="card_desc">
                            <h3>` + success[i]['nom'] + `</h3>
                            <p>` + success[i]['description'] + `</p>
                            <span title="Numéro de version du générateur">v` + success[i]['version'] + `</span>
                        </div>
                    </div>
                `);
            }
        },
        'json'
    );
    data.iteration+=1;
    $('.choix > div').on("click", function(){
        req = $(this).attr('req');
        data={
            iteration:0,
            typeRequete: req
        }
        $.post(
            'requetes/cards.php',
            data,
            function(success){
                $('.grid-card').html('');
                for (i=0;i<success.length;i++) {
                    $('.grid-card').append(`
                        <div class="card">
                            <div class="card_login">` + success[i]['pseudo'] + `</div>
                            <div class="card_gen">
                                <img src="`+success[i]['image']+`" alt="gen">
                            </div>
                            <div class="card_desc">
                                <h3>` + success[i]['nom'] + `</h3>
                                <p>` + success[i]['description'] + `</p>
                                <span title="Numéro de version du générateur">v` + success[i]['version'] + `</span>
                            </div>
                        </div>
                    `);
                }
            },
            'json'
        );
        data.iteration+=1;
        do_it=true;
    });
    let do_it = true;
    $(window).scroll(function () {
        if (($(document).height() - $(this).height()) - 300 <= $(this).scrollTop().toFixed(0) && do_it === true) {
            do_it=false;
            $.post(
                'requetes/cards.php',
                data,
                function(success){
                    for (i=0;i<success.length;i++) {
                        $('.grid-card').append(`
                        <div class="card">
                            <div class="card_login">` + success[i]['pseudo'] + `</div>
                            <div class="card_gen">
                                <img src="`+success[i]['image']+`" alt="gen">
                            </div>
                            <div class="card_desc">
                                <h3>` + success[i]['nom'] + `</h3>
                                <p>` + success[i]['description'] + `</p>
                                <span title="Numéro de version du générateur">v` + success[i]['version'] + `</span>
                            </div>
                        </div>
                    `);
                    }
                    if (success.length !== 0){
                        do_it=true;
                        data.iteration+=1;
                    }
                },
                'json'
            );
        }
    });
    $('#pseudo_modify_but').on("click", function(){
        data={
            requete: 'pseudo',
            valeur: $('#pseudo_modify').val()
        }
        $.post(
            'requetes/user_param.php',
            data,
            function(success){
                //console.log("Petit log pour dire que tout s'est bien passé ;)");
                $('.success-box-user').css('background','#00c963');
                $('.success-box-user').css('display','block');
                $('.success-message-user').html("Your username has been successfully updated !");

                function fadeOutThis(){}
                setTimeout(function(){
                  $('.success-box-user').fadeOut(1000,function(){
                    $('.success-box-user').css('display','none');}
                  );
                }, 3000); //je n'arrive pas à l'extenaliser dans js/functions.js pour l'appeler ensuite. j'ai pourtant bien importer dans header.php

            },
            'text'
        );
    });
    $('#mail_modify_but').on("click", function(){
        data={
            requete: 'mail',
            valeur: $('#mail_modify').val()
        }
        $.post(
            'requetes/user_param.php',
            data,
            function(success){
                //console.log("Petit log pour dire que tout s'est bien passé ;)");
                $('.success-box-user').css('background','#00c963');
                $('.success-box-user').css('display','block');
                $('.success-message-user').html("Your mail was successfully updated !");//temporaire
                //prévoir une vérification d'Email.
                // il faut créer un nouvel emplacement dans la table utilisateur. Un champ initialement vide pour tout le monde "mail_update_request" par exemple. Il contiendra le nouveau mail en attente d'approbation, avant qu il soit vérifié.
                //une fois la requête de changement envoyé, il faut envoyer un mail à la nouvelle adresse mail demandé.
                //une fois vérifié par l'utilisateur, le mail est remplacé par le mail en attente stocké dans "mail_update_request", et ce champ sera vidé.
                //cela fait que l'utilisateur garde son mail en attendant. Si le mail n'est pas vérifié avant X temps (exemple 10 jours), le champ "mail_update_request" est supprimé, et l'utilisateur garde son mail. on pourra lui envoyer un petit mail a son ancienne adresse (normalement vérifiée aussi) pour lui dire que son mail n'as pas été modifié en raison de non modification.

                //une fois fait on peut mettre la ligne de code ci dessous et enlever l'ancien message
                //$('.success-message-user').html("Your request was successfully sent ! Please <b>check your Emails</b> to confirm the new mail.");
                function fadeOutThis(){}
                setTimeout(function(){
                  $('.success-box-user').fadeOut(1000,function(){
                    $('.success-box-user').css('display','none');}
                  );
                }, 3000); //je n'arrive pas à l'extenaliser dans js/functions.js pour l'appeler ensuite. j'ai pourtant bien importer dans header.php
            },
            'text'
        );
    });
    $('#password_modify_but').on("click", function(){
        console.log($('#password_modify').val());
    });
});
