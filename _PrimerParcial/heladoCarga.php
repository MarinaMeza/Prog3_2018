<?php
    require_once 'clases/helado.php';

    $helado = new Helado($_GET['sabor'], $_GET['precio'], $_GET['tipo'], $_GET['cantidad']);

    if (Helado::HeladoCarga($helado)) {
        $respuesta = "El helado se pudo cargar exitosamente";
    } else {
        $respuesta = "Error. No pudo cargarse el helado";
    }

    echo $respuesta;
?>