<?php
    $acum = 0;
    $promedio = null;
    $intArray = array (rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10));
    
    //var_dump($intArray);
    for ($i=0; $i < 5; $i++) { 
        $acum += $intArray[$i];
    }

    $promedio = $acum / 5;

    if ($promedio == 6) {
        $respuesta = "El promedio es igual a 6";
    }else if ($promedio > 6) {
        $respuesta = "El promedio es mayor a 6";
    }else {
        $respuesta = "El promedio es menor a 6";
    }

    echo $respuesta;
?>