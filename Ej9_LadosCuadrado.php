<?php
    //CLASE
    class LadosCuadrado {
        // ATRIBUTO DE LA CLASE, UN ARRAY QUE CONTENDRÁ LOS LADOS DE LOS CUADRADOS
        private $lados;

        // CONSTRUCTOR QUE LLAMA A LA FUNCIÓN PRIVADA QUE RELLENA EL ARRAY
        public function __construct() {
            $this->rellenarArrayLados();
        }

        // FUNCIÓN PRIVADA QUE RELLENA EL ARRAY DE LADOS CON 5 NÚMEROS COMPRENDIDOS ENTRE EL -10 Y EL 10
        private function rellenarArrayLados() {
            for ($i = 0; $i < 5; $i++) {
                $this->lados[$i] = rand(-10, 10);
            }
        }

        // FUNCIÓN QUE MUESTRA EN FORMA DE TABLA EL ÁREA DE LOS CUADRADOS RECORRIENDO EL ARRAY DE LADOS
        public function mostrarAreaCuadrados() {
            $cod_html = "<br><br><center><table border='1' style='font-size: 2rem; text-align: center;'>";

            $cod_html .= "<tr><td>LADO</td><td>ÁREA</td></tr>";
            for ($i = 0; $i < count($this->lados); $i++) {
                $resultado = 0;
                // UTILIZAMOS EL BLOQUE TRY CATCH PARA CAPTURAR LA POSIBLE EXCEPCIÓN
                try {
                    $resultado = $this->calcularArea($this->lados[$i]);
                }
                // EN CASO DE QUE SE PRODUZCA MOSTRAMOS EL MENSAJE DE LA MISMA
                catch (Exception $e) {
                    $resultado = $e->getMessage();
                }
                $cod_html .= "<tr><td>" . $this->lados[$i] . "</td><td>" . $resultado . "</td></tr>";
            }

            $cod_html .= "</table></center>";
            echo $cod_html;
        }

        // FUNCIÓN QUE RECIBE UN DETERMINADO LADO POR PARÁMETRO Y DEVUELVE SU ÁREA, LANZA UNA EXCEPCIÓN EN CASO DE QUE EL LADO SEA UN NÚMERO NEGATIVO
        private function calcularArea($lado) {
            if ($lado < 0) {
                throw new Exception("El lado es negativo");
            }
            else {
                return $lado * $lado;
            }
        }

    }

    // INSTANCIAMOS LA CLASE Y MOSTRAMOS EL ÁREA DE LOS CUADRADOS
    $lados1 = new LadosCuadrado();
    $lados1->mostrarAreaCuadrados();
    
?>