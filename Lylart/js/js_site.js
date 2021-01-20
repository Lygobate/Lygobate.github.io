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
                console.log("Petit log pour dire que tout s'est bien passé ;)");
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
                console.log("Petit log pour dire que tout s'est bien passé ;)");
            },
            'text'
        );
    });
    $('#password_modify_but').on("click", function(){
        console.log($('#password_modify').val());
    });
});
