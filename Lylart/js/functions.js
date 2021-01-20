$(function{

  function fadeOutThis(id,fadeDuration,delay){}
  setTimeout(function(){
    $(id).fadeOut(fadeDuration,function(){
      $('.success-box-user').css('display','none');}
    );
  }, delay);

});
