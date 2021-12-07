

/*** Button Cart ***/
$(document).on('click', '#cart-icon, #cart-icon-mobile', function () {
    $(document).find('#cart-box').removeClass('d-none');
});

/*** Increase Quantity ***/
$(document).on('click', 'button.increase', function () {
    var input = $(this).parents('.range-quantity').find('input');
    var value = parseInt(input.val(), 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.val(value);
});

/*** Decrease Quantity ***/
$(document).on('click', 'button.decrease', function () {
    var input = $(this).parents('.range-quantity').find('input');
    var value = parseInt(input.val(), 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if (value > 0){
        input.val(value);
    }
});