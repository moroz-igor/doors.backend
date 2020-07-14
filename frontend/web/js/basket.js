'use strict';
$(document).ready(function() {
    const _SRC = '/frontend/web/'; // server
    /* hide and show the buttons of sensing the data number of products */
    /* variation this number by inserting a value into the form */
var variationNumberByFormInsert = function()
    {
        let _prodoct_num = 0;
        $('input[name=_basket-num]').on('focus', function(){
            var _class = $(this).attr('class');
            var _id = _class.substr(12);
            $('#aplus-'+_id).addClass('hidden');
            $('#minus-'+_id).addClass('hidden');
            $('#_button-insert-'+_id).removeClass('hidden');
            _prodoct_num = +$('._basket-num-'+_id).val();
        });
        $('input[name=_basket-num]').on('blur', function(){
            var _class = $(this).attr('class');
            var _id = _class.substr(12);
                $('#aplus-'+_id).removeClass('hidden');
                $('#minus-'+_id).removeClass('hidden');
                $('#_button-insert-'+_id).addClass('hidden');
            var _num_blur = +$('._basket-num-'+_id).val();
            if(!Number.isInteger(_num_blur) || _num_blur < 1)
            {
                $('._basket-num-'+_id).val(_prodoct_num);
                alert('Значення має бути цілочисельним числом!');
                return false;
            }
            if(_num_blur !== _prodoct_num)
            {
                var _sum = +$('#_cart-sum-'+_id).text();
                var _qty = +$('._basket-num-'+_id).val();
                var _arr = $('#_button-insert-'+_id).val();
                $.ajax({
                    url: _SRC+'basket/formvariation',
                    data: {
                        id: _id,
                        qty: _qty,
                        sum: _sum,
                        arr: _arr,
                    },
                    type: 'GET',
                    beforeSend: function(){
                        $('input[name=_basket-num]').attr('disabled', 'disabled').
                        css('opacity', '0.2');
                    },
                    success: function(res){
                        var _cart_qty = +$('#_cart-qty').text();
                        var result_num = _cart_qty + _qty - _prodoct_num;
                        var _price = +$('#_price-'+_id).text();
                        var _sum_element = _price * _qty;
                        var _prev_overall_sum = +$('#_cart-overall-sum').text();
                        var _res_overall_sum = _prev_overall_sum + _sum_element - _sum;
                        $('#_cart-qty').text(result_num);
                        $('#cart_qty').text(result_num);
                        $('#_cart-sum-'+_id).text(_sum_element);
                        $('._cart-overall-sum').text(_res_overall_sum);
                        $('input[name=_basket-num]').removeAttr('disabled').css('opacity', '1');
                    },
                    error: function(){
                        alert('ERROR!');
                    }
                });
            }
        });
    }();
    /** variation  this number of the product in the cart **/
    $('._basket-amount').click(function(){
        var arr = $(this).val();
        var id_product = $(this).attr('id');
        var id = id_product.substr(6);
        var trend = id_product.substr(0,5);
        var sum = +$('#_cart-sum-'+id).text();
        var qty = +$('._basket-num-'+id).val();
        $.ajax({
            url: _SRC+'basket/variation',
            data: {
                id: id,
                qty: qty,
                sum: sum,
                trend: trend,
                arr: arr,
            },
            type: 'GET',
            beforeSend: function(){
                $('#'+id_product).attr('disabled', 'disabled');
            },
            success: function(res){
                var _cart_qty = +$('#_cart-qty').text();
                var _price = +$('#_price-'+id).text();
                var _cart_sum = +$('#_cart-overall-sum').text();
                    _cart_qty =  +$('#cart_qty').text();
                if(trend === 'aplus')
                {
                    $('._basket-num-'+id).val(++qty);
                    $('#_cart-qty').text(++_cart_qty);
                    $('#cart_qty').text(_cart_qty);
                    $('#_cart-sum-'+id).text(sum + _price);

                    $('._cart-overall-sum').text(_cart_sum + _price);
                }
                if(trend === 'minus' && qty > 1)
                {
                    $('._basket-num-'+id).val(--qty);
                    $('#_cart-qty').text(--_cart_qty);
                    $('#cart_qty').text(_cart_qty);
                    $('#_cart-sum-'+id).text(sum - _price);

                    $('._cart-overall-sum').text(_cart_sum - _price);
                }
                $('#'+id_product).removeAttr('disabled');
            },
            error: function(){
                alert('ERROR!');
            }
        });
    });
    /** deleting the product from the cart **/
    $('._delete-cart-element').on('click', function(){
        var id = $(this).attr('id');
        var qty = +$('._basket-num-'+id).val();
        var sum = +$('#_cart-sum-'+id).text();
            if(!sum){alert('EROR! THIS ID HAS NOT EXIST!');location.reload();}
        var arr = $(this).attr('name');
        $.ajax({
            url: _SRC+'basket/delete',
            data: {
                id: id,
                qty: qty,
                sum: sum,
                arr: arr,
            },
            type: 'GET',
            beforeSend: function(){
                $(id).attr('disabled', 'disabled');
            },
            success: function(res){
                var _cart_qty = $('#_cart-qty').text();
                    $('#_cart-qty').text(+_cart_qty - qty);
                _cart_qty =  $('#cart_qty').text();
                    $('#cart_qty').text(+_cart_qty - qty);
                var _cart_sum = +$('#_cart-overall-sum').text();
                    $('._cart-overall-sum').text(+_cart_sum - sum);
                    $('#_cart-element-'+id).css('display', 'none');
            },
            error: function(){
                alert('ERROR!');
            }
        });
    });
});
