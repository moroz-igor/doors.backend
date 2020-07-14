'use strict'
/*
* Disabling of sending data by press key "Enter"
*/
$(document).ready(function() {
      $('form').keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
      }
   });
});
/*
* Preventions doable sending
* Hide form and button, during data send
*/
var Preventions = function (_hint){
    this.hint = _hint;
};
    Preventions.prototype.preventionsStart = function(id_form){
        var _hint = this.hint;
        $(document).ready(function() {
            function showChekButton(id_form_input){
                $(id_form_input).focus(function(){
                    $('#_check-email').removeClass('hidden').hide().show(300);
                    $('#_send-email').addClass('hidden');
                });
            }
            function changeElements(id_hide, id_show)
            {
                $(id_hide).addClass('hidden');
                $(id_show).removeClass('hidden').hide().show(300);
            }
            function check(id_form_input)
            {
                $('#_check-email').click(function(){
                    var _validate =  $(id_form_input).attr('aria-invalid');
                    $(_hint).removeClass('hidden').hide().show(300);
                    if(_validate === 'false')
                    {
                        changeElements('#_check-email', '#_send-email');
                        $(_hint).addClass('hidden');
                    }
                });
            }
            function send(id_form_input)
            {
                $('#_send-email').click(function(){
                    var _validate =  $(id_form_input).attr('aria-invalid');
                    if(_validate === "true"){
                        changeElements('#_send-email', '#_check-email');
                    }else{
                        $('#_form-send-data').addClass('hidden');
                        $('#_weit').removeClass('hidden');
                    }
                });
            }
            function run(id)
            {
                showChekButton(id);
                check(id);
                send(id);
            }
            run(id_form);
        });
    };
    var send  = new Preventions('#_hint-send');
    var reset = new Preventions('#_hint-reset');
        send.preventionsStart('#sendemailform-email');
        reset.preventionsStart('#resetpasswordform-password');
