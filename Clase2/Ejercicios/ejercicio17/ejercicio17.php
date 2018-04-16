<?php
    require_once "clases/auto.php";

    $autoA1 = new Auto("Ford", "rojo");
    $autoA2 = new Auto("Ford", "azul");
    $autoB1 = new Auto("Audi", "azul", 500000);
    $autoB2 = new Auto("Audi", "azul", 500000);
    $autoC1 = new Auto("Fiat", "gris", 200000, "16/04/2018");

    $autoB1->AgregarImpuestos(1500);
    $autoB2->AgregarImpuestos(1500);
    $autoC1->AgregarImpuestos(1500);

    $respuesta = '';
    
    $auxAuto = 0;
    $auxAuto = Auto::Add($autoA1, $autoA2);
    if ($auxAuto == 0) {
        $respuesta = "Los autos no son de la misma marca y color<br>";
    }else {
        $respuesta = "Suma del precio de los primeros dos autos: ".$auxAuto."<br>";
    }

    if (!$autoA1->Equals($autoA1, $autoB2)) {
        $respuesta .= "El primer auto y el segundo no son iguales<br>";
    }else {
        $respuesta .= "El primer auto y el segundo son iguales<br>";
    }

    if (!$autoA1->Equals($autoA1, $autoC1)) {
        $respuesta .= "El primer auto y el quinto no son iguales<br>";
    }else {
        $respuesta .= "El primer auto y el quinto son iguales<br>";
    }

    $respuesta .= "<b>Auto 1: </b><br>".Auto::MostrarAuto($autoA1);
    $respuesta .= "<b>Auto 3: </b><br>".Auto::MostrarAuto($autoB1);
    $respuesta .= "<b>Auto 5: </b><br>".Auto::MostrarAuto($autoC1);

    echo $respuesta;
?>