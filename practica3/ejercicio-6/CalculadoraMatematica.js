"use strict";
class CalculadoraMatematica extends CalculadoraRPN {

    limite() {
        var punto = this.pila.pop();
        var potencia = this.pila.pop();
        var coeficiente = this.pila.pop();
        var result = (punto * coeficiente) ** potencia;
        this.pantalla = result;
        this.muestraPantalla();
        this.mostrarPila(); 
        this.pantalla = "";
    }

    derivar() {
        var potencia = this.pila.pop();
        var coeficiente = this.pila.pop();
        var xc = coeficiente * potencia;
        var xp = potencia - 1;
        this.pantalla = xc + "x^" + xp;
        this.muestraPantalla();
        this.mostrarPila(); 
        this.pantalla = "";
    }

    integrar() {
        var potencia = this.pila.pop();
        var coeficiente = this.pila.pop();
        var xp = parseFloat(potencia) + 1;
        var xc = coeficiente / xp;
        this.pantalla = xc + "x^" + xp;
        this.muestraPantalla();
        this.mostrarPila(); 
        this.pantalla = "";
    }

}

var calculadora = new CalculadoraMatematica();