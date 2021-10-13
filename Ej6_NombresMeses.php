<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOMBRES / MESES</title>
</head>
<body>
    <center>
        <!-- FORMULARIO DE INSERCIÓN DE DATOS -->
        <form method="post">
            <table style="text-align: center;">
                <tr>
                    <td colspan="2"><h1>NOMBRES / MESES DEL AÑO</h1></td>
                </tr>
                <tr>
                    <td><label>Introduce un nombre</label></td>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td><label>Introduce el mes del año</label></td>
                    <td><input type="text" name="mes"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="ENVIAR" style="margin-top: 10px;"></td>
                </tr>
            </table>

            <?php
                // CLASE
                class NombresMeses {
                    // ATRIBUTO DE LA CLASE, UN ARRAY ASOCIATIVO DÓNDE EL MES SERÁ LA CLAVE Y LOS NOMBRES DE PERSONAS SU VALOR
                    private $array_asoc_meses = [];
                    
                    // CONSTRUCTOR QUE RECIBE UN ARRAY ASOCIATIVO Y LO ASIGNA AL SUYO PROPIO DE LA CLASE
                    public function __construct($array_asoc_meses) {
                        $this->array_asoc_meses = $array_asoc_meses;
                    }

                    // FUNCIÓN QUE RECIBE UN MES Y UN NOMBRE POR PARÁMETRO E INSERTA O MODIFICA UN REGISTRO EN EL ARRAY ASOCIATIVO, DEVUELVE EL Nº DE PERSONAS AÑADIDAS
                    public function insertarNombre($nombre, $mes) {
                        if (array_key_exists($mes, $this->array_asoc_meses)) {
                            $this->array_asoc_meses[$mes] .= ", " . $nombre;
                        }
                        else {
                            $this->array_asoc_meses[$mes] = $nombre;
                        }

                        $cont_personas = 0;

                        foreach ($this->array_asoc_meses as $mes => $nombres) {
                            $cont_personas += count(explode(", ", $nombres));
                        }
                        return $cont_personas - 1;
                    }

                    // FUNCIÓN QUE MUESTRA EL ARRAY ASOCIATIVO EN FORMA DE TABLA
                    public function mostrarArrayAsocMeses() {
                        $cod_html = "<br><center><table border='1' style='font-size: 2rem; text-align: center;'>";
                        $cod_html .= "<tr><td>MESES</td><td>NOMBRES</td></tr>";

                        foreach ($this->array_asoc_meses as $mes => $nombres) {
                            $cod_html .= "<tr><td style='padding: 5px;'>" . $mes . "</td><td style='padding: 5px;'>" . $nombres . "</td></tr>";
                        }

                        $cod_html .= "</table></center>";
                        echo $cod_html;
                    }
                }

                // DECLARACIÓN DE VARIABLES
                $nombres = [];
                $meses = [];
                $array_asoc_meses = [];
                $meses1;

                // SI HEMOS RECIBIDO LAS VARIABLES POR POST DE LOS INPUT HIDDEN ENTONCES LAS FORMATEAMOS A ARRAYS E INSERTAMOS/MODIFICAMOS REGISTROS EN EL ARRAY ASOCIATIVO
                // ESTO LO HACEMOS PARA MANTENER ACTUALIZADO EL ARRAY ASOCIATIVO, YA QUE AL RECARGAR LA PÁGINA PERDEMOS LOS VALORES DEL MISMO
                if (isset($_POST['nombres']) && isset($_POST['meses'])) {
                    $nombres = explode(",", $_POST['nombres']);
                    $meses = explode(",", $_POST['meses']);

                    for ($i = 0; $i < count($meses); $i++) {
                        if (array_key_exists($meses[$i], $array_asoc_meses)) {
                            $array_asoc_meses[$meses[$i]] .= ", " . $nombres[$i];
                        }
                        else {
                            $array_asoc_meses[$meses[$i]] = $nombres[$i];
                        }
                    }
                }

                // INSTANCIAMOS LA CLASE PASÁNDOLE EL ARRAY ASOCIATIVO COMO PARÁMETRO
                $meses1 = new NombresMeses($array_asoc_meses);

                // SI LAS VARIABLES PASADAS POR POST 'nombre' Y 'mes' ESTÁN DEFINIDAS Y NO ESTÁN VACÍAS ACTUALIZAMOS LOS ARRAYS DE NOMBRES Y MESES, AÑADIMOS EL NOMBRE AL ARRAY ASOCIATIVO
                // DE LA CLASE Y LO MOSTRAMOS
                if (isset($_POST['nombre']) && !empty($_POST['nombre'])  && isset($_POST['mes']) && !empty($_POST['mes'])) {
                    $nombre = $_POST['nombre'];
                    $mes = strtoupper($_POST['mes']);
                    array_push($nombres, $nombre);
                    array_push($meses, $mes);

                    echo "<br>Nº personas añadidas: " . $meses1->insertarNombre($nombre, $mes) . "<br>";
                    $meses1->mostrarArrayAsocMeses();
                }
                // SI NO MOSTRAMOS UN MENSAJE AVISANDO DE QUE SE DEBEN RELLENAR LOS CAMPOS
                else {
                    echo "<br>Debes rellenar los campos";
                }
            ?>

            <!-- IMPUTS HIDDEN QUE ENVIARAN LOS ARRAYS 'nombres' y 'meses' EN FORMATO STRING SEPARADOS CON COMAS -->
            <input type="hidden" name="nombres" value="<?php if (!empty($nombres)){echo implode(",", $nombres);} ?>">
            <input type="hidden" name="meses" value="<?php if (!empty($meses)){echo implode(",", $meses);} ?>">
        </form>
    </center>
</body>
</html>