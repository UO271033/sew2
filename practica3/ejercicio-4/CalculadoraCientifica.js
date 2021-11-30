"use strict";
class CalculadoraCientifica extends Calculadora {

    constructor() {
        super();
        this.cambio = false;
        this.hyper = false;
        this.grados = true;
        this.ncientifica = false;
    }

    mc() {
        this.memoria = new Number(0);
    }

    ms() {
        this.memoria = eval(this.pantalla);
    }    

    x2() {
        var result = new Number(Math.pow(new Number(eval(this.pantalla)), 2));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    x3() {
        var result = new Number(Math.pow(new Number(eval(this.pantalla)), 3));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    inv() {
        var result = new Number(Math.pow(new Number(eval(this.pantalla)), -1));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    xy () {
        this.pantalla += "**";
        this.muestraPantalla();
    }

    sin() {
        var result = Math.sin(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    cos() {
        var result = Math.cos(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    tan() {
        var result = Math.tan(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    asin() {
        var result = Math.asin(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    acos() {
        var result = Math.acos(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    atan() {
        var result = Math.atan(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    sinh() {
        var result = Math.sinh(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    cosh() {
        var result = Math.cosh(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    tanh() {
        var result = Math.tanh(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    sqrt() {
        var result = Math.sqrt(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    x10() {
        var result = Math.pow(10, new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    log() {
        var result = Math.log10(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    ln() {
        var result = Math.log(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    exp() {
        var result = Math.exp(new Number(eval(this.pantalla)));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    mod() {
        this.pantalla += "%";
        this.muestraPantalla();
    }

    e() {
        this.pantalla = new Number(Math.E);
        this.memoria = this.pantalla;
        this.muestraPantalla();
    }

    delete() {
        this.pantalla = this.pantalla.substring(0, this.pantalla.length - 1);
        this.muestraPantalla();
    }

    pi() {
        this.pantalla = new Number(Math.PI);
        this.memoria = this.pantalla;
        this.muestraPantalla();
    }

    factorial() {
        var number = new Number(eval(this.pantalla));
        var result = 1; 
        for (var i=1; i<=number; i++) {
            result = result * i; 
        }
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    signo() {
        var result = new Number(- eval(this.pantalla));
        this.pantalla = result;
        this.memoria = result;
        this.muestraPantalla();
    }

    abrep() {
        this.pantalla += "(";
        this.muestraPantalla();
    }

    cierrap() {
        this.pantalla += ")";
        this.muestraPantalla();
    }

    cambiar() {
        if (this.cambio) {
            var bx2 = document.createElement("button");
            bx2.setAttribute("onclick", "calculadora.x2()");
            bx2.innerHTML = "x<sup>2</sup>"
            document.querySelector("body > main > button:nth-child(7)").replaceWith(bx2);

            var bxy = document.createElement("button");
            bxy.setAttribute("onclick", "calculadora.xy()");
            bxy.innerHTML = "x<sup>y</sup>"
            document.querySelector("body > main > button:nth-child(8)").replaceWith(bxy);

            var bsin = document.createElement("button");
            bsin.setAttribute("onclick", "calculadora.sin()");
            bsin.innerHTML = "sin"
            document.querySelector("body > main > button:nth-child(9)").replaceWith(bsin);

            var bcos = document.createElement("button");
            bcos.setAttribute("onclick", "calculadora.cos()");
            bcos.innerHTML = "cos"
            document.querySelector("body > main > button:nth-child(10)").replaceWith(bcos);

            var btan = document.createElement("button");
            btan.setAttribute("onclick", "calculadora.tan()");
            btan.innerHTML = "tan"
            document.querySelector("body > main > button:nth-child(11)").replaceWith(btan);

            this.cambio = !this.cambio;
        }
        else {
            var binv = document.createElement("button");
            binv.setAttribute("onclick", "calculadora.inv()");
            binv.innerHTML = "x<sup>-1</sup>"
            document.querySelector("body > main > button:nth-child(7)").replaceWith(binv);

            var bln = document.createElement("button");
            bln.setAttribute("onclick", "calculadora.ln()");
            bln.innerHTML = "ln"
            document.querySelector("body > main > button:nth-child(8)").replaceWith(bln);

            var basin = document.createElement("button");
            basin.setAttribute("onclick", "calculadora.asin()");
            basin.innerHTML = "asin"
            document.querySelector("body > main > button:nth-child(9)").replaceWith(basin);

            var bacos = document.createElement("button");
            bacos.setAttribute("onclick", "calculadora.acos()");
            bacos.innerHTML = "acos"
            document.querySelector("body > main > button:nth-child(10)").replaceWith(bacos);

            var batan = document.createElement("button");
            batan.setAttribute("onclick", "calculadora.atan()");
            batan.innerHTML = "atan"
            document.querySelector("body > main > button:nth-child(11)").replaceWith(batan);

            this.cambio = !this.cambio;
        }
    }

    deg() {
        if (this.grados) {
            this.pantalla = new Number(eval(this.pantalla) * (Math.PI / 180));
            this.memoria = this.pantalla;
            this.muestraPantalla();
            this.grados = !this.grados;
        }
        else {
            this.pantalla = new Number(eval(this.pantalla) * (180 / Math.PI));
            this.memoria = this.pantalla;
            this.muestraPantalla();
            this.grados = !this.grados;
        }
    }

    hyp() {
        if (this.hyper) {
            var bsin = document.createElement("button");
            bsin.setAttribute("onclick", "calculadora.sin()");
            bsin.innerHTML = "sin"
            document.querySelector("body > main > button:nth-child(9)").replaceWith(bsin);

            var bcos = document.createElement("button");
            bcos.setAttribute("onclick", "calculadora.cos()");
            bcos.innerHTML = "cos"
            document.querySelector("body > main > button:nth-child(10)").replaceWith(bcos);

            var btan = document.createElement("button");
            btan.setAttribute("onclick", "calculadora.tan()");
            btan.innerHTML = "tan"
            document.querySelector("body > main > button:nth-child(11)").replaceWith(btan);

            this.hyper = !this.hyper;
        }
        else {
            var bsinh = document.createElement("button");
            bsinh.setAttribute("onclick", "calculadora.sinh()");
            bsinh.innerHTML = "sinh"
            document.querySelector("body > main > button:nth-child(9)").replaceWith(bsinh);

            var bcosh = document.createElement("button");
            bcosh.setAttribute("onclick", "calculadora.cosh()");
            bcosh.innerHTML = "cosh"
            document.querySelector("body > main > button:nth-child(10)").replaceWith(bcosh);

            var btanh = document.createElement("button");
            btanh.setAttribute("onclick", "calculadora.tanh()");
            btanh.innerHTML = "tanh"
            document.querySelector("body > main > button:nth-child(11)").replaceWith(btanh);

            this.hyper = !this.hyper;
        }
    }

    fe() {
        if (this.ncientifica) {
            this.pantalla = new Number(eval(this.pantalla));
            this.memoria = this.pantalla;
            this.muestraPantalla();
            this.ncientifica = !this.ncientifica;
        }
        else {
            this.pantalla = new Number(eval(this.pantalla)).toExponential();
            this.memoria = this.pantalla;
            this.muestraPantalla();
            this.ncientifica = !this.ncientifica;
        }
    }

}

var calculadora = new CalculadoraCientifica();