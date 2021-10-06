<?php

    class NombresMeses {
        private $nombres = array("Mikel", "Paula", "María", "Antxon", "Gorka", "Erick", "Leire", "Ignacio", "Alberto", "Marta", "Juanjo", "Merche", "Josune", "Txema", "Koke", "Amanda", "Fernando", "Xabi", "Nerea", "Íñigo");
        private $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        private $array_asoc_meses;
        
        public function __construct() {
            $this->rellenarArrayAsoc();
        }

        private function rellenarArrayAsoc() {
            for ($i = 0; $i < count($this->nombres); $i++) {
                $mes = $this->meses[rand(0, 11)];
                if (isset($this->array_asoc_meses[$mes])) {
                    $this->array_asoc_meses[$mes] .= ", " . $this->nombres[$i];
                }
                else {
                    $this->array_asoc_meses[$mes] = $this->nombres[$i];
                }
            }
        }

        public function mostrarArrayAsocMeses() {
            $cod_html = "<br><center><table border='1' style='font-size: 2rem;'>";

            for ($i = 0; $i < count($this->meses); $i++) {
                if (array_key_exists($this->meses[$i], $this->array_asoc_meses)) {
                    $cod_html .= "<tr><td>" . $this->meses[$i] . "</td><td>" . $this->array_asoc_meses[$this->meses[$i]] . "</td></tr>";
                }
                else {
                    $cod_html .= "<tr><td>" . $this->meses[$i] . "</td><td></td></tr>";
                }
            }

            $cod_html .= "</table></center>";
            return $cod_html;
        }

    }

    $meses1 = new NombresMeses();
    echo $meses1->mostrarArrayAsocMeses();

?>