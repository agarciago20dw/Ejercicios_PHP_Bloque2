<?php

    class Array20Numeros {
        private $array_numeros;

        public function __construct() {
            $this->rellenarArray();
        }

        private function rellenarArray() {
            for ($i = 0; $i < 20; $i ++) {
                $this->array_numeros[$i] = rand(1, 50);
            }
        }

        public function mostrarArray() {
            sort($this->array_numeros);
            $menor = $this->calcularMenor();
            $mayor = $this->calcularMayor();

            $tabla = "<table border='1' style='text-align: center;'><tr>";
            for ($i = 0;$i < count($this->array_numeros); $i++) {
                if ($this->array_numeros[$i] == $menor) {
                    $tabla .= "<td style='background-color: blue; color: white;'>".$this->array_numeros[$i]."</td>";
                }
                else if ($this->array_numeros[$i] == $mayor) {
                    $tabla .= "<td style='background-color: green; color: white;'>".$this->array_numeros[$i]."</td>";
                }
                else {
                    $tabla .= "<td>".$this->array_numeros[$i]."</td>";
                }
                
            }
            $tabla .= "</tr></tabla>";
            echo $tabla;
        }

        private function calcularMenor() {
            $menor = 0;
            for ($i = 0; $i < count($this->array_numeros); $i ++) {
                if ($i == 0) {
                    $menor = $this->array_numeros[$i];
                }
                else {
                    if ($this->array_numeros[$i] < $menor) {
                        $menor = $this->array_numeros[$i];
                    }
                }
            }
            return $menor;
        }

        private function calcularMayor() {
            $mayor = 0;
            for ($i = 0; $i < count($this->array_numeros); $i ++) {
                if ($this->array_numeros[$i] > $mayor) {
                    $mayor = $this->array_numeros[$i];
                }
            }
            return $mayor;
        }

        public function mostrarSumaMedia() {
            $suma = $this->calcularSuma();
            $media = $this->calcularMedia();

            $tabla = "<table border='1' style='text-align: center;'>";
            $tabla .= "<tr><td>SUMA DE TODOS LOS NÚMEROS: </td><td>".number_format($suma, 2)."</td></tr>";
            $tabla .= "<tr><td>MEDIA DE TODOS LOS NÚMEROS: </td><td>".number_format($media, 2)."</td></tr>";
            $tabla .= "</tabla>";
            echo $tabla;

        }

        private function calcularSuma() {
            $suma = 0;
            for ($i = 0; $i < count($this->array_numeros); $i ++) {
                $suma += $this->array_numeros[$i];
            }
            return $suma;
        }

        private function calcularMedia() {
            $media = $this->calcularSuma() / count($this->array_numeros);
            return $media;
        }

    }

    $array1 = new Array20Numeros();
    $array1->mostrarArray();
    $array1->mostrarSumaMedia();

?>