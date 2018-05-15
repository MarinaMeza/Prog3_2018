<?php
    require_once "clases/helado.php";
    require_once "clases/venta.php";
    
    if(!file_exists('ImagenesDeLaVenta')) {
        mkdir('ImagenesDeLaVenta', 0777, true);
    }
    
    $venta = new Venta($_POST['email'], $_POST['sabor'], $_POST['tipo'], $_POST['cantidad'], $_FILES['foto']['name']);
    
    $respuesta = '';

    //var_dump($venta);
    
    if (Venta::AltaVentaConImagen($venta)) {
        $respuesta = "Se realizo la venta";
    }else {
        $respuesta = "No pudo realizarse la venta";
    }

    echo $respuesta;
?>