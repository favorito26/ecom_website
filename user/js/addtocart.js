function manage_cart(pid, type) {
    var qty = $("#qty").val() || 1;
    $.ajax({
        url: 'manage_cart.php',
        type: 'POST',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            $('.cart_count').html(result);
        }
    });
}