$(document).on('submit','#contacto', function(event){
	event.preventDefault();
    $.ajax({
            url: 'php/contacto.php',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize()
        })
        .done(function(xx) {
            if (xx.res == 1) {
                //window.location='Doctor/';
                alert("Correo Enviado");
            } else if (xx.res == 1) {
                //window.location='Doctor/';
                alert("Correo No Enviado");
            }
        })
        .fail(function(res) {
            console.log(res);
        })

})