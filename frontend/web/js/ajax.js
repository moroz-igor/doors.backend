$(document).ready(function(){
    const _SRC = '/frontend/web/'; // server
    /** -------------    Ajax query for adding to cart  ------------------------------------ **/
        function addStatusButton(){
            return _addStatusButton = false
        };
        var _addStatusButton = addStatusButton();
    $('._add-cart').on('click', function(e){
            e.preventDefault();
            var width = +$(this).attr("data-width");
                var id = $(this).data('id');
        /**
        *   if width exist and  it has chosen, it means that's  doors - send ajax query
        *   or
        *   if width not exist and width has not chosen, that is not a door,
        *   that's another product - we send ajax query
        **/
        console.log(id);
        if (_addStatusButton && width || !width && !_addStatusButton) {
            $.ajax({
                url: _SRC+'basket/add',
                data: {
                    id: id,
                    width: width
                },
                type: 'GET',
                beforeSend: function(){
                    $('._add-cart').addClass('disabled');
                },
                success: function(res){
                    if(!res) alert('INCORRECT QUYRY!  НЕКОРЕКТНИЙ ЗАПИТ!');
                        $('._add-cart').removeClass('disabled');
                            $('#_ordered-' + id).css('display', 'block');
                        _cart_qty =  $('#cart_qty').text();
                            $('#cart_qty').text(+_cart_qty + 1);
                            $('._cart-overall-amount').text(+_cart_qty + 1);
                            $('._added-alert')
                            .text('Додано в кошик [ id ' + id + ' ширина ' + width + ']')
                            .css('color', 'green')
                            .hide()
                            .show(300);
                },
                error: function(){
                    alert('ERROR!');
                }
            });
        }
        /** if exist width, but it has been not chosen - display alert **/
            if(!_addStatusButton && width)
            {
                alert("Виберіть ширину дверей!");
                location.reload();
            }
        });
    /** -------------     Get width of doors from radio-buttons    ------------------------ **/
        $('input[name=width-door]').click(function(evenObject){
            var _widthDoor = $(this).attr('value');
                var _href = $('._add-cart').attr('href');
            var _result_href = _href.substr(0, _href.length - 2) + _widthDoor;
                $('._add-cart').attr('href', _result_href);
                $('._add-cart').attr('data-width', _widthDoor);
                 _addStatusButton = true;
        });

    if(history.state)
    {
        location.reload();
        history.pushState(false, null);
    }
    /*
    * changing value of checkboxes for complect and doorstep
    */
    function changeValue(val)
    {
        (+$(val).attr('value') !== 1) ? $(val).attr('value', 1) : $(val).attr('value', 0);
    }
            $('#_doorstep').click(function(){ changeValue('#_doorstep');
                history.pushState(true, null); });
            $('#_complect').click(function(){ changeValue('#_complect');
                history.pushState(true, null); });
    function widthDefinition(param)
    {
        if(!param) return false;
        var width = param.substr(0, 3);
        (isNaN(+width[2]) && !Number.isInteger(width[2])) ? width = +width.substr(0, 2) : width = +width;
        return width;
    }
    /*
    * ajax query for adding to cart the elements of the doorway
    */
    $('#doorway').on('click', function(event){
        event.preventDefault();
        var param = $('#_param_doorway').val();
        var doorstep = $('#_doorstep').val();
        var complect = $('#_complect').val();
        var id = $('input[name=_id_product]').val();
        var width = widthDefinition(param);
        $.ajax({
            url: _SRC+'basket/addextra',
            data: {
                id: id,
                param: param,
                width: width,
                doorstep: doorstep,
                complect: complect
            },
            type: 'GET',
            beforeSend: function(){
                $('#doorway').attr('disabled', 'disabled');
            },
            success: function(res){
                if(!res) alert('INCORRECT QUYRY!  НЕКОРЕКТНИЙ ЗАПИТ!');
                else{
                    _cart_qty =  +$('#_doorway-qty').text();
                        $('#_doorway-container').css('display', 'inline');
                        $('#_doorway-qty').text(_cart_qty)
                        $('#_doorway-qty').text(+_cart_qty + 1);
                }
                $('#doorway').removeAttr('disabled');
            },
            error: function(){
                alert('ERROR!');
            }
        });
    });
    $('#_add_jamb').on('click', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: _SRC+'basket/jambadd',
            data: {
                id: id
            },
            type: 'GET',
            beforeSend: function(){
                $('#_add_jamb').addClass('disabled');
            },
            success: function(res){
                if(!res) alert('INCORRECT QUYRY!  НЕКОРЕКТНИЙ ЗАПИТ!');
                else{
                    _cart_qty =  +$('#_jamb-qty').text();
                        $('#_jamb-container').css('display', 'inline');
                        $('#_jamb-qty').text(_cart_qty)
                        $('#_jamb-qty').text(+_cart_qty + 1);
                }
                $('#_add_jamb').removeClass('disabled');
				console.log(res);
            },
            error: function(){
                alert('ERROR!');
            }
        });
    });
    $('#_add_board').on('click', function(event){
        event.preventDefault();
        var id =  $('input[name=_id_product]').val();
        var param = $('#_board-param').val();
        var width = widthDefinition(param);
        $.ajax({
            url: _SRC+'basket/addboard',
            data: {
                id: id,
                width: width
            },
            type: 'GET',
            beforeSend: function(){
                $('#_add_board').attr('disabled', 'disabled');
            },
            success: function(res){
                if(!res) alert('INCORRECT QUYRY!  НЕКОРЕКТНИЙ ЗАПИТ!');
                else
                {
                _cart_qty =  +$('#_board-qty').text();
                    $('#_board-container').css('display', 'inline');
                    $('#_board-qty').text(_cart_qty)
                    $('#_board-qty').text(+_cart_qty + 1);
                }
                $('#_add_board').removeAttr('disabled', 'disabled');
            },
            error: function(){
                alert('ERROR!');
            }
        });
    });

});
