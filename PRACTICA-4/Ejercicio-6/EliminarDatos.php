<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 6 - Eliminar Datos</title>
    <link rel="stylesheet" href="Ejercicio6.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 6 - Eliminar Datos</h1>
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
        <h2>Eliminar Datos de la BBDD</h2>
        <form action="#" method="post">
            <label for="id">Introduzca el id de la persona a eliminar:</label>
		    <input id="id" type='text' name='id' />
		    <input type='submit' name='eliminaDatos' value='Eliminar Datos' />
        </form>
    </main>
</body>
</html>
<?php
require("BaseDatos.php");
$base = new BaseDatos();
    if (count($_POST)>0) 
		if(isset($_POST['eliminaDatos']))                 
            $base->eliminarDatos(); 
?>