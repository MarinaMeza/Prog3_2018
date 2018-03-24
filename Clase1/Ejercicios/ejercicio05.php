<?php
    $num = $_POST["numero"];
    $numString [] = '';
    $respuesta = '';

    $numString = $num;

    if($num <20 || $num >60) {
        $respuesta = "Error. El número ingresado debe ser mayor a 20 y menor a 60";
    } else {
        if($num == 20) {
            $respuesta = "Veinte";
        } else {
            switch ($numString[0]) {
                case '2':
                    $respuesta = "veinti";
                    break;
                case '3':
                    $respuesta = "treinta";
                    break;
                case '4':
                    $respuesta = "cuarenta";
                    break;
                case '5':
                    $respuesta = "cincuenta";
                    break;
                default:
                    $respuesta = "sesenta";
                    break;
            }
            if ($numString[0] != 2 && $numString[0] != 6) {
                $respuesta .= " y ";
            }
            switch ($numString[1]) {
                case '1':
                    $respuesta .= "uno";
                    break;
                case '2':
                    $respuesta .= "dos";
                    break;
                case '3':
                    $respuesta .= "tres";
                    break;
                case '4':
                    $respuesta .= "cuatro";
                    break;
                case '5':
                    $respuesta .= "cinco";
                    break;
                case '6':
                    $respuesta .= "seis";
                    break;
                case '7':
                    $respuesta .= "siete";
                    break;
                case '8':
                    $respuesta .= "ocho";
                    break;
                case '9':
                    $respuesta .= "nueve";
                    break;
                default:
                    break;
            }
        }
    }

    echo $respuesta;
?>