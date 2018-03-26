<?php
    $salida = '';

    $lapicera1 = array(
        'color' => "negro",
        'marca' => "Micro",
        'trazo' => "fino",
        'precio' => 35
     );

     $lapicera2 = array(
         'color' => "azul", 
         'marca' => "Bic",
         'trazo' => "grueso",
         'precio' => 5
        
    );

    $lapicera3 = array(
        'color' => "rojo",
        'marca' => "Faber Castell",
        'trazo' => "medio",
        'precio' => 6
    );
    
    $salida = "Lapicera 1<br>";
    foreach ($lapicera1 as $value) {
        $salida .= $value."<br>";
    }

    $salida .= "<br>Lapicera 2<br>";
    foreach ($lapicera2 as $value) {
        $salida .= $value."<br>";
    }

    $salida .= "<br>Lapicera 3<br>";
    foreach ($lapicera3 as $value) {
        $salida .= $value."<br>";
    }

    echo $salida;
?>