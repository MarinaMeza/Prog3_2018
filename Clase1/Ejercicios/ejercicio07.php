<?php

    $arrayInt = array();
    $cont = 0;
    $a =0;

    for ($i=0; $cont < 10; $i++) { 
        if (($i%2)!=0) {
            array_push($arrayInt, $i);
            $cont++;
        }
    }

    $salida = '';

    $salida = "FOR<br>";
    for ($i=0; $i < count($arrayInt); $i++) { 
        $salida .= $arrayInt[$i]."<br>";
    }

    $salida .= "<br>WHILE<br>";
    while ($a < count($arrayInt)) {
        $salida .= $arrayInt[$a]."<br>";
        $a++;
    }

    $salida .= "<br>FOREACH<br>";
    foreach ($arrayInt as $value) {
        $salida .= $value."<br>";
    }

    echo $salida;
?>