$(function(){
    $('#loader').toggleClass('hidden');
    let data={
        iteration:0
    }
    $.post(
        'requetes/cards.php',
        data,
        function(success){
            console.log(success);
        },
        'text'
    );
});
