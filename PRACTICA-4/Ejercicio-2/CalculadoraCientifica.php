<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="CalculadoraCientifica.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 2 - Calculadora Científica</h1>
    </header>
    <?php
class CalculadoraBasica {

protected $memoria;
public $pantalla;

public function __construct() {
    $this->memoria = 0;
    $this->pantalla = "";
}


public function pulsaNumero($a) {
    $this->pantalla .= $a;
}

public function suma() {
    $this->pantalla .= "+";
}

public function resta() {
    $this->pantalla .= "-";
}

public function mul() {
    $this->pantalla .= "*";
}

public function div() {
    $this->pantalla .= "/";
}

public function punto() {
    $this->pantalla .= ".";
}

public function mrc() {
    $this->pantalla = $this->memoria;
}

public function sumamem() {
    $result = $this->memoria + eval("return $this->pantalla;");
    $this->memoria = $result;
    $this->pantalla = $result;
}

public function restamem() {
    $result = $this->memoria - eval("return $this->pantalla;");
    $this->memoria = $result;
    $this->pantalla = $result;
}

public function cero() {
    $this->pantalla = "";
}

public function calcular() {
    $result = eval("return $this->pantalla;");
    $this->memoria = $result;
    $this->pantalla = $result;
}
}

class CalculadoraCientifica extends CalculadoraBasica {

    public function x2() {
        $result = pow(eval("return $this->pantalla;"), 2);
        $this->memoria = $result;
        $this->pantalla = $result;
    }

    public function xy () {
        $this->pantalla .= "**";
    }

    public function sin() {
        $result = sin(eval("return $this->pantalla;"));
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function cos() {
        $result = cos(eval("return $this->pantalla;"));
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function tan() {
        $result = tan(eval("return $this->pantalla;"));
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function sqrt() {
        $result = sqrt(eval("return $this->pantalla;"));
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function log() {
        $result = log10(eval("return $this->pantalla;"));
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function exp() {
        $result = exp(eval("return $this->pantalla;"));
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function mod() {
        $this->pantalla .= "%";
    }

    public function delete() {
        $this->pantalla = substr($this->pantalla, 0, strlen($this->pantalla) - 1);
    }

    public function pi() {
        $this->pantalla = M_PI;
        $this->memoria = $this->pantalla;
    }

    public function factorial() {
        $number = eval("return $this->pantalla;");
        $result = 1; 
        for ($i=1; $i<=$number; $i++) {
            $result = $result * $i; 
        }
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function signo() {
        $result = - eval(" return $this->pantalla;");
        $this->pantalla = $result;
        $this->memoria = $result;
    }

    public function abrep() {
        $this->pantalla .= "(";
    }

    public function cierrap() {
        $this->pantalla .= ")";
    }
    
}

if (!isset($_SESSION['calculadoracientifica'])) {
    $_SESSION['calculadoracientifica']= new CalculadoraCientifica();
}
$calculadora = $_SESSION['calculadoracientifica'];


if (count($_POST) > 0) {
    if(isset($_POST['1'])) $calculadora->pulsaNumero("1");
    if(isset($_POST['2'])) $calculadora->pulsaNumero("2");
    if(isset($_POST['3'])) $calculadora->pulsaNumero("3");
    if(isset($_POST['4'])) $calculadora->pulsaNumero("4");
    if(isset($_POST['5'])) $calculadora->pulsaNumero("5");
    if(isset($_POST['6'])) $calculadora->pulsaNumero("6");
    if(isset($_POST['7'])) $calculadora->pulsaNumero("7");
    if(isset($_POST['8'])) $calculadora->pulsaNumero("8");
    if(isset($_POST['9'])) $calculadora->pulsaNumero("9");
    if(isset($_POST['+'])) $calculadora->suma();
    if(isset($_POST['-'])) $calculadora->resta();
    if(isset($_POST['*'])) $calculadora->mul();
    if(isset($_POST['/'])) $calculadora->div();
    if(isset($_POST['='])) $calculadora->calcular();
    if(isset($_POST['.'])) $calculadora->punto();
    if(isset($_POST['C'])) $calculadora->cero();
    if(isset($_POST['mrc'])) $calculadora->mrc();
    if(isset($_POST['m+'])) $calculadora->sumamem();
    if(isset($_POST['m-'])) $calculadora->restamem();
    if(isset($_POST['delete'])) $calculadora->delete();
    if(isset($_POST['x2'])) $calculadora->x2();
    if(isset($_POST['xy'])) $calculadora->xy();
    if(isset($_POST['sin'])) $calculadora->sin();
    if(isset($_POST['cos'])) $calculadora->cos();
    if(isset($_POST['tan'])) $calculadora->tan();
    if(isset($_POST['sqrt'])) $calculadora->sqrt();
    if(isset($_POST['exp'])) $calculadora->exp();
    if(isset($_POST['mod'])) $calculadora->mod();
    if(isset($_POST['pi'])) $calculadora->pi();
    if(isset($_POST['factorial'])) $calculadora->factorial();
    if(isset($_POST['signo'])) $calculadora->signo();
    if(isset($_POST['abrep'])) $calculadora->abrep();
    if(isset($_POST['cierrap'])) $calculadora->cierrap();
}

echo "<form action='CalculadoraCientifica.php' method='post'>
        <textarea disabled>$calculadora->pantalla</textarea>

        <button type = 'submit' name='mrc'>MRC</button>
        <button type = 'submit' name='m-'>M-</button>
        <button type = 'submit' name='m+'>M+</button> 
        <button type = 'submit' name='C'>C</button>
        <button type = 'submit' name='delete'>&#x2190;</button>

        <button type = 'submit' name='x2'>x<sup>2</sup></button>
        <button type = 'submit' name='xy'>x<sup>y</sup></button> 
        <button type = 'submit' name='sin'>sin</button>
        <button type = 'submit' name='cos'>cos</button>
        <button type = 'submit' name='tan'>tan</button> 

        <button type = 'submit' name='sqrt'>&#x221A;</button>
        <button type = 'submit' name='log'>log</button>
        <button type = 'submit' name='exp'>Exp</button>
        <button type = 'submit' name='mod'>Mod</button> 
        <button type = 'submit' name='/'>/</button>

        <button type = 'submit' name='pi'>&#x3C0;</button> 
        <button type = 'submit' name='7'>7</button> 
        <button type = 'submit' name='8'>8</button> 
        <button type = 'submit' name='9'>9</button>
        <button type = 'submit' name='*'>*</button> 

        <button type = 'submit' name='factorial'>n!</button> 
        <button type = 'submit' name='4'>4</button> 
        <button type = 'submit' name='5'>5</button> 
        <button type = 'submit' name='6'>6</button> 
        <button type = 'submit' name='-'>-</button> 

        <button type = 'submit' name='signo'>&#xb1;</button>
        <button type = 'submit' name='1'>1</button> 
        <button type = 'submit' name='2'>2</button> 
        <button type = 'submit' name='3'>3</button> 
        <button type = 'submit' name='+'>+</button> 

        <button type = 'submit' name='abrep'>(</button> 
        <button type = 'submit' name='cierrap'>)</button> 
        <button type = 'submit' name='0'>0</button> 
        <button type = 'submit' name='.'>.</button> 
        <button type = 'submit' name='='>=</button> 
    </form>  
    ";
?>
</body>
</html>
