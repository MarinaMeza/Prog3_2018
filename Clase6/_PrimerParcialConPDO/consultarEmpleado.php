<?php
    require_once 'clases/empleado.php';
    require_once 'clases/AccesoDatos.php';

    $turno = isset($_POST['turno']) ? $_POST['turno'] : NULL;
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;

    $todosLosEmpleados = Empleado::TraerTodosBD();
    $retorno = '';
    $flag = FALSE;

    foreach ($todosLosEmpleados as $empleado) {
        if ($empleado->turno == $turno && $empleado->tipo == $tipo) {
            $retorno .= "<b>Nombre: ".$empleado->nombre."</b><br>";
            $retorno .= "Turno: ".$empleado->turno."<br>";
            $retorno .= "tipo: ".$empleado->tipo."<br>";
            $retorno .= "<br>";
            $flag = TRUE;
        }
    }

    if (!$flag) {
        $retorno = "No hay empleados del turno: ".$turno."<br>";
        if ($empleado->tipo != $tipo && $empleado->turno == $turno) {
            $retorno = "No hay empleados de tipo: ".$tipo."<br>";
        }else if ($empleado->tipo != $tipo){
            $retorno .= "No hay empleados de tipo: ".$tipo."<br>";
        }
    }

    echo $retorno;
?>