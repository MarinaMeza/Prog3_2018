<?php
    require_once 'clases/venta.php';
    require_once 'clases/helado.php';

    $venta = new Venta($_POST['email'], $_POST['sabor'], $_POST['tipo'], $_POST['cantidad']);

    $respuesta = '';
    
        //var_dump($venta);
        
        if (Venta::AltaVenta($venta)) {
            $respuesta = "Se realizo la venta";
        }else {
            $respuesta = "No pudo realizarse la venta";
        }
    
        echo $respuesta;
?>