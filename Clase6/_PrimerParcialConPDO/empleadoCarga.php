<?php
    require_once 'clases/empleado.php';
    require_once 'clases/AccesoDatos.php';

    $empleado = new Empleado($_GET['nombre'], $_GET['turno'], $_GET['tipo']);
    
    $ultimoId = $empleado->InsertarEmpleado();
    print("Ultimo ID: $ultimoId <br>");
?>