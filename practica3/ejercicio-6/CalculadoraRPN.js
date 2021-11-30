"use strict";
class CalculadoraRPN {

    constructor() {
        this.pantalla = "";
        this.numeros = "";
        this.pila = new Array();
        this.cambio = false;

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
                        this.enter();
                        break;
                }
            }    
        })
    }

    enter() {
        this.pila.push(this.pantalla);
        this.pantalla = "";
        this.muestraPantalla();
        this.mostrarPila();
    }

    mostrarPila() {
        this.numeros = "";
        for (var i = 0; i < this.pila.length; i++) {
            this.numeros += this.pila.length - i + ": " + this.pila[i] + "\n";
        }
        document.getElementById("numeros").value = this.numeros;
    }

    punto() {
        this.pantalla += ".";
        this.muestraPantalla();
    }

    suma() {
        if (this.pila.length >= 2) {
            var a = this.pila.pop();
            var b = this.pila.pop();
            var result = parseFloat(a) + parseFloat(b);
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    resta() {
        if (this.pila.length >= 2) {
            var a = this.pila.pop();
            var b = this.pila.pop();
            var result = parseFloat(a) - parseFloat(b);
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    mul() {
        if (this.pila.length >= 2) {
            var a = this.pila.pop();
            var b = this.pila.pop();
            var result = parseFloat(a) * parseFloat(b);
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    div() {
        if (this.pila.length >= 2) {
            var a = this.pila.pop();
            var b = this.pila.pop();
            var result = parseFloat(b) / parseFloat(a);
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    sin() {
        if (this.pila.length >= 1) {
            var a = this.pila.pop();
            var result = Math.sin(parseFloat(a));
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    cos() {
        if (this.pila.length >= 1) {
            var a = this.pila.pop();
            var result = Math.cos(parseFloat(a));
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    tan() {
        if (this.pila.length >= 1) {
            var a = this.pila.pop();
            var result = Math.tan(parseFloat(a));
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    asin() {
        if (this.pila.length >= 1) {
            var a = this.pila.pop();
            var result = Math.asin(parseFloat(a));
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    acos() {
        if (this.pila.length >= 1) {
            var a = this.pila.pop();
            var result = Math.acos(parseFloat(a));
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    atan() {
        if (this.pila.length >= 1) {
            var a = this.pila.pop();
            var result = Math.atan(parseFloat(a));
            this.pila.push(result);
            this.mostrarPila();
        }
    }

    cero() {
        this.pantalla = "";
        this.muestraPantalla();
    }

    clear() {
        var length = this.pila.length;
        for (var i = 0; i < length; i++) {
            this.pila.pop();            
        }
        this.numeros = "";
        this.mostrarPila();
    }

    cambiar() {
        if (this.cambio) {
            var bsin = document.createElement("button");
            bsin.setAttribute("onclick", "calculadora.sin()");
            bsin.innerHTML = "sin"
            document.querySelector("body > main > button:nth-child(4)").replaceWith(bsin);

            var bcos = document.createElement("button");
            bcos.setAttribute("onclick", "calculadora.cos()");
            bcos.innerHTML = "cos"
            document.querySelector("body > main > button:nth-child(5)").replaceWith(bcos);

            var btan = document.createElement("button");
            btan.setAttribute("onclick", "calculadora.tan()");
            btan.innerHTML = "tan"
            document.querySelector("body > main > button:nth-child(6)").replaceWith(btan);

            this.cambio = !this.cambio;
        }
        else {
            var basin = document.createElement("button");
            basin.setAttribute("onclick", "calculadora.asin()");
            basin.innerHTML = "asin"
            document.querySelector("body > main > button:nth-child(4)").replaceWith(basin);

            var bacos = document.createElement("button");
            bacos.setAttribute("onclick", "calculadora.acos()");
            bacos.innerHTML = "acos"
            document.querySelector("body > main > button:nth-child(5)").replaceWith(bacos);

            var batan = document.createElement("button");
            batan.setAttribute("onclick", "calculadora.atan()");
            batan.innerHTML = "atan"
            document.querySelector("body > main > button:nth-child(6)").replaceWith(batan);

            this.cambio = !this.cambio;
        }
    }
}

var calculadora = new CalculadoraRPN();