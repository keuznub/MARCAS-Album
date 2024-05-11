
var imagenCargar = document.getElementById("imagenCargar");
var descripcion = document.getElementById("descripcion");
var idInput = document.getElementById("idInput");
var titulo = document.getElementById("titulo");



document.addEventListener("DOMContentLoaded", function () {
    var alerta = document.getElementById("alerta");
    if (alerta != null) {
        alerta.style.opacity = "100%";
        setTimeout(function (e) {
            alerta.style.opacity = "0%";
        }, 3500);
        history.replaceState({}, "", "index.php");

    }

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
        var botonDelete = element.querySelector(".delete");
        var elementNuevo;
        botonView.addEventListener("click", function (e) {
            var descripcionElementHTML = element.querySelector(".descripcion");
            var titleElementHTML = element.querySelector(".titulo");

            imagenCargar.src = imagen.src;
            titulo.innerHTML = titleElementHTML.innerHTML;
            descripcion.innerHTML = descripcionElementHTML.textContent;
            if(descripcionElementHTML.value!=null){
                descripcion.innerHTML = descripcionElementHTML.value;
            }
        })
        botonEdit.addEventListener("click", function (e) {
            
            botonEdit.disabled = "true";
            var descripcionElementHTML = element.querySelector(".descripcion");
            var input = document.createElement("textarea");
            input.name = "descripcion";
            input.classList.add("form-control","descripcion");
            input.style.height = "100px;";
            input.style.marginBottom = "5px";
            input.value = descripcionElementHTML.textContent.trimStart();
            descripcionElementHTML.replaceWith(input);
            botonAcept.style.display = "block";
            elementNuevo = input;
        })
        botonAcept.addEventListener("click", function (e) {
            botonEdit.disabled = "false";
            guardarPosicionScroll();
            
        });
        
        /*
        botonAcept.addEventListener("click", function (e) {
            var cardId = element.getAttribute("cardId");
            console.log(cardId);
            botonAcept.style.display = "none";
            var parrafo = document.createElement("p");
            parrafo.classList.add("card-text", "descripcion");
            parrafo.textContent = elementNuevo.value;
            elementNuevo.replaceWith(parrafo);
            updateCard(cardId,elementNuevo.value);
        })
        */
        botonDelete.addEventListener("click", function (e) {
            var cardId = element.getAttribute("cardId");
            idInput.value = cardId;
            console.log(idInput.value);
        })

    });
});



function mensajeError(mensaje) {
    var alerta = document.getElementById("alerta");
    alerta.textContent = mensaje;
    alerta.style.opacity = "100%";
    setTimeout(function (e) {
        alerta.style.opacity = "0%";
    }, 3500);

}


// Función para guardar la posición de desplazamiento en el almacenamiento local
//CHATGEPETEADA DE MANUAL
function guardarPosicionScroll() {
    localStorage.setItem("scrollPosition", window.scrollY);
}

// Verificar si hay una posición de desplazamiento guardada al cargar la página
//CHATGEPETEADA DE MANUAL
window.addEventListener("load", function() {
    var scrollPosition = localStorage.getItem("scrollPosition");
    if (scrollPosition !== null) {
        // Restaurar la posición de desplazamiento guardada
        window.scrollTo(0, parseInt(scrollPosition));
        // Limpiar la posición de desplazamiento guardada después de restaurarla
        localStorage.removeItem("scrollPosition");
    }
});


