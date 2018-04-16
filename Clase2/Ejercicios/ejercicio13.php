<?php

    $respuesta = '';
    $palabra = $_POST["palabra"];
    $max = $_POST["max"];

    if (strlen($palabra) > $max) {
        $respuesta = "La palabra es demasiado larga";
    }elseif ( (strnatcasecmp($palabra,"Recuperatorio")) == 0 ||
              (strnatcasecmp($palabra,"Parcial")) == 0 ||
              (strnatcasecmp($palabra,"Programacion")) == 0 ) {
        $respuesta = 1;
    }else {
        $respuesta = 0;
    }
    echo $respuesta;
?>