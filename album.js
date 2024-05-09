var cards = document.querySelectorAll(".card");
var cardsArray = Array.from(cards);
var imagenCargar = document.getElementById("imagenCargar");
var descripcion = document.getElementById("descripcion");


document.addEventListener("DOMContentLoaded", function () {
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
            imagenCargar.src = imagen.src;
            descripcion.innerHTML = descripcionElementHTML.innerHTML;
        })
        botonEdit.addEventListener("click", function (e) {
            var descripcionElementHTML = element.querySelector(".descripcion");
            var input = document.createElement("textarea");
            input.rows = 3;
            input.classList.add("form-control");
            input.value = descripcionElementHTML.innerHTML;
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



