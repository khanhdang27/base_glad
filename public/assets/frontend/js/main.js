$(document).ready(function () {
    $(document).on('click', 'li.dropdown-item', function () {
        window.location.href = $(this).find('a').attr('href');
    });


    /*** Nav Scroll ***/
    var navbar = $('.nav-scroll');
    $(window).scroll(function () {
        if ($(window).scrollTop() <= 300) {
            navbar.addClass('d-md-none');
        } else {
            navbar.removeClass('d-md-none');
        }
    });
    $(window).click(function (event) {
        var clickover = $(event.target);
        if($('#navbar-scroll-content').hasClass('show') && !clickover.hasClass("navbar-toggler")){
            $('#navbar-scroll-btn').click();
        }
    });

    /*** Button Close ***/
    $(document).on('click', '.close', function () {
        console.log($(this).hasClass('close-hide'));
        if ($(this).hasClass('close-hide')) {
            if ($(this).parents('.selector-close').length > 0) {
                $(this).parents('.selector-close').addClass('d-none')
            } else {
                $(this).parent('div').addClass('d-none');
            }
        } else {

            if ($(this).parents('.selector-close').length > 0) {
                $(this).parents('.selector-close').remove()
            } else {
                $(this).parent('div').remove()
            }
        }
    });


    /*** Back to top ***/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 100);
        return false;
    });


    /*** Handle input > 0 ***/
    $(document).on('keypress', '.range-quantity input', function (event) {
        if (event.key === '-') {
            event.preventDefault();
        }
    });

    $(document).on('change', '.range-quantity input', function () {
        var value = $(this).val();
        if (value === "" || parseInt(value) <= 0) {
            $(this).val(1)
        }
    });


    $('.select2').select2();
});