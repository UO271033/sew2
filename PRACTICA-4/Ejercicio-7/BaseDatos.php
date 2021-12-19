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
            $this->bdname = "f12021";
        }

        public function crearBD() {
            $bd = new mysqli($this->hostname, $this->username, $this->password);
            $consulta = "CREATE DATABASE IF NOT EXISTS f12021 COLLATE utf8_spanish_ci";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Base de Datos se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Base de Datos</p>";
                exit();
            } 
            $bd->close();
        }

        public function crearTablas() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = "CREATE TABLE IF NOT EXISTS constructores (id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, puntos INT UNSIGNED NOT NULL,
                        PRIMARY KEY (id))";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Tabla Constructores se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Tabla</p>";
                exit();
            } 

            $consulta = "CREATE TABLE IF NOT EXISTS pilotos (id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, puntos INT UNSIGNED NOT NULL,
                        constructor_id INT, PRIMARY KEY (id), FOREIGN KEY(constructor_id) REFERENCES constructores(id))";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Tabla Pilotos se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Tabla</p>";
                exit();
            } 

            $consulta = "CREATE TABLE IF NOT EXISTS paddock (id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, funcion VARCHAR(50) NOT NULL,
                        constructor_id INT, PRIMARY KEY (id), FOREIGN KEY(constructor_id) REFERENCES constructores(id))";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Tabla Paddock se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Tabla</p>";
                exit();
            } 

            $consulta = "CREATE TABLE IF NOT EXISTS carreras (id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, pais VARCHAR(50) NOT NULL,
                        ganador_id INT, PRIMARY KEY (id), FOREIGN KEY(ganador_id) REFERENCES pilotos(id))";
            if($bd->query($consulta) === TRUE)
                echo "<p id=\"confirm\">La Tabla Carreras se ha creado correctamente</p>";
            else { 
                echo "<p id=\"confirm\">Ha ocurrido un error durante la creación de la Tabla</p>";
                exit();
            } 
            $bd->close();
        }

        public function insertarConstructor() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("INSERT INTO constructores (nombre, puntos) VALUES (?,?)");
            if ((empty($_POST['nombreC']) || empty($_POST['puntosC'])))
                echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consulta->bind_param(
                    'ss',
                    $_POST["nombreC"],
                    $_POST["puntosC"]
                );
                $consulta->execute();
                echo "<p>El constructor se ha insertado correctamente</p>";
                $consulta->close();
            }
            $bd->close();
        }

        public function insertarCarrera() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("INSERT INTO carreras (nombre, pais, ganador_id) VALUES (?,?,?)");
            if ((empty($_POST['nombreCarr']) || empty($_POST['paisCarr']) || empty($_POST['ganador_id'])))
                echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consulta->bind_param(
                    'ssi',
                    $_POST["nombreCarr"],
                    $_POST["paisCarr"],
                    $_POST["ganador_id"]
                );
                $consulta->execute();
                echo "<p>La carrera se ha insertado correctamente</p>";
                $consulta->close();
            }
            $bd->close();
        }

        public function insertarPiloto() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("INSERT INTO pilotos (nombre, puntos, constructor_id) VALUES (?,?,?)");
            if ((empty($_POST['nombreP']) || empty($_POST['puntosP']) || empty($_POST['constructor_id'])))
                echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consulta->bind_param(
                    'ssi',
                    $_POST["nombreP"],
                    $_POST["puntosP"],
                    $_POST["constructor_id"]
                );
                $consulta->execute();
                echo "<p>El piloto se ha insertado correctamente</p>";
                $consulta->close();
            }
            $bd->close();
        }

        public function insertarPaddock() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("INSERT INTO paddock (nombre, funcion, constructor_id) VALUES (?,?,?)");
            if ((empty($_POST['nombrePad']) || empty($_POST['funcionPad']) || empty($_POST['constructor_id'])))
                echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consulta->bind_param(
                    'ssi',
                    $_POST["nombrePad"],
                    $_POST["funcionPad"],
                    $_POST["constructor_id"]
                );
                $consulta->execute();
                echo "<p>El paddock se ha insertado correctamente</p>";
                $consulta->close();
            }
            $bd->close();
        }

        public function datosConstructores() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("SELECT * FROM constructores");
            $consulta->execute();
            $result = $consulta->get_result();
            if ($result->num_rows >= 1) {
                echo "<h2>Datos de los constructores:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Nombre: " . $row["nombre"] . "</li>";
                    echo "<li>Puntos: " . $row["puntos"] . "</li>";
                }
                echo "</ul>";
            }
            $consulta->close();
            $bd->close();
        }

        public function datosPilotos() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("SELECT * FROM pilotos");
            $consulta->execute();
            $result = $consulta->get_result();
            if ($result->num_rows >= 1) {
                echo "<h2>Datos de los pilotos:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Nombre: " . $row["nombre"] . "</li>";
                    echo "<li>Puntos: " . $row["puntos"] . "</li>";
                    echo "<li>Constuctor: " . $row["constructor_id"] . "</li>";
                }
                echo "</ul>";
            }
            $consulta->close();
            $bd->close();
        }

        public function datosPaddock() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("SELECT * FROM paddock");
            $consulta->execute();
            $result = $consulta->get_result();
            if ($result->num_rows >= 1) {
                echo "<h2>Datos del paddock:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Nombre: " . $row["nombre"] . "</li>";
                    echo "<li>Funcion: " . $row["funcion"] . "</li>";
                    echo "<li>Constuctor: " . $row["constructor_id"] . "</li>";
                }
                echo "</ul>";
            }
            $consulta->close();
            $bd->close();
        }

        public function datosCarreras() {
            $bd = new mysqli($this->hostname, $this->username, $this->password, $this->bdname);
            $consulta = $bd->prepare("SELECT * FROM carreras");
            $consulta->execute();
            $result = $consulta->get_result();
            if ($result->num_rows >= 1) {
                echo "<h2>Datos de las carreras:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Nombre: " . $row["nombre"] . "</li>";
                    echo "<li>Pais: " . $row["pais"] . "</li>";
                    echo "<li>Ganador: " . $row["ganador_id"] . "</li>";
                }
                echo "</ul>";
            }
            $consulta->close();
            $bd->close();
        }

    
    }
?>