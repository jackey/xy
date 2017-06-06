/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {
	var $body, $window, $sidebar, adminbarOffset, top = false,
	    bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
	    topOffset = 0, bodyHeight, sidebarHeight, resizeTimer,
	    secondary, button;

	function initMainNavigation( container ) {
		// Add dropdown toggle that display child menu items.
		container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggle-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this );
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	// Re-initialize the main navigation when it is updated, persisting any existing submenu expanded states.
	$( document ).on( 'customize-preview-menu-refreshed', function( e, params ) {
		if ( 'primary' === params.wpNavMenuArgs.theme_location ) {
			initMainNavigation( params.newContainer );

			// Re-sync expanded states from oldContainer.
			params.oldContainer.find( '.dropdown-toggle.toggle-on' ).each(function() {
				var containerId = $( this ).parent().prop( 'id' );
				$( params.newContainer ).find( '#' + containerId + ' > .dropdown-toggle' ).triggerHandler( 'click' );
			});
		}
	});

	secondary = $( '#secondary' );
	button = $( '.site-branding' ).find( '.secondary-toggle' );

	// Enable menu toggle for small screens.
	( function() {
		var menu, widgets, social;
		if ( ! secondary || ! button ) {
			return;
		}

		// Hide button if there are no widgets and the menus are missing or empty.
		menu    = secondary.find( '.nav-menu' );
		widgets = secondary.find( '#widget-area' );
		social  = secondary.find( '#social-navigation' );
		if ( ! widgets.length && ! social.length && ( ! menu || ! menu.children().length ) ) {
			button.hide();
			return;
		}

		button.on( 'click.twentyfifteen', function() {
			secondary.toggleClass( 'toggled-on' );
			secondary.trigger( 'resize' );
			$( this ).toggleClass( 'toggled-on' );
			if ( $( this, secondary ).hasClass( 'toggled-on' ) ) {
				$( this ).attr( 'aria-expanded', 'true' );
				secondary.attr( 'aria-expanded', 'true' );
			} else {
				$( this ).attr( 'aria-expanded', 'false' );
				secondary.attr( 'aria-expanded', 'false' );
			}
		} );
	} )();

	/**
	 * @summary Add or remove ARIA attributes.
	 * Uses jQuery's width() function to determine the size of the window and add
	 * the default ARIA attributes for the menu toggle if it's visible.
	 * @since Twenty Fifteen 1.1
	 */
	function onResizeARIA() {
		if ( 955 > $window.width() ) {
			button.attr( 'aria-expanded', 'false' );
			secondary.attr( 'aria-expanded', 'false' );
			button.attr( 'aria-controls', 'secondary' );
		} else {
			button.removeAttr( 'aria-expanded' );
			secondary.removeAttr( 'aria-expanded' );
			button.removeAttr( 'aria-controls' );
		}
	}

	// Sidebar scrolling.
	function resize() {
		windowWidth = $window.width();

		if ( 955 > windowWidth ) {
			top = bottom = false;
			$sidebar.removeAttr( 'style' );
		}
	}

	function scroll() {
		var windowPos = $window.scrollTop();

		if ( 955 > windowWidth ) {
			return;
		}

		sidebarHeight = $sidebar.height();
		windowHeight  = $window.height();
		bodyHeight    = $body.height();

		if ( sidebarHeight + adminbarOffset > windowHeight ) {
			if ( windowPos > lastWindowPos ) {
				if ( top ) {
					top = false;
					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
				} else if ( ! bottom && windowPos + windowHeight > sidebarHeight + $sidebar.offset().top && sidebarHeight + adminbarOffset < bodyHeight ) {
					bottom = true;
					$sidebar.attr( 'style', 'position: fixed; bottom: 0;' );
				}
			} else if ( windowPos < lastWindowPos ) {
				if ( bottom ) {
					bottom = false;
					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
				} else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {
					top = true;
					$sidebar.attr( 'style', 'position: fixed;' );
				}
			} else {
				top = bottom = false;
				topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
				$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
			}
		} else if ( ! top ) {
			top = true;
			$sidebar.attr( 'style', 'position: fixed;' );
		}

		lastWindowPos = windowPos;
	}

	function resizeAndScroll() {
		resize();
		scroll();
	}

	$( document ).ready( function() {
		$body          = $( document.body );
		$window        = $( window );
		$sidebar       = $( '#sidebar' ).first();
		adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;

		$window
			.on( 'scroll.twentyfifteen', scroll )
			.on( 'load.twentyfifteen', onResizeARIA )
			.on( 'resize.twentyfifteen', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( resizeAndScroll, 500 );
				onResizeARIA();
			} );
		$sidebar.on( 'click.twentyfifteen keydown.twentyfifteen', 'button', resizeAndScroll );

		resizeAndScroll();

		for ( var i = 1; i < 6; i++ ) {
			setTimeout( resizeAndScroll, 100 * i );
		}
	} );

} )( jQuery );

//  ==== 个性化代码开始 =======

