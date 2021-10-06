<?php

    class LadosCuadrado {

        private $lados;

        public function __construct() {
            $this->rellenarArrayLados();
        }

        private function rellenarArrayLados() {
            for ($i = 0; $i < 5; $i++) {
                $this->lados[$i] = rand(-10, 10);
            }
        }

        public function mostrarAreaCuadrados() {
            $cod_html = "<br><br><center><table border='1' style='font-size: 2rem;'>";

            $cod_html .= "<tr><td>LADO</td><td>ÁREA</td></tr>";
            for ($i = 0; $i < count($this->lados); $i++) {
                $resultado = 0;
                try {
                    $resultado = $this->calcularArea($this->lados[$i]);
                }
                catch (Exception $e) {
                    echo "<br>" . $e->getMessage();
                }
                $cod_html .= "<tr><td>" . $this->lados[$i] . "</td><td>" . $resultado . "</td></tr>";
            }

            $cod_html .= "</table></center>";
            return $cod_html;
        }

        private function calcularArea($lado) {
            if ($lado < 0) {
                throw new Exception("El lado es negativo");
            }
            else {
                return $lado * $lado;
            }
        }

    }

    $lados1 = new LadosCuadrado();
    echo $lados1->mostrarAreaCuadrados();
    
?>