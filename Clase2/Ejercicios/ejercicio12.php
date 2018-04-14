<?php

    $respuesta = '';
    
    $palabra = $_POST["palabra"];
    $respuesta = strrev($palabra);
    
    echo $respuesta;
?>