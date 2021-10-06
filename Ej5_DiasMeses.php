<?php

    class DiasMeses {
        private $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        private $array_asoc_meses;
        
        public function __construct() {
            $this->rellenarArrayAsoc();
        }

        private function rellenarArrayAsoc() {
            for ($i = 0; $i < count($this->meses); $i++) {
                if ($this->meses[$i] == "Enero" || $this->meses[$i] == "Marzo" || $this->meses[$i] == "Mayo" || $this->meses[$i] == "Julio" || $this->meses[$i] == "Agosto" || $this->meses[$i] == "Octubre" || $this->meses[$i] == "Diciembre") {
                    $this->array_asoc_meses[$this->meses[$i]] = 31;
                }
                else if ($this->meses[$i] == "Abril" || $this->meses[$i] == "Junio" || $this->meses[$i] == "Septiembre" || $this->meses[$i] == "Noviembre") {
                    $this->array_asoc_meses[$this->meses[$i]] = 30;
                }
                else {
                    $this->array_asoc_meses[$this->meses[$i]] = 28;
                }
            }
        }

        public function mostrarArrayAsocMeses() {
            $cod_html = "<br><center><table border='1' style='font-size: 2rem;'>";
            foreach ($this->array_asoc_meses as $mes=>$dias) {
                $cod_html .= "<tr><td style='padding: 5px;'>" . $mes . "</td><td> " . $dias . "</td></tr>"; 
            }
            $cod_html .= "</table></center>";
            return $cod_html;
        }

    }

    $meses1 = new DiasMeses();
    echo $meses1->mostrarArrayAsocMeses();

?>