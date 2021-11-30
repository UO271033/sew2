"use strict";
class Bitcoin {

    constructor() {
        this.url = "https://financialmodelingprep.com/api/v3/quote/BTCUSD?apikey=d20dfb07911df221a72ce4f2d7c423fb";
    }

    cargarDatos() {
        $.getJSON(this.url, {
            format: "json"
        }).done(function (datos) {
            $("section").remove();
            $.each(datos, function(c, coin) {
                var stringDatos = "<section>";
                    stringDatos += "<h2>" + coin.name + "</h2>";
                    stringDatos += "<ul><li>Precio USD: " + coin.price + "</li>";
                    stringDatos += "<li>Mínimo del día: " + coin.dayLow + "</li>";
                    stringDatos += "<li>Máximo del día: " + coin.dayHigh + "</li>";
                    stringDatos += "<li>Diferencia absoluta del dia: " + (coin.dayHigh - coin.dayLow) + "</li>";
                    if (coin.change < 0) {
                        stringDatos += "<li>El precio de la moneda está bajando, hoy bajó " + (coin.change * -1) + " USD</li>";
                    } else {
                        stringDatos += "<li>El precio de la moneda está subiendo, hoy subió " + coin.change + " USD</li>"
                    }
                    stringDatos += "<li>Mínimo del año: " + coin.yearLow + "</li>";
                    stringDatos += "<li>Máximo del año: " + coin.yearHigh + "</li>";
                    stringDatos += "<li>Diferencia absoluta del año: " + (coin.yearHigh - coin.yearLow) + "</li></ul>";
                    stringDatos += "</section>";
                
                $("body").append(stringDatos);
            })
        })
    }
}

var bitcoin = new Bitcoin();