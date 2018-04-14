<?php

    $respuesta = '';

    for ($i=1; $i <= 4; $i++) { 
        for ($j=1; $j <= 4; $j++) { 
            $respuesta .= "$i^$j = ".pow($i, $j).'<br>';
        }
    }

    echo $respuesta;
?>