$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#nempresa').val() == '' ){
            errores += '<p>Escriba el nombre de su empresa</p>';
            $('#nempresa').css("border-bottom-color", "#F14B4B")
        } else{
            $('#nempresa').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Correo ==============================
        if( $('#email').val() == '' ){
            errores += '<p>Ingrese un correo</p>';
            $('#email').css("border-bottom-color", "#F14B4B")
        } else{
            $('#email').css("border-bottom-color", "#d1d1d1")
        }

        // Validado telefono ==============================
        if( $('#mov').val() == '' ){
            errores += '<p>Ingrese su teléfono</p>';
            $('#mov').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mov').css("border-bottom-color", "#d1d1d1")
        }
        

        // Validado Mensaje ==============================
        if( $('#mensaje').val() == '' ){
            errores += '<p>Escriba un mensaje</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }
        
        // ENVIANDO MENSAJE ============================
        if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
                                        '<h3>Errores encontrados</h3>'+
                                        errores+
                                        '<span id="btnClose">Cerrar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function(){
            $('.modal_wrap').remove();
        });
    });

});
