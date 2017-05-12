(function ($) {

  $(function () {

    $('[fullscreen]').each(function() {
      $(this).css({
        width: $(window).width(),
        height: $(window).height()
      });
    });

    var $mainMenu = $('.main-menu');

    $(window).scroll(function () {
      
      var scrolltop = $(this).scrollTop();
      var wheight = $(window).height() - $mainMenu.outerHeight();
      var holder = 0; // 和上面的边距

      if (wheight - scrolltop <= holder  ) {
          $mainMenu.css({
            bottom: wheight - holder
          }).addClass('top')
            .removeClass('bottom');
      } else {
        $mainMenu.css({
          bottom: $(this).scrollTop()
        }).addClass('bottom')
          .removeClass('top');
      }

      // 导航变色
      $('.home-body').find('.section').each(function () {
        var $section = $(this),
          index = $section.index() + 1;
        
        // 判断有没有到顶部
        var offsetTop = $section.offset()['top'];
        var meHeight = $section.height();
        if ( scrolltop >= offsetTop && ( offsetTop + meHeight ) > scrolltop ) {
          $mainMenu.find('li').removeClass('active').eq(index).addClass('active');
        }

      });

    }).trigger('scroll');

    window.em = function () {
      var args = Array.prototype.slice.call(arguments);
      args.map(function (arg) {
        console.log( new Number(arg / 13).toFixed(2) );
      });
    }
      
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