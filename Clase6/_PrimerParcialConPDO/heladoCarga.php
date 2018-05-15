<?php
    require_once 'clases/helado.php';
    require_once 'clases/AccesoDatos.php';

    $helado = new Helado($_GET['sabor'], $_GET['precio'], $_GET['tipo'], $_GET['cantidad']);
    //var_dump($helado);
/*
    if (Helado::HeladoCarga($helado)) {
        $respuesta = "El helado se pudo cargar exitosamente";
    } else {
        $respuesta = "Error. No pudo cargarse el helado";
    }*//*
    $helado = new Helado();
    $helado->sabor = $_GET['sabor'];
    $helado->precio = $_GET['precio'];
    $helado->tipo = $_GET['tipo'];
    $helado->cantidad = $_GET['cantidad'];*/
    $UltimoId = $helado->InsertarHelado();
    print("Ultimo ID: $UltimoId <br> ");
    //echo $respuesta;
?>