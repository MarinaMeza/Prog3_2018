<?php
    require_once 'clases/cliente.php';
    require_once 'clases/AccesoDatos.php';

    $cliente = new Cliente($_GET['nombre'], $_GET['nacionalidad'], $_GET['sexo'], $_GET['edad']);

    $ultimoId = $cliente->InsertarCliente();
    print("Ultimo ID: $ultimoId <br>");
?>