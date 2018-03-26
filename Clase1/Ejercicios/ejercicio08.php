<?php
    
    $salida = '';

    $v[1] = 90;
    $v[30] = 7;
    $v['e'] = 99;
    $v['hola'] = 'mundo';

    foreach ($v as $value) {
        $salida .= $value;
    }

    echo $salida;

?>