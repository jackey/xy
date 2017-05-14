(function ($) {

  $(function () {

    var height = [];
    var totalHeight = $(document).height();
    $('.float-menu').css('top','-400px');  

    $('.contents').each(function() {
      var eleHeight = parseInt($(this).offset().top);
      height.push(eleHeight);
    });
    
    $('.float-menu li').each(function(index){
      var i = index;
      $(this).click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $('html, body').animate({scrollTop:height[i]+'px'},500);
      })
    });

    $(window).scroll(function () {
      $('.float-menu').stop(); 
      var currentHeight = parseInt($(document).scrollTop());
      
      var floatMenuHeight = currentHeight -30;
      if(currentHeight<100){
        floatMenuHeight = currentHeight - 3000;
      }
      $('.float-menu').animate({ top: floatMenuHeight + "px" },200 );
      

      var scrollHeight = parseInt($(window).scrollTop());
        var length = height.length;
        for(var i in height){
          if(height[i] > scrollHeight+120){
            i = i-1;
            $('.float-menu li').eq(i).addClass('active').siblings().removeClass('active');
            break;
          }else{
            $('.float-menu li').eq(length-1).addClass('active').siblings().removeClass('active');
          }
        }

    });
  });

})(jQuery);