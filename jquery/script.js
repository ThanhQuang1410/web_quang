$(document).ready(function () {
    $('.sign_in').click(function () {
        $('.pop_up').addClass('active');
        $('.exit').click(function (e) {
            $('.pop_up').removeClass('active');
        });
    });


    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('header').addClass('sticky_top');
        } else {
            $('header').removeClass('sticky_top');
        }
    });
    
    $('.user').click(function(){
        $('.user_edit').addClass('active');
        $('.product_edit').removeClass('active');
    });
    $('.pro').click(function(){
        $('.product_edit').addClass('active');
        $('.user_edit').removeClass('active');
    });
});
