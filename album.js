
var imagenCargar = document.getElementById("imagenCargar");
var descripcion = document.getElementById("descripcion");
var titulo = document.getElementById("titulo");



document.addEventListener("DOMContentLoaded", function () {
    var alerta  = document.getElementById("alerta");
    alerta.style.opacity = "100%";
    setTimeout(function(e){
        alerta.style.opacity ="0%";
    },3500);
    history.replaceState({},"", "index.php");

    var cards = document.querySelectorAll(".card");
    var cardsArray = Array.from(cards);
    console.log(cardsArray);
    cardsArray.forEach(element => {
        var botonView = element.querySelector(".view");
        var botonEdit = element.querySelector(".edit");
        var imagen = element.querySelector(".image");
        var descripcionElement = element.querySelector(".descripcion").innerHTML;
        var descripcionElementHTML = element.querySelector(".descripcion");
        var botonAcept = element.querySelector(".acept");
        var elementNuevo;
        botonView.addEventListener("click", function (e) {
            var descripcionElementHTML = element.querySelector(".descripcion");
            var titleElementHTML = element.querySelector(".titulo");

            imagenCargar.src = imagen.src;
            titulo.innerHTML = titleElementHTML.innerHTML;
            descripcion.innerHTML = descripcionElementHTML.innerHTML;
        })
        botonEdit.addEventListener("click", function (e) {
            var descripcionElementHTML = element.querySelector(".descripcion");
            var input = document.createElement("textarea");
            input.classList.add("form-control");
            input.style.height = "100px;";
            input.style.marginBottom ="5px";
            input.value = descripcionElementHTML.textContent.trimStart();
            descripcionElementHTML.replaceWith(input);
            botonAcept.style.display = "block";
            elementNuevo = input;
        })
        botonAcept.addEventListener("click", function(e) {
            botonAcept.style.display = "none";
            var parrafo = document.createElement("p");
            parrafo.classList.add("card-text", "descripcion");
            parrafo.textContent = elementNuevo.value;
            elementNuevo.replaceWith(parrafo);
        })

    });
});



function mensajeError(mensaje){
    var alerta  = document.getElementById("alerta");
    alerta.textContent = mensaje;
    alerta.style.opacity = "100%";
    setTimeout(function(e){
        alerta.style.opacity ="0%";
    },3500);
    
}



