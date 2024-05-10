function validate(){
    var titulo = document.getElementById("titulo").value;
    var descripcion = document.getElementById("descripcion").value;
    var imagenSplitted = document.getElementById("imagen").value.split(".");
    var imagen = imagenSplitted[imagenSplitted.length-1];
    
    if(titulo.length > 10){
        mensajeError("titulo lenght mayor que 10");
        return false;
    }
    if(descripcion.length > 30){
        mensajeError("Descripcion lenght mayor que 30");
        return false;
    }
    if(imagen != "png" && imagen != "jpg"){
        mensajeError("Formato de imagen inadecuado");
        return false;
    }
    console.log("Todo bien");
    return true;

}

function mensajeError(mensaje){
    var alerta  = document.getElementById("alerta");
    alerta.textContent = mensaje;
    alerta.style.opacity = "100%";
    setTimeout(function(e){
        alerta.style.opacity ="0%";
    },3500);
    
}