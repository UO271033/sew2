<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 7 - Buscar Datos</title>
    <link rel="stylesheet" href="Ejercicio7.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 7 - Buscar Datos</h1>
    </header>
    <nav>
        <a href="InsertarDatos.php">Insertar datos</a>
        <a href="BuscarDatos.php">Buscar datos</a>
    </nav>
    <main>
        <h2>Buscar Datos en la BBDD</h2>
        <form action="#" method="post">
		    <input type='submit' name='buscaDatos' value='Buscar Datos' />
        </form>
    </main>
</body>
</html>
<?php
require("BaseDatos.php");
$base = new BaseDatos();
    if (count($_POST)>0) 
		if(isset($_POST['buscaDatos'])) {               
            $base->datosConstructores(); 
            $base->datosPilotos(); 
            $base->datosCarreras(); 
            $base->datosPaddock(); 
        }
?>