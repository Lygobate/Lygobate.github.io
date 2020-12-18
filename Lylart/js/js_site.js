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
    let data={
        iteration:0,
        typeRequete: "lastPosts"
    }
    $.post(
        'requetes/cards.php',
        data,
        function(success){
            console.log(success[0]['image']);
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
                            <span>View more</span>
                        </div>
                    </div>
                `);
            }
        },
        'json'
    );
});
