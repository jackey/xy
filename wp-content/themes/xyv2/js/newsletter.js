(function($) {
  $(function () {

    function validateEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
      return regex.test(email);
    }

    $('.newsletter-box')
      .find('button')
      .click(function () {
        var email = $(this).siblings('input').val();
        if (email.trim().length <= 0) return ;
        if (!validateEmail(email)) {
          alert('邮箱地址不正确');
        } else {
          var data = {
            action: 'user_register_newsletter',
            mail: email,
          };
          $.post(xy_ajax_object.ajaxurl ,data ,function (response) {
            console.log(response);
          });
        }
      });
  });
})(jQuery);