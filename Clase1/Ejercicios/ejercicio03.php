<?php
  /*  
    $a = 6;
    $b = 9;
    $c = 8;/*
/*  $a = 5;
    $b = 1;
    $c = 5;
    */
    
    $a = rand(1,15);
    $b = rand(1,15);
    $c = rand(1,15);

    $respuesta = "a = $a <br>b = $b <br>c = $c <br>";
    if ($a == $b || $b == $c || $a == $c){
        $respuesta .= "No hay valor del medio";
    } else {
        if ( ($a > $b && $a < $c) || ($a < $b && $a > $c) ) {
            $respuesta .= $a;
        }
        else if ( ($b > $c && $b < $a) || ($b < $c && $b > $a) ) {
            $respuesta .= $b;
        }
        else {
            $respuesta .= $c;
        }
    }
    echo $respuesta;
?>