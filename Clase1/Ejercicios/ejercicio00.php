<?php
    $salida;

    $a = 2;
    $b = 1;
    $c = 3;

    if ($a > $b && $a > $c) {
        $salida = $a;
    }
    else if ($b > $a && $b > $c) {
        $salida = $b;
    }
    else { 
        $salida = $c;
    }

    echo $salida;
?>