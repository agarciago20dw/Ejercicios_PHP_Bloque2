<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 PALABRAS</title>
</head>
<body>
    <center>
        <form method="get">
            <table style="text-align: center;">
                <tr>
                    <td colspan="2"><h1>5 PALABRAS</h1></td>
                </tr>
                <tr>
                    <td><label>1º palabra</label></td>
                    <td><input type="text" name="pal1"></td>
                </tr>
                <tr>
                    <td><label>2º palabra</label></td>
                    <td><input type="text" name="pal2"></td>
                </tr>
                <tr>
                    <td><label>3º palabra</label></td>
                    <td><input type="text" name="pal3"></td>
                </tr>
                <tr>
                    <td><label>4º palabra</label></td>
                    <td><input type="text" name="pal4"></td>
                </tr>
                <tr>
                    <td><label>5º palabra</label></td>
                    <td><input type="text" name="pal5"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="ENVIAR" style="margin-top: 10px;;"></td>
                </tr>
            </table> 
        </form>
    </center>
</body>
</html>



<?php

    class StringCincoPalabras {
        private $palabras;
        private $array_asoc_palabras;

        public function __construct($palabras) {
            $this->palabras = $palabras;
            $this->transformarEnArrayAsoc();
        }

        private function transformarEnArrayAsoc() {
            for ($i = 0; $i < count($this->palabras); $i++) {
                $this->array_asoc_palabras[$this->palabras[$i]] = strlen($this->palabras[$i]); 
            }
        }

        public function mostrarArrayAsocPalabras() {
            $cod_html = "<br><center><table border='1' style='font-size: 2rem;'>";
            $cod_html .= "<tr>";
            foreach ($this->array_asoc_palabras as $palabra=>$longitud) {
                $cod_html .= "<tr><td style='padding: 5px;'>Palabra: " . $palabra . "</td><td>Longitud: " . $longitud . "</td></tr>"; 
            }
            $cod_html .= "</tr>";
            $cod_html .= "</table></center>";
            return $cod_html;
        }
    }
    
    if ((isset($_GET['pal1'])) && (isset($_GET['pal2'])) && (isset($_GET['pal3'])) && (isset($_GET['pal4'])) && (isset($_GET['pal5']))) {
        $palabras = array($_GET['pal1'], $_GET['pal2'], $_GET['pal3'], $_GET['pal4'], $_GET['pal5']); 
        $string1 = new StringCincoPalabras($palabras);
        echo $string1->mostrarArrayAsocPalabras();
    }

?>