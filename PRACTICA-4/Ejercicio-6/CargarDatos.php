<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 6 - Cargar Datos</title>
    <link rel="stylesheet" href="Ejercicio6.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 6 - Cargar Datos</h1>
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
    <main>
        <h2>Cargar Datos desde un csv</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="archivo">Inserta el archivo csv a cargar:</label>
		    <input id="archivo" type="file" name="archivo" />
		    <input type="submit" name="cargaDatos" value="Cargar Datos" />
        </form>
    </main>
</body>
</html>
<?php
require("BaseDatos.php");
$base = new BaseDatos();
    if (count($_POST)>0) 
		if(isset($_POST["cargaDatos"]))                 
            $base->cargarDatos(); 
?>