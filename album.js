
var imagenCargar = document.getElementById("imagenCargar");
var descripcion = document.getElementById("descripcion");
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
            input.style.marginBottom = "5px";
            input.value = descripcionElementHTML.textContent.trimStart();
            descripcionElementHTML.replaceWith(input);
            botonAcept.style.display = "block";
            elementNuevo = input;
        })
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


function updateCard(cardId, descripcionNueva) {
    const mysql = require('mysql');
    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'albumdatabase'
    });

    connection.connect(function (err) {

        if (err) throw err;
        var sql = "UPDATE albumtable SET description = '" + descripcionNueva + "' WHERE id = '" + cardId + "'";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log(result.affectedRows + " record(s) updated");
        });
    });

}
