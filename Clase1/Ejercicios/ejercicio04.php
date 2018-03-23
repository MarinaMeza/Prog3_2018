<?php
    $operador = $_POST["operador"];
    $op1 = rand(0,10);
    $op2 = rand(0,10);
    
    $respuesta = "$op1 $operador $op2 = ";

    switch ($operador) {
        case '+':
            $respuesta .= $op1 + $op2;
            break;
        case '-':
            $respuesta .= $op1 - $op2;
            break;
        case '*':
            $respuesta .= $op1 * $op2;
            break;
        case '/':
            if ($op2 == 0) {
                $respuesta = "No se puede dividir por 0";
            } else {
                $respuesta .= $op1 / $op2;
            }
            break;
        default:
            $respuesta = "Operador inválido";
            break;
    }

    echo $respuesta;
?>