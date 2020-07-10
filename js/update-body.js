function change_background()
{
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();
    console.log(hora+":"+minuto+":"+segundo);
    if(minuto==36)
    {
    document.body.style.backgroundImage = "linear-gradient(to bottom right, rgba(215, 155, 55,0.6) , rgba(151, 51, 255,0.6))";
    }
    setTimeout("change_background()",1000)
}