$(document).ready(function () {

    $("#promo_selected").change(function () {

        var price = $(this).find(':selected').data("price");
        $('#amount').val(price);
    });
});
