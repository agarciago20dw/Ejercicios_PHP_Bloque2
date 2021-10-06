<?php
    try {
        if (file_exists("config.php")) {
            header("Location:config.php");
        }
        else {
            throw new Exception("No se ha encontrado el fichero");
        }    
    }
    catch (Exception $e) {
        echo "No se ha encontrado el archivo config.php";
    }
?>