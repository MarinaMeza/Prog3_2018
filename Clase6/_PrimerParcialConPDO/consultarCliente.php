<?php
    require_once 'clases/cliente.php';
    require_once 'clases/AccesoDatos.php';

    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : NULL;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;

    $todosLosClientes = Cliente::TraerTodosBD();
    $retorno = '';
    $flag = FALSE;

    foreach ($todosLosClientes as $cliente) {
        if ($cliente->nacionalidad == $nacionalidad && $cliente->sexo == $sexo) {
            $retorno .= "<b>Nombre: ".$cliente->nombre."</b><br>";
            $retorno .= "Nacionalidad: ".$cliente->nacionalidad."<br>";
            if ($cliente->sexo == 'f') {
                $retorno .= "Sexo: femenino<br>";
            }else {
                $retorno .= "Sexo: masculino<br>";
            }
            $retorno .= "Edad: ".$cliente->edad."<br>";
            $retorno .= "<br>";
            $flag = TRUE;
        }
    }

    if (!$flag) {
        $retorno = "No hay clientes de sexo: ".$sexo."<br>";
        if ($cliente->nacionalidad != $nacionalidad && $cliente->sexo == $sexo) {
            $retorno = "No hay clientes de nacionalidad: ".$nacionalidad."<br>";
        }else if ($cliente->nacionalidad != $nacionalidad){
            $retorno .= "No hay clientes de nacionalidad: ".$nacionalidad."<br>";
        }
    }

    echo $retorno;
?>