<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 7</title>
    <link rel="stylesheet" href="Ejercicio7.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 7</h1>
    </header>
    <nav>
        <a href="InsertarDatos.php">Insertar datos</a>
        <a href="BuscarDatos.php">Buscar datos</a>
    </nav>
    <section>
        <h2>Menú BBDD</h2>
        <form id="formbase" action='#' method='post'>
            <input type="submit" class="button" name="creaBase" value="Crear base de datos" />
            <input type="submit" class="button" name="creaTablas" value="Crear tablas" />
    
        </form>
    </section>    
    
</body>
</html>
<?php
require("BaseDatos.php");
    $base = new BaseDatos();
    if (count($_POST)>0) {
		if(isset($_POST['creaBase']))                 
            $base->crearBD(); 
        if(isset($_POST['creaTablas']))                 
            $base->crearTablas(); 
    }
?>