(function ($) {

  $(function () {

    $('[fullscreen]').each(function() {
      $(this).css({
        width: $(window.document).width(),
        height: $(window).height()
      });
    });

    var $mainMenu = $('.home-body .main-menu');

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

  $(function () {
		function addToCart(id, url, quantity, cb) {
		  	var $window = $(window);
				if (typeof quantity == 'function') {
					cb = quantity;
					quantity = 1;
				} else {
					cb = function () {};
				}

		  	var form = new FormData();
		  	form.append('add-to-cart', id);
		  	form.append('quantity', quantity);
		  	if ($window.data('process')) {
		  		return ;
		  	}

		  	$window.data('process', true);
		  	$.ajax({
		  		url: url,
		  		cache: false,
		  		contentType: false,
		  		processData: false,
		  		type: 'POST',
		  		data: form,
		  		success: function () {
		  			$window.data('process', false);
		  			cb();
		  		}
		  	});
		  }

		  $('.directly-buy').click(function(){
		  	var id = $(this).data('id');
		  	var url = $(this).data('url');
				addToCart(id, url, function () {
					window.location.href = '/cart';
				});
		  });

		  $('.xyv2-add-to-cart').click(function() {
		  	var id = $(this).data('id');
		  	var url = $(this).data('url');
				addToCart(id, url, function () {
					alert('所购服务已成功添加购物车');
				});
		  });
  });

  $(function () {
		var $floatMenu = $('.float-menu');

		if ($floatMenu.size() <= 0) return ;

	  var top = $floatMenu.css('top').replace('px', '')*1;
	  var left = $floatMenu.css('left').replace('px', '')*1;
	  var offsetTop = $floatMenu.offset()['top'];
	  var offsetLeft= $floatMenu.offset()['left'];
		
		$floatMenu.find('li').click(function () {
			console.log({scrollTop: $('#post-' + $(this).data('id')).offset()['top']});
			$('body').stop().animate({scrollTop: $('#post-' + $(this).data('id')).offset()['top']});
		});

	  $(window).scroll(function () {
	  	var scrollTop = $(window).scrollTop();
	  	var holder = 20;
	  	if (scrollTop + 20 >= offsetTop) {
				//$floatMenu.css('transform', 'translateY(' + ( scrollTop + 20 - offsetTop ) + 'px)' );
				$floatMenu.css({
					position: 'fixed',
					top: holder + 'px',
					left: offsetLeft
				});
	  	} else {
	  		$floatMenu.removeAttr('style');
	  	}
	  }).trigger('scroll');
  });

  $(function () {
    $('input[name="woocommerce_checkout_place_order"]').click(function (event) {
      var name = $('input[name="billing_first_name"]').val();
      var email = $('input[name="billing_email"]').val();
      var phone = $('input[name="billing_phone"]').val();
      var wx = $('input[name="billing_wechat"]').val(); 

      function isEmail() {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      }

      function isPhone() {
        var re = /^(1\d{2})\d{8}/;
        return re.test(phone);
      }

      if (name.trim().length <= 0) {
        //alert('请输入姓名');
        $('input[name="billing_first_name"]').focus();
        event.preventDefault();
        return false;
      } else if (email.trim().length <= 0) {
        //alert('请输入邮箱');
        $('input[name="billing_email"]').focus();
        event.preventDefault();
        return false;
      } else if (!isEmail()) {
        //alert('请输入正确的邮箱');
        $('input[name="billing_email"]').focus();
        event.preventDefault();
        return false;
      } else if (phone.length <= 0) {
        //alert('请输入手机号码');
        $('input[name="billing_phone"]').focus();
        event.preventDefault();
        return false;
      } else if (isPhone()) {
        //alert('请输入正确的手机号码');
        $('input[name="billing_phone"]').focus();
        event.preventDefault();
        return false;
      } else if (wx.trim().length <= 0) {
        //alert('请输入微信号');
        $('input[name="billing_wechat"]').focus();
        event.preventDefault();
        return false;
      }

    });
  });

})(jQuery);

(function ($) {

  // $(function () {

  //   var height = [];
  //   var totalHeight = $(document).height();
  //   $('.float-menu').css('top','-400px');  

  //   $('.contents').each(function() {
  //     var eleHeight = parseInt($(this).offset().top);
  //     height.push(eleHeight);
  //   });
    
  //   $('.float-menu li').each(function(index){
  //     var i = index;
  //     $(this).click(function(){
  //       $(this).addClass('active').siblings().removeClass('active');
  //       $('html, body').animate({scrollTop:height[i]+'px'},500);
  //     })
  //   });

  //   $(window).scroll(function () {
  //     $('.float-menu').stop(); 
  //     var currentHeight = parseInt($(document).scrollTop());
      
  //     var floatMenuHeight = currentHeight -30;
  //     if(currentHeight<100){
  //       floatMenuHeight = currentHeight - 3000;
  //     }
  //     $('.float-menu').animate({ top: floatMenuHeight + "px" },200 );
      

  //     var scrollHeight = parseInt($(window).scrollTop());
  //       var length = height.length;
  //       for(var i in height){
  //         if(height[i] > scrollHeight+120){
  //           i = i-1;
  //           $('.float-menu li').eq(i).addClass('active').siblings().removeClass('active');
  //           break;
  //         }else{
  //           $('.float-menu li').eq(length-1).addClass('active').siblings().removeClass('active');
  //         }
  //       }

  //   });
  // });

})(jQuery);

