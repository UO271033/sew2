// m+ -> memoria + pantalla
// m- -> memoria - pantalla
// el resultado de ambas de guarda en la memoria
// mrc -> muestra el valor de memoria en la pantalla
"use strict";
class Calculadora {
    
    constructor() {
        this.memoria = new Number(0);
        this.pantalla = "";
        this.pulsaTecla();
    }

    muestraPantalla() {
        document.getElementById("pantalla").value = this.pantalla;
    }

    pulsaNumero(a) {
        this.pantalla += a;
        this.muestraPantalla();
    }

    pulsaTecla() {
        document.addEventListener("keydown", (event) => {
            if (!isNaN(event.key)) {
                this.pulsaNumero(event.key);
            }
            else {
                switch (event.key) {
                    case "+":
                        this.suma();
                        break;
                    case "-":
                        this.resta();
                        break;
                    case "*":
                        this.mul();
                        break;
                    case "/":
                        this.div();
                        break;
                    case ".":
                        this.punto();
                        break;
                    case "c":
                        this.cero();
                        break
                    case "Enter":
                        this.calcular();
                        break;
                }
            }    
        })
    }

    suma() {
        this.pantalla += "+";
        this.muestraPantalla();
    }

    resta() {
        this.pantalla += "-";
        this.muestraPantalla();
    }

    mul() {
        this.pantalla += "*";
        this.muestraPantalla();
    }

    div() {
        this.pantalla += "/";
        this.muestraPantalla();
    }

    punto() {
        this.pantalla += ".";
        this.muestraPantalla();
    }

    mrc() {
        this.pantalla = this.memoria.toString();
        this.muestraPantalla();
    }

    sumamem() {
        var result = new Number(this.memoria + eval(this.pantalla));
        this.memoria = result;
        this.pantalla = result.toString();
        this.muestraPantalla();
    }

    restamem() {
        var result = new Number(this.memoria - eval(this.pantalla));
        this.memoria = result;
        this.pantalla = result.toString();
        this.muestraPantalla();
    }

    cero() {
        this.pantalla = "0";
        this.muestraPantalla();
        this.pantalla = "";
    }

    calcular() {
        var result = eval(this.pantalla);
        this.memoria = result;
        this.pantalla = result.toString();
        this.muestraPantalla();
    }
}

var calculadora = new Calculadora();