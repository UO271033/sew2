<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 7 - Insertar Datos</title>
    <link rel="stylesheet" href="Ejercicio7.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 7 - Insertar Datos</h1>
    </header>
    <nav>
        <a href="InsertarDatos.php">Insertar datos</a>
        <a href="BuscarDatos.php">Buscar datos</a>
    </nav>
    <main>
        <h2>Rellene el formulario con los datos a insertar del constructor</h2>
        <form action="#" method="post">
            <label for="nombreC">Nombre:</label>
		    <input id="nombreC" type="text" placeholder="Red Bull" name="nombreC" required>
		    <br>
		    <label for="puntosC">Puntos:</label>
	    	<input id="puntosC" type="number" placeholder="585" name="puntosC" required>
		    <br>
            <input type="submit" class="button" name="insertaCons" value="Insertar Constructor" />
        </form>
		<h2>Rellene el formulario con los datos a insertar del piloto</h2>
        <form action="#" method="post">
            <label for="nombreP">Nombre:</label>
		    <input id="nombreP" type="text" placeholder="Verstappen" name="nombreP" required>
		    <br>
		    <label for="puntosP">Puntos:</label>
	    	<input id="puntosP" type="number" placeholder="395" name="puntosP" required>
		    <br>
			<label for="constructor_id">ID del constructor:</label>
	    	<input id="constructor_id" type="number" placeholder="1" name="constructor_id" required>
		    <br>
            <input type="submit" class="button" name="insertaPil" value="Insertar Piloto" />
        </form>
        <h2>Rellene el formulario con los datos a insertar del piloto</h2>
        <form action="#" method="post">
            <label for="nombrePad">Nombre:</label>
		    <input id="nombrePad" type="text" placeholder="Toto Wolff" name="nombrePad" required>
		    <br>
		    <label for="funcionPad">Función:</label>
	    	<input id="funcionPad" type="funcion" placeholder="Manager" name="funcionPad" required>
		    <br>
			<label for="constructor_id">ID del constructor:</label>
	    	<input id="constructor_id" type="number" placeholder="2" name="constructor_id" required>
		    <br>
            <input type="submit" class="button" name="insertaPil" value="Insertar Piloto" />
        </form>
		<h2>Rellene el formulario con los datos a insertar de la carrera</h2>
        <form action="#" method="post">
            <label for="nombreCarr">Nombre:</label>
		    <input id="nombreCarr" type="text" placeholder="Yas Marina" name="nombreCarr" required>
		    <br>
			<label for="paisCarr">Pais:</label>
		    <input id="paisCarr" type="text" placeholder="Abu Dhabi" name="paisCarr" required>
		    <br>
		    <label for="ganador_id">ID del ganador:</label>
	    	<input id="ganador_id" type="number" placeholder="1" name="ganador_id" required>
		    <br>
            <input type="submit" class="button" name="insertaCarr" value="Insertar Carrera" />
        </form>
    </main>
</body>
</html>
<?php
require("BaseDatos.php");
$base = new BaseDatos();
    if (count($_POST)>0) {
		if(isset($_POST['insertaCons']))                 
            $base->insertarConstructor(); 
		if(isset($_POST['insertaPil']))                 
            $base->insertarPiloto();
        if(isset($_POST['insertaPad']))                 
            $base->insertarPaddock();
		if(isset($_POST['insertaCarr']))                 
            $base->insertarCarrera();
	}
		
?>