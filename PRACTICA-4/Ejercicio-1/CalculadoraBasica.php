<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="CalculadoraBasica.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 1 - Calculadora Básica</h1>
    </header>
    <?php
class Calculadora {

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

if (!isset($_SESSION['calculadora']))
	$_SESSION['calculadora']=new Calculadora();
$calculadora = $_SESSION['calculadora'];

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
}

echo "<form action='CalculadoraBasica.php' method='post'>
        <textarea disabled>$calculadora->pantalla</textarea>

        <button type = 'submit' name='mrc'>MRC</button>
        <button type = 'submit' name='m-'>M-</button>
        <button type = 'submit' name='m+'>M+</button> 
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
        <button type = 'submit' name='.'>.</button> 
        <button type = 'submit' name='C'>C</button>
        <button type = 'submit' name='='>=</button> 
    </form>  
    ";
?>
</body>
</html>
