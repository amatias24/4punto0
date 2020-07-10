function change_background()
{
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();
    console.log(hora+":"+minuto+":"+segundo);
    console.log(segundo%10);
    if(segundo%10==0)
    {
    document.body.style.backgroundImage = "linear-gradient(to bottom right, rgba(215, 155, 55,0.6) , rgba(151, 51, 255,0.6))";
    }
    else{
        document.body.style.backgroundImage = "linear-gradient(to bottom right, rgb(0, 0, 0) , rgb(89, 89, 255))";
    }
    setTimeout("change_background()",1000)
}