<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="CalculadoraRPN.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 3 - Calculadora RPN</h1>
    </header>
    <?php
class CalculadoraRPN {

protected $memoria;
public $pantalla;
protected $pila;
public $numeros;

public function __construct() {
    $this->memoria = 0;
    $this->pantalla = "";
    $this->numeros = "";
    $this->pila = array(); 
}

protected function push($a) {
    array_unshift($this->pila, $a);
}

protected function pop() {
    if (!empty($this->pila))
        return array_shift($this->pila);
}

public function mostrarPila() {
    $valores = "";
    for ($i = 0; $i < count($this->pila); $i++) {
        $valores .= count($this->pila) - $i . ": " . $this->pila[$i] . "\n";
    }
    $this->numeros = $valores;
}

public function clear() {
    $length = count($this->pila);
    for ($i = 0; $i < $length; $i++) {
        $this->pop();            
    }
    $this->numeros = "";
}

public function pulsaNumero($a) {
    $this->pantalla .= $a;
}

public function suma() {
    if (count($this->pila) >= 2) {
        $a = $this->pop();
        $b = $this->pop();
        $result = $a + $b;
        $this->push($result);
        $this->mostrarPila();
    }
}

public function resta() {
    if (count($this->pila) >= 2) {
        $a = $this->pop();
        $b = $this->pop();
        $result = $a - $b;
        $this->push($result);
        $this->mostrarPila();
    }
}

public function mul() {
    if (count($this->pila) >= 2) {
        $a = $this->pop();
        $b = $this->pop();
        $result = $a * $b;
        $this->push($result);
        $this->mostrarPila();
    }
}

public function div() {
    if (count($this->pila) >= 2) {
        $a = $this->pop();
        $b = $this->pop();
        $result = $b / $a;
        $this->push($result);
        $this->mostrarPila();
    }
}

public function x2() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = pow($a, 2);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function sqrt() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = sqrt($a);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function log() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = log10($a);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function exp() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = exp($a);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function cos() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = cos($a);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function sin() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = sin($a);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function tan() {
    if (count($this->pila) >= 1) {
        $a = $this->pop();
        $result = tan($a);
        $this->push($result);
        $this->mostrarPila();
    }
}

public function punto() {
    $this->pantalla .= ".";
}

public function cero() {
    $this->pantalla = "";
}

public function enter() {
    $this->push($this->pantalla);
    $this->pantalla = "";
    $this->mostrarPila();
}
}



if (!isset($_SESSION['calculadoraRPN'])) {
    $_SESSION['calculadoraRPN']= new CalculadoraRPN();
}
$calculadora = $_SESSION['calculadoraRPN'];


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
    if(isset($_POST['punto'])) $calculadora->punto();
    if(isset($_POST['C'])) $calculadora->cero();
    if(isset($_POST['x2'])) $calculadora->x2();
    if(isset($_POST['sin'])) $calculadora->sin();
    if(isset($_POST['cos'])) $calculadora->cos();
    if(isset($_POST['tan'])) $calculadora->tan();
    if(isset($_POST['sqrt'])) $calculadora->sqrt();
    if(isset($_POST['log'])) $calculadora->log();
    if(isset($_POST['exp'])) $calculadora->exp();
    if(isset($_POST['clear'])) $calculadora->clear();
    if(isset($_POST['enter'])) $calculadora->enter();
}

echo "<form action='CalculadoraRPN.php' method='post'>
        <textarea disabled>$calculadora->pantalla</textarea>
        <textarea disabled>$calculadora->numeros</textarea>

        <button type = 'submit' name='x2'>x<sup>2</sup></button>
        <button type = 'submit' name='sin'>sin</button>
        <button type = 'submit' name='cos'>cos</button>
        <button type = 'submit' name='tan'>tan</button> 

        <button type = 'submit' name='sqrt'>&#x221A;</button>
        <button type = 'submit' name='log'>log</button>
        <button type = 'submit' name='exp'>Exp</button>
        <button type = 'submit' name='clear'>clear</button> 

        <button type = 'submit' name='/'>/</button>
        <button type = 'submit' name='7'>7</button> 
        <button type = 'submit' name='8'>8</button> 
        <button type = 'submit' name='9'>9</button>

        <button type = 'submit' name='*'>*</button>  
        <button type = 'submit' name='4'>4</button> 
        <button type = 'submit' name='5'>5</button> 
        <button type = 'submit' name='6'>6</button>  

        <button type = 'submit' name='-'>-</button>
        <button type = 'submit' name='1'>1</button> 
        <button type = 'submit' name='2'>2</button> 
        <button type = 'submit' name='3'>3</button>  

        <button type = 'submit' name='+'>+</button>
        <button type = 'submit' name='0'>0</button> 
        <button type = 'submit' name='punto'>.</button> 
        <button type = 'submit' name='C'>C</button>
        
        <button type = 'submit' name='enter'>Enter</button> 
    </form>  
    ";
?>
</body>
</html>
