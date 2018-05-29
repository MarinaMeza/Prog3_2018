<?php
    require_once 'clases/cliente.php';
    require_once 'clases/AccesoDatos.php';

    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : NULL;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;

    $todosLosClientes = Cliente::TraerTodosBD();
    $retorno = '';

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
        }
    }
    echo $retorno;
?>