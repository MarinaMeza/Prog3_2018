<?php

    $salida = '';

    $arrayAsociativo = array(
        'Lapicera 1' => array(
            'color' => "negro",
            'marca' => "Micro",
            'trazo' => "fino",
            'precio' => 35
        ),
        'Lapicera 2' => array(
            'color' => "azul", 
            'marca' => "Bic",
            'trazo' => "grueso",
            'precio' => 5
        ),
        'Lapicera 3' => array(
            'color' => "rojo",
            'marca' => "Faber Castell",
            'trazo' => "medio",
            'precio' => 6
        )
    );

     $arrayIndexado = array(
        array(
            'color' => "negro",
            'marca' => "Micro",
            'trazo' => "fino",
            'precio' => 35
        ),
        array(
            'color' => "azul", 
            'marca' => "Bic",
            'trazo' => "grueso",
            'precio' => 5
        ),
        array(
            'color' => "rojo",
            'marca' => "Faber Castell",
            'trazo' => "medio",
            'precio' => 6
        )
    );

    $salida = "Array Asociativo<br>";
    foreach ($arrayAsociativo as $row => $innerArray) {
        $salida .= $row."<br>";
        foreach ($innerArray as $innerRow => $value) {
            $salida .= $value."<br>";
        }
    }

    $salida .= "<br>Array Indexado<br>";
    foreach ($arrayIndexado as $row => $innerArray) {
        $salida .= "Lapicera ".($row+1)."<br>";
        foreach ($innerArray as $innerRow => $value) {
            $salida .= $value."<br>";
        }
    }

    echo $salida;
?>