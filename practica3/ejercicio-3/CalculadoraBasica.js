// m+ -> memoria + pantalla
// m- -> memoria - pantalla
// el resultado de ambas de guarda en la memoria
// mrc -> muestra el valor de memoria en la pantalla
"use strict";
class Calculadora {
    
    constructor() {
        this.memoria = new Number(0);
        this.pantalla = "";
        this.ultimoNumero = new Number(0);
        this.pulsaTecla();
    }

    muestraPantalla() {
        document.getElementById("pantalla").value = this.pantalla;
    }

    pulsaNumero(a) {
        this.pantalla += a;
        this.ultimoNumero = new Number(eval(this.pantalla));
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
        this.ultimoNumero = new Number(0);
        this.muestraPantalla();
    }

    resta() {
        this.pantalla += "-";
        this.ultimoNumero = new Number(0);
        this.muestraPantalla();
    }

    mul() {
        this.pantalla += "*";
        this.ultimoNumero = new Number(0);
        this.muestraPantalla();
    }

    div() {
        this.pantalla += "/";
        this.ultimoNumero = new Number(0);
        this.muestraPantalla();
    }

    punto() {
        this.pantalla += ".";
        this.muestraPantalla();
    }

    mrc() {
        this.pantalla = this.memoria.toString();
        this.muestraPantalla();
        this.ultimoNumero = new Number(eval(this.pantalla));
        this.pantalla = "";
    }

    sumamem() {
        var result = new Number(this.memoria + eval(this.pantalla));
        this.memoria = result;
        this.pantalla = result.toString();
        this.muestraPantalla();
        this.ultimoNumero = new Number(eval(this.pantalla));
        this.pantalla = "";
    }

    restamem() {
        var result = new Number(this.memoria - eval(this.pantalla));
        this.memoria = result;
        this.pantalla = result.toString();
        this.muestraPantalla();
        this.ultimoNumero = new Number(eval(this.pantalla));
        this.pantalla = "";
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
        this.ultimoNumero = new Number(eval(this.pantalla));
        this.pantalla = "";
    }
}

var calculadora = new Calculadora();