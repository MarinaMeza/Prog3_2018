<?php
    
    $numero = $_POST["numero"];
    
    function esPar($pNumero) {
        $respuesta = '';
        if (($pNumero%2)==0) {
            $respuesta = TRUE;
        }else {
            $respuesta = FALSE;
        }
        return $respuesta;
    }

    function esImpar($pNumero) {
        $respuesta = '';
        if (($pNumero%2)!=0) {
            $respuesta = TRUE;
        }else {
            $respuesta = FALSE;
        }
        return $respuesta;
    }

    echo esImpar($numero);
?>