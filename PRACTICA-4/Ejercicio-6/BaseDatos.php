<?php
    class BaseDatos {

        private $username;
        private $password;
        private $hostname;
        private $bdname;

        public function __construct() {
            $this->username = "DBUSER2021";
            $this->password = "DBPSWD2021";
            $this->hostname = "localhost";
            $this->bdname = "PruebasUsabilidad";
        }

        public function crearBD() {
            $bd = new mysqli($this->hostname, $this->username, $this->password);
            $consulta = "CREATE DATABASE IF NOT EXISTS PruebasUsabilidad COLLATE utf8_spanish_ci";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Base de Datos se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Base de Datos</p>";
                exit();
            } 
            $bd->close();
        }

        public function crearTabla() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = "CREATE TABLE IF NOT EXISTS PruebasUsabilidad (id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL,
                            apellidos VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, telefono INT UNSIGNED NOT NULL,
                            edad INT UNSIGNED NOT NULL, sexo VARCHAR(50), nivelinformatico INT UNSIGNED NOT NULL,
                            tiempo TIME NOT NULL, completado VARCHAR(5), comentarios VARCHAR(255), propuestas VARCHAR(255), valoracion INT UNSIGNED,
                            PRIMARY KEY (id), CHECK (nivelinformatico BETWEEN 0 AND 10), CHECK (valoracion BETWEEN 0 AND 10))";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Tabla se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Tabla</p>";
                exit();
            } 
            $bd->close();
        }

        public function insertarDatos() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("INSERT INTO PruebasUsabilidad (nombre, apellidos, email, telefono, edad, sexo, nivelinformatico, tiempo, completado, comentarios, propuestas, valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            if ((empty($_POST['valoracion']) || empty($_POST['edad']) || empty($_POST['propuestas']) || empty($_POST['nivelinformatico']) ||
                empty($_POST['completado']) || empty($_POST['comentarios']) || empty($_POST['tiempo']) || empty($_POST['sexo'] ||
                empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['email']) || empty($_POST['telefono']))))
                echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consulta->bind_param(
                    'ssssisiisssi',
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["email"],
                    $_POST["telefono"],
                    $_POST["edad"],
                    $_POST["sexo"],
                    $_POST["nivelinformatico"],
                    $_POST["tiempo"],
                    $_POST["completado"],
                    $_POST["comentarios"],
                    $_POST["propuestas"],
                    $_POST["valoracion"]
                );
                $consulta->execute();
                echo "<p>La inserción se ha realizado correctamente</p>";
                $consulta->close();
            }
            $bd->close();
        }

        public function buscarDatos() {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
        $consulta = $bd->prepare("SELECT * FROM PruebasUsabilidad WHERE id = ?");
        $consulta->bind_param('i', $_POST["id"]);
        $consulta->execute();
        $result = $consulta->get_result();
        if ($result->num_rows >= 1) {
            echo "<h2>Datos de la persona:</h2>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Nombre: " . $row["nombre"] . "</li>";
                echo "<li>Apellidos: " . $row["apellidos"] . "</li>";
                echo "<li>Email: " . $row["email"] . "</li>";
                echo "<li>Teléfono: " . $row["telefono"] . "</li>";
                echo "<li>Edad: " . $row["edad"] . "</li>";
                echo "<li>Sexo: " . $row["sexo"] . "</li>";
                echo "<li>¿Prueba realizada correctamente? " . $row["completado"] . "</li>";
                echo "<li>Tiempo empleado: " . $row["tiempo"] . "</li>";
                echo "<li>Nivel informático: " . $row["nivelinformatico"] . "</li>";
                echo "<li>Valoración: " . $row["valoracion"] . "</li>";
                echo "<li>Propuestas: " . $row["propuestas"] . "</li>";
                echo "<li>Comentarios: " . $row["comentarios"] . "</li>";
            }
            echo "</ul>";
        }
        $consulta->close();
        $bd->close();
    }

    public function modificarDatos() {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        else {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("UPDATE PruebasUsabilidad SET nombre = ?, apellidos = ?, email = ?, telefono = ?, edad = ?, sexo = ?, nivelinformatico = ?, tiempo = ?, completado = ?, comentarios = ?, propuestas = ?, valoracion = ? WHERE id=?");
            if ((empty($_POST['valoracion']) || empty($_POST['edad']) || empty($_POST['propuestas']) || empty($_POST['nivelinformatico']) ||
                empty($_POST['completado']) || empty($_POST['comentarios']) || empty($_POST['tiempo']) || empty($_POST['sexo'] ||
                empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['email']) || empty($_POST['telefono']))))
                echo "<p>No se puede realizar la modificación, faltan campos por completar</p>";
            else {
                $consulta->bind_param(
                    'ssssisiisssii',
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["email"],
                    $_POST["telefono"],
                    $_POST["edad"],
                    $_POST["sexo"],
                    $_POST["nivelinformatico"],
                    $_POST["tiempo"],
                    $_POST["completado"],
                    $_POST["comentarios"],
                    $_POST["propuestas"],
                    $_POST["valoracion"],
                    $_POST["id"]
                );
                $consulta->execute();
                $consulta->close();
                echo "<p>La modificación se ha realizado correctamente</p>";
            }
            $bd->close();
        }
    }

    public function borrarDatos() {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        else {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("DELETE FROM PruebasUsabilidad WHERE id=?");
            $consulta->bind_param('i', $_POST["id"]);
            $consulta->execute();
            $consulta->close();
            echo "<p>La eliminación se ha realizado correctamente</p>";
            $bd->close();
        }
    }

    public function generarInforme() {
        $usuarios = $this->numeroUsarios();
        $edad = $this->calculaMedia('edad');
        $hombres = ($this->calculaTotal('WHERE sexo="masculino"') / $usuarios) * 100;
        $mujeres = ($this->calculaTotal('WHERE sexo="femenino"') / $usuarios) * 100;
        $nivel = $this->calculaMedia('nivelinformatico');
        $valoracion = $this->calculaMedia('valoracion');
        $tiempo = $this->calculaMedia('tiempo');
        if ($usuarios > 0)
            $completado = ($this->calculaTotal('WHERE completado="si"') / $usuarios) * 100;
        else $completado = 0;

        echo "<ul>";
        echo "<li>Edad media: $edad años</li>";
        echo "<li>Porcentaje de cada sexo:</li>
				<ul>
				<li>Masculino: $hombres%</li>
				<li>Femenino: $mujeres%</li>
				</ul>
			</li>";
        echo "<li>Nivel informático medio: $nivel</li>";
        echo "<li>Tiempo medio: $tiempo</li>";
        echo "<li>Porcentaje de tareas completadas: $completado%</li>";
        echo "<li>Valorarción media: $valoracion</li>";
        echo "</ul>";
    }

    private function calculaMedia($a1) {
        $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
        $resultado =  $bd->query('SELECT AVG(' . $a1 . ') AS media FROM PruebasUsabilidad');
        $media = null;
        if ($resultado->num_rows > 0)
            while ($row = $resultado->fetch_assoc())
                $media = $row["media"];
        $bd->close();
        return $media;
    }

    private function calculaTotal($a1) {
        $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
        $resultado =  $bd->query('SELECT COUNT(*) AS total FROM PruebasUsabilidad ' . $a1);
        $total = null;
        if ($resultado->num_rows > 0)
            while ($row = $resultado->fetch_assoc())
                $total = $row["total"];
        $bd->close();
        return $total;
    }

    private function numeroUsarios() {
        $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
        $numero =  $bd->query('SELECT COUNT(*) AS nusuarios FROM PruebasUsabilidad');
        $total = null;
        if ($numero->num_rows > 0)
            while ($row = $numero->fetch_assoc())
                $total = $row["nusuarios"];
        $bd->close();
        return $total;
    }

    public function cargarDatos() {
        $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
        $archivo = fopen($_FILES['archivo']['tmp_name'], 'rb');
        while (($datos = fgetcsv($archivo)) == true) {
            $consulta = $bd->prepare("INSERT INTO PruebasUsabilidad VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $consulta->bind_param(
                'issssisiisssi',
                $datos[0],
                $datos[1],
                $datos[2],
                $datos[3],
                $datos[4],
                $datos[5],
                $datos[6],
                $datos[7],
                $datos[8],
                $datos[9],
                $datos[10],
                $datos[11],
                $datos[12]
            );
            $consulta->execute();
        }
        $consulta->close();
        echo "<p>Los Datos se han cargado correctamente</p>";
    }

    public function exportarDatos() {
        $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
        $datos =  $bd->query('SELECT * FROM PruebasUsabilidad');
        $valores = "";
        if ($datos->num_rows > 0) {
            while ($row = $datos->fetch_assoc()) {
                $valores .= $row['id'] . "," . $row['nombre'] . "," . $row['apellidos'] . "," . $row['email'] . "," . 
                $row['telefono'] . "," . $row['edad'] . "," . $row['sexo'] . "," . $row['nivelinformatico'] . "," . $row['tiempo'] . "," . 
                $row['completado'] . "," . $row['comentarios'] . "," . $row['propuestas'] . "," . $row['valoracion'] . "\n";
            }
        }
        $bd->close();
        file_put_contents("PruebasUsabilidad.csv", $valores);
        echo "<p>El Fichero csv se ha generado correctamente</p>";
    }

    }
?>