'use strict';
/**
* this script showing the special alert during query execution
**/
const FIELD_NUMBER = 4;
$(document).ready(function() {
    var completedForm = function()
    {
        var _forms_id = new Array();
        var counter = 0;
        $('.form-control').each(function (index, value){
            if($(this).val())
            {
                _forms_id[counter] = $(this).attr('id');
            }
            counter++;
        });
        return _forms_id;
    }
    if(completedForm().length > FIELD_NUMBER - 1) $('#_order-send').removeClass('hidden');

    var verify = function (){
            var result;
            var _full_form = completedForm();
            $('.form-control').focus(function(){
                if(completedForm().length < FIELD_NUMBER)
                {
                    for (var i = 0; i < 4; i++)
                    {
                        var _exist = false;
                        if(_full_form[i] === $(this).attr('id'))
                        {
                            _exist = true;
                            break;
                        }
                    }
                    if( !_exist ) var _new_form = _full_form.push($(this).attr('id'));
                    if(_new_form === FIELD_NUMBER)
                    {
                        $('#_order-verify').removeClass('hidden');
                        $('#_order-send').addClass('hidden');
                    }
                }
            });
            $('#_order-verify').click(function(){
                for (var i = 0; i < 5; i++) {
                    result = $('.help-block').text();
                    $('#_order-send').removeClass('hidden');
                    $(this).addClass('hidden');
                }
            });
            $('#_order-send').click(function(){
                for (var i = 0; i < 5; i++) {
                    result = $('.help-block').text();
                    if(result.length)
                    {
                        $('#_order-verify').removeClass('hidden');
                        $(this).addClass('hidden');
                    }
                    else{
                        $('#_weit').removeClass('hidden');
                        $('#_order-form').addClass('hidden');
                    }
                }
            });
    }();

});
