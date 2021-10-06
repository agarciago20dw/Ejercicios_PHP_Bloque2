<?php

    class Persona {
        private $dni;
        private $nombre;
        private $apellido;

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

        public function toString() {
            return "Persona: " . $this->nombre . " " . $this->apellido;
        }
    }

    class User extends Persona {
        private $puntos;

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

        public function toString() {
            return "User: " . $this->getNombre() . " " . $this->getApellido();
        }

        public function mostrarSiMenosDeCienPuntos() {
            if ($this->puntos < 100) {
                echo "<br>Tienes menos de 100 puntos";
            }
        }
    }

    $letras = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    $nombres = array("Mikel", "Paula", "María", "Antxon", "Gorka", "Erick", "Leire", "Ignacio", "Alberto", "Marta", "Juanjo", "Merche", "Josune", "Txema", "Koke", "Amanda", "Fernando", "Xabi", "Nerea", "Íñigo");
    $apellidos = array("Fernández", "García", "Sánchez", "González", "Hermoso", "Ibañez", "Garmendia", "Rivas", "Casanova", "Martín");
    
    for ($i = 0; $i < 5; $i++) {
        $dni = rand(10000000, 99999999) . $letras[rand(0, count($letras) - 1)];
        $nombre = $nombres[rand(0, count($nombres) - 1)];
        $apellido = $apellidos[rand(0, count($apellidos) - 1)];

        $persona = new Persona($dni, $nombre, $apellido);
        echo "<br>" . $persona->toString() . "<br>";
    }

    for ($i = 0; $i < 5; $i++) {
        $dni = rand(10000000, 99999999) . $letras[rand(0, count($letras) - 1)];
        $nombre = $nombres[rand(0, count($nombres) - 1)];
        $apellido = $apellidos[rand(0, count($apellidos) - 1)];
        $puntos = rand(0, 200);

        $user = new User($dni, $nombre, $apellido, $puntos);
        echo "<br><br>" . $user->toString();
        $user->mostrarSiMenosDeCienPuntos();
    }

?>