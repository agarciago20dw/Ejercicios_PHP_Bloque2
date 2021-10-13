<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERSONAS / USERS</title>
</head>
<body>
    <table style="width: 80%; margin: 0 10%;">
        <tr>
            <td>
                <center>
                    <table style="text-align: center;">
                        <!-- FORMULARIO PARA CREAR UNA PERSONA -->
                        <form method="post">
                            <tr>
                                <td colspan="2"><h1>CREAR PERSONA</h1></td>
                            </tr>
                            <tr>
                                <td><label>Introduce el DNI</label></td>
                                <td><input type="text" name="dni_persona"></td>
                            </tr>
                            <tr>
                                <td><label>Introduce el nombre</label></td>
                                <td><input type="text" name="nombre_persona"></td>
                            </tr>
                            <tr>
                                <td><label>Introduce el apellido</label></td>
                                <td><input type="text" name="apellido_persona"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="ENVIAR" style="margin-top: 10px;"></td>
                            </tr>
                        </form>
                    </table>
                </center>
            </td>
            <td>
                <center>
                    <table style="text-align: center;">
                        <!-- FORMULARIO PARA CREAR UN USER -->
                        <form method="post">
                            <tr>
                                <td colspan="2"><h1>CREAR USER</h1></td>
                            </tr>
                            <tr>
                                <td><label>Introduce el DNI</label></td>
                                <td><input type="text" name="dni_user"></td>
                            </tr>
                            <tr>
                                <td><label>Introduce el nombre</label></td>
                                <td><input type="text" name="nombre_user"></td>
                            </tr>
                            <tr>
                                <td><label>Introduce el apellido</label></td>
                                <td><input type="text" name="apellido_user"></td>
                            </tr>
                            <tr>
                                <td><label>Introduce los puntos</label></td>
                                <td><input type="text" name="puntos_user"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="ENVIAR" style="margin-top: 10px;"></td>
                            </tr>
                        </form>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
    // CLASE 'Persona'
    class Persona {
        // ATRIBUTOS DE LA CLASE
        private $dni;
        private $nombre;
        private $apellido;

        // CONSTRUCTOR QUE INICIALIZA LOS ATRIBUTOS DE LA CLASE CON LOS RECIBIDOS POR PARÁMETROS
        public function __construct($dni, $nombre, $apellido) {
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }

        // GETTERS
        public function getDni() {
            return $this->dni;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        // SETTERS
        public function setDni($dni) {
            $this->dni = $dni;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        // FUNCIÓN QUE DEVUELVE EN FORMATO STRING LA INFORMACIÓN DE LA PERSONA
        public function toString() {
            return "Persona: " . $this->nombre . " " . $this->apellido;
        }
    }

    // CLASE 'User' QUE EXTIENDE/HEREDA DE LA CLASE 'Persona'
    class User extends Persona {
        // ATRIBUTOS DE LA CLASE
        private $puntos;

        // CONSTRUCTOR QUE PASA AL CONSTRUCTOR PADRE E INICIALIZA SU ATRIBUTO DE LA CLASE CON LOS RECIBIDOS POR PARÁMETROS
        public function __construct($dni, $nombre, $apellido, $puntos) {
            parent::__construct($dni, $nombre, $apellido);
            $this->puntos = $puntos;
        }

        // GETTERS
        public function getPuntos() {
            return $this->puntos;
        }

        // SETTERS
        public function setPuntos($puntos) {
            $this->puntos = $puntos;
        }

        // FUNCIÓN QUE DEVUELVE EN FORMATO STRING LA INFORMACIÓN DEL USER
        public function toString() {
            return "User: " . $this->getNombre() . " " . $this->getApellido();
        }

        // FUNCIÓN QUE MUESTRA UN MENSAJE SI EL USER TIENE MENOS DE 100 PUNTOS
        public function mostrarSiMenosDeCienPuntos() {
            if ($this->puntos < 100) {
                return "Tienes menos de 100 puntos";
            }
        }
    }

    // SI LAS VARIABLES DEL FORMULARIO DE PERSONA (POR POST) ESTÁN DEFINIDAS Y NO ESTÁN VACÍAS CREAMOS UNA NUEVA PERSONA Y MOSTRAMOS SU INFORMACIÓN
    if (isset($_POST['dni_persona']) && !empty($_POST['dni_persona']) && isset($_POST['nombre_persona']) && !empty($_POST['nombre_persona']) && isset($_POST['apellido_persona']) && !empty($_POST['apellido_persona'])) {
        $dni_persona = $_POST['dni_persona'];
        $nombre_persona = $_POST['nombre_persona'];
        $apellido_persona = $_POST['apellido_persona'];

        $persona = new Persona($dni_persona, $nombre_persona, $apellido_persona);
        echo "<p style='width: 100vw; text-align: center;'>" . $persona->toString() . "<p>";
    }

    // SI LAS VARIABLES DEL FORMULARIO DE USER (POR POST) ESTÁN DEFINIDAS Y NO ESTÁN VACÍAS CREAMOS UN NUEVO USER, MOSTRAMOS SU INFORMACIÓN Y UN MENSAJE SI TIENE MENOS DE 100 PUNTOS
    if (isset($_POST['dni_user']) && !empty($_POST['dni_user']) && isset($_POST['nombre_user']) && !empty($_POST['nombre_user']) && isset($_POST['apellido_user']) && !empty($_POST['apellido_user']) && isset($_POST['puntos_user']) && !empty($_POST['puntos_user'])) {
        $dni_user = $_POST['dni_user'];
        $nombre_user = $_POST['nombre_user'];
        $apellido_user = $_POST['apellido_user'];
        $puntos_user = $_POST['puntos_user'];

        $user = new User($dni_user, $nombre_user, $apellido_user, $puntos_user);
        echo "<p style='width: 100vw; text-align: center;'>" . $user->toString() . "<p>";
        echo "<p style='width: 100vw; text-align: center;'>" . $user->mostrarSiMenosDeCienPuntos() . "<p>";
    }

?>