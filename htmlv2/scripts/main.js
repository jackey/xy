(function ($) {

  $(function () {

    $('[fullscreen]').each(function() {
      $(this).css({
        width: $(window).width(),
        height: $(window).height()
      });
    });

    $(window).scroll(function () {
      
      var scrolltop = $(this).scrollTop();
      var wheight = $(window).height() - $('.main-menu').outerHeight();
      var holder = 0; // 和上面的边距


      if (wheight - scrolltop <= holder  ) {
          $('.main-menu').css({
            bottom: wheight - holder
          }).addClass('top')
            .removeClass('bottom');
      } else {
        $('.main-menu').css({
          bottom: $(this).scrollTop()
        }).addClass('bottom')
          .removeClass('top');
      }

    }).trigger('scroll');
      
  });
  
  // loading 的效果
  $(window).on('load' ,function () {

    $('.loading, .loading-bg').animate({
      opacity: 0
    }, 800, function() {
      $(this).remove();
    }).addClass('animate-pause');

  });

})(jQuery);