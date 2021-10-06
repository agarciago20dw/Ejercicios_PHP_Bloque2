<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla a Medida</title>
</head>
<body>
    <center>
        <form method="get">
            <table style="text-align: center;">
                <tr>
                    <td colspan="2"><h1>TABLA A MEDIDA</h1></td>
                </tr>
                <tr>
                    <td><label>Nº filas</label></td>
                    <td><input type="text" name="filas"></td>
                </tr>
                <tr>
                    <td><label>Nº columnas</label></td>
                    <td><input type="text" name="columnas"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="ENVIAR" style="margin-top: 10px;"></td>
                </tr>
            </table> 
        </form>
    </center>
</body>
</html>



<?php

    class Tabla {
        public function mostrarTabla($filas, $columnas) {
            $tabla = "<br><center><table border='1' style='text-align: center;'>";

            for ($i = 1; $i <= $filas; $i++) {
                $tabla .= "<tr>";
                for ($j = 1; $j <= $columnas; $j++) {
                    $tabla .= "<td>Fila ".$i.", Columna ".$j."</td>";
                }
                $tabla .= "<tr>";
            }
            $tabla .= "</table></center>";
            echo $tabla;
        }
    }

    if ((isset($_GET['filas'])) && (isset($_GET['columnas']))) {
        $tabla1 = new Tabla();
        $filas = $_GET['filas'];
        $columnas = $_GET['columnas'];
        
        $tabla1->mostrarTabla($filas, $columnas);
    }
    

?>