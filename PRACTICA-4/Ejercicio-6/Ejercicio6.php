<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 6</title>
    <link rel="stylesheet" href="Ejercicio6.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 6</h1>
    </header>
    <nav>
        <a href="InsertarDatos.php">Insertar datos en una tabla</a>
        <a href="BuscarDatos.php">Buscar datos en una tabla</a>
        <a href="ModificarDatos.php">Modificar datos en una tabla</a>
        <a href="EliminarDatos.php">Eliminar datos de una tabla</a>
        <a href="GenerarInforme.php">Generar informe</a>
        <a href="CargarDatos.php">Cargar datos de un archivo CSV en una tabla de la Base de Datos</a>
        <a href="ExportarDatos.php">Exportar datos a un archivo en formato CSV los datos desde una tabla de la Base de Datos</a>
    </nav>
    <section>
        <h2>Menú BBDD</h2>
        <form id="formbase" action='#' method='post'>
            <input type="submit" class="button" name="creaBase" value="Crear base de datos" />
            <input type="submit" class="button" name="creaTabla" value="Crear tabla" />
    
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
        if(isset($_POST['creaTabla']))                 
            $base->crearTabla(); 
    }
?>
