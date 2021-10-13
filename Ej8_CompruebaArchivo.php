<?php
    // UTILIZAMOS EL BLOQUE TRY CATCH PARA CATURAR LA POSIBLE EXCEPCIÓN QUE LANZAREMOS
    try {
        // SI EXISTE EL FICHERO NOS REDIRIGIREMOS A ÉL
        if (file_exists("config.php")) {
            header("Location:config.php");
        }
        // SI NO LANZAREMOS UNA EXCEPCIÓN CON EL MENSAJE OPORTUNO
        else {
            throw new Exception("No se ha encontrado el fichero");
        }    
    }
    // SI SE LLEGA A PRODUCIR LA EXCEPCIÓN LA CAPTURAMOS Y MOSTRAMOS EL MENSAJE
    catch (Exception $e) {
        echo $e->getMessage();
    }
?>