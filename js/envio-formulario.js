function send_form() {
    var logo = document.getElementsByName("logo");
    var sectoredad = document.getElementsByName("sectoredad");
    var slogan = document.getElementsByName("slogan");
    var log;
    var sec;
    var slo;
    console.log("Aqui");
    for (var i = 0; i < logo.length; i++) {
        if (logo[i].type == "radio") {
            if (logo[i].checked == true) {
                //alert(logo[i].value+" Ok")
                log = logo[i].value;
            }
        }
    }
    for (var i = 0; i < sectoredad.length; i++) {
        if (sectoredad[i].type == "radio") {
            if (sectoredad[i].checked == true) {
                //alert(sectoredad[i].value+" Ok")
                sec = sectoredad[i].value;
            }
        }
    }
    for (var i = 0; i < slogan.length; i++) {
        if (slogan[i].type == "radio") {
            if (slogan[i].checked == true) {
                //alert(slogan[i].value+" Ok")
                slo = slogan[i].value;
            }
        }
    }
    var email = document.getElementById("email").value;
    var nombre = document.getElementById("nombre").value;
    var actividades = document.getElementById("actividades").value;
    var file = "cd"; //document.getElementById("file").value;
    $.ajax({
            url: 'php/envio-formulario.php',
            type: 'post',
            dataType: 'json',
            data: { email: email, nombre: nombre, actividades: actividades, logo: log, sectoredad: sec, slogan: slo, file: file },
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
}