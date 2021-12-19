<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 6 - Modificar Datos</title>
    <link rel="stylesheet" href="Ejercicio6.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 6 - Modificar Datos</h1>
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
        <h2>Rellene el formulario con los datos a insertar</h2>
        <form action="#" method="post">
            <label for="id">Introduzca el id de la persona a modificar:</label>
		    <input id="id" type='text' name='id' />
            <label for="nombre">Nombre:</label>
		    <input id="nombre" type="text" placeholder="Xurde" name="nombre" required>
		    <br>
		    <label for="apellidos">Apellidos:</label>
		    <input id="apellidos" type="text" placeholder="García Fernández" name="apellidos" required>
		    <br>
		    <label for="correo">Email:</label>
		    <input id="correo" type="email" placeholder="uo271033@uniovi.es" name="email" required>
		    <br>
		    <label for="telefono">Teléfono:</label>
		    <input id="telefono" type="tel" pattern="[0-9]{9}" placeholder="123456789" name="telefono" required>
		    <br>
		    <label for="edad">Edad:</label>
	    	<input id="edad" type="number" placeholder="21" name="edad" required>
		    <fieldset>
			    <legend>Sexo</legend>
			    <input id="masculino" type="radio" name="sexo" value="Masculino" checked>
			    <label for="masculino">Masculino</label>
			    <input id="femenino" type="radio" name="sexo" value="Femenino">
			    <label for="femenino">Femenino</label>
		    </fieldset>
		    <label for="nivelinformatico">Pericia:</label>
		    <input id="nivelinformatico" type="number" placeholder="10" name="nivelinformatico" required>
		    <br>
		    <label for="tiempo">Tiempo:</label>
		    <input id="tiempo" type="number" placeholder="60" name="tiempo" required>
		    <br>
		    <fieldset>
			    <legend>¿Realizado correctamente?</legend>
			    <input id="si" type="radio" name="completado" value="Si" checked>
			    <label for="si">Si</label>
			    <input id="no" type="radio" name="completado" value="No">
			    <label for="no">No</label>
		    </fieldset>
		    <label for="comentarios">Escribe tu comentario:</label>
		    <textarea id="comentarios" name="comentarios" placeholder="Comentarios..." required></textarea>
		    <br>
		    <label for="propuestas">Propuestas:</label>
		    <textarea id="propuestas" name="propuestas" placeholder="Propuestas..." required></textarea>
		    <br>
		    <label for="valoracion">Valoración:</label>
		    <input id="valoracion" type="number" placeholder="100" name="valoracion" required>
		    <br>
		    <input type='submit' name='modificaDatos' value='Modificar Datos' />
        </form>
    </main>
</body>
</html>
<?php
require("BaseDatos.php");
$base = new BaseDatos();
    if (count($_POST)>0) 
		if(isset($_POST['modificaDatos']))                 
            $base->modificarDatos(); 
?>