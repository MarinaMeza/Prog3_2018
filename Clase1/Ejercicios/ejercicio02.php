<?php

    $fecha = date("d/m/Y");
    $fecha .= "<br>";
    $fecha .= date("d-F-Y");
    $mes = date("n");
    $diaDelMes = date("j");
    /*$mes = 11;
    $diaDelMes = 21;*/
    switch ($mes) {
        case 3:
        case 4:
        case 5:
            if ($mes == 3 && $diaDelMes < 21) {
                $fecha .= "<br> Es verano <br>";
            } else {
                $fecha .= "<br> Es otoño <br>";
            }
            break;
        case 6:
        case 7:
        case 8:
            if ($mes == 6 && $diaDelMes < 21) {
                $fecha .= "<br> Es otoño <br>";
            } else {
                $fecha .= "<br> Es invierno <br>";
            }
            break;
        case 9:
        case 10:
        case 11:
            if ($mes == 9 && $diaDelMes < 21) {
                $fecha .= "<br> Es invierno <br>";
            } else {
                $fecha .= "<br> Es primavera <br>";
            }
            break;
        default:
            if ($mes == 12 && $diaDelMes < 21) {
                $fecha .= "<br> Es primavera <br>";
            } else {
                $fecha .= "<br> Es verano <br>";
            }
            break;
    }

    echo $fecha;
?>