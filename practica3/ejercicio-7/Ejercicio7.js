"use strict";
class Ejercicio7 {
    constructor(){};

    ocultar() {
        $("p").hide();
    }

    mostrar() {
        $("p").show();
    }

    modificar() {
        $("h1").text("Ejercicio 7 - Modificado");
    }

    añadir() {
        $("h2").after("<p>Este párrafo se ha añadido</p>");
    }

    eliminar() {
        $("h3").remove();
    }

    info() {
        $("*", document.body).each(function() {
            var etiquetaPadre = $(this).parent().get(0).tagName;
            $(this).prepend(document.createTextNode("Etiqueta padre: <" + etiquetaPadre + "> elemento : <" + $(this).get(0).tagName + "> valor: "));
        });
    };

    sumaTabla() {
        var cont = 0;
        $("table td").each(function() {
            cont++;
        });
        $("table").after("<p>La tabla tiene " + cont + " elementos");
    };
}

var ej7 = new Ejercicio7();
