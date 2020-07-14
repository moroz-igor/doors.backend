$(".change_cart").click(function () {
    var id_cart = $(this).attr("data-id");
        var input_id = '#sum_'+id_cart;
            var params = {
                id_cart: $(this).attr("data-id"),
                input_id: '#sum_'+id_cart,
                sum: $(input_id).val(),
                price: $("#price_"+id_cart).html(),
            }
    $.post("/cart/changeCart/"+id_cart, params, function (data) {
        $("#newProba").html(data);
            $("#prev_number_"+id_cart).css('display', 'none');
                $("#new_number_"+id_cart).html(data);
    });
return false;
});
