function manage_cart(pid, type) {
    if(type=='update'){
        var qty = $("#"+pid+"qty").val();
    }
    else{
        var qty = $("#qty").val();
    }
    $.ajax({
        url: 'manage_cart.php',
        type: 'POST',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            if(type=='update' || type=='remove'){
                window.location.href='cart.php';
            }
            $('.cart_count').html(result);
        }
    });
}