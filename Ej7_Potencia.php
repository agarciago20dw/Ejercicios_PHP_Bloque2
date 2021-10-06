<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
    <center>
        <form method="get">
            <table style="text-align: center;">
                <tr>
                    <td colspan="2"><h1>POTENCIA</h1></td>
                </tr>
                <tr>
                    <td><label>Base</label></td>
                    <td><input type="text" name="base"></td>
                </tr>
                <tr>
                    <td><label>Exponente (opcional, por defecto será 2)</label></td>
                    <td><input type="text" name="exponente"></td>
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

    class Potencia {
        public function CalcularPotencia($base, $exponente) {
            $resultado = pow($base, $exponente);
            return "<br><center><table border='1' style='font-size: 2rem;'><tr><td style='padding: 10px;'>" . $base . " elevado a " . $exponente . "</td><td style='padding: 10px;'>" . $resultado . "</td</tr>";
        }
    }

    if (isset($_GET['base'])) {
        $potencia1 = new Potencia();
        $base = intval($_GET['base']);
        $exponente;
        if ($_GET['exponente'] != "") {
            $exponente = intval($_GET['exponente']);
        }
        else {
            $exponente = 2;
        }
        echo $potencia1->CalcularPotencia($base, $exponente);
    }
    
?>