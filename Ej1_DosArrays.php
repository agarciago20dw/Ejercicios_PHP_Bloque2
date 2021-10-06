<?php

    class DosArrays {
        private $array_1;
        private $array_2;

        public function __construct() {
            $this->rellenarArray1();
            $this->rellenarArray2();
        }

        private function rellenarArray1() {
            for ($i = 0; $i < 10; $i++) {
                $this->array_1[$i] = $i;
            }
        }

        private function rellenarArray2() {
            for ($i = 0; $i < 10; $i++) {
                if ($i == 0) {
                    $this->array_2[$i] = 1;
                }
                else {
                    $this->array_2[$i] = $this->calcularFactorial($this->array_1[$i]); 
                }   
            }
        }

        private function calcularFactorial($num) {
            $resultado = 0;
            for ($i = 1; $i <= $num; $i++) {
                $resultado += $i;
            }
            return $resultado;
        }

        public function mostrarArrays()  {
            // TABLA '$array_1'
            $cod_html = "<table border='1' style='text-align: center; font-size: 2rem;'>";
            $cod_html .= "<tr>";
            $cod_html .= "<td style='padding: 10px;'>ARRAY_1</td>";
            for ($j = 0; $j < count($this->array_1); $j++) {
                $cod_html .= "<td style='padding: 10px;'>".$this->array_1[$j]."</td>";
            }
            $cod_html .= "</tr>";
            $cod_html .= "</table><br>";

            // TABLA '$array_2'
            $cod_html .= "<table border='1' style='text-align: center; font-size: 2rem;''>";
            $cod_html .= "<tr>";
            $cod_html .= "<td style='padding: 10px;'>ARRAY_2</td>";
            for ($j = 0; $j < count($this->array_2); $j++) {
                $cod_html .= "<td style='padding: 10px;'>".$this->array_2[$j]."</td>";
            }
            $cod_html .= "</tr>";
            $cod_html .= "</table>";

            echo $cod_html;
        }

    }

    $arrays = new DosArrays();
    $arrays->mostrarArrays();

?>