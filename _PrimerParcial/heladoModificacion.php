<?php
    require_once "clases/helado.php";

    if(!file_exists('ImagenesDeHelado')) {
        mkdir('ImagenesDeHelado', 0777, true);
    }
    $foto = isset($_FILE['foto']) ? $_FILE['foto'] : NULL;

    $helado = new Helado($_POST['sabor'], $_POST['precio'], $_POST['tipo'], $_POST['cantidad'], $foto);/*
    echo "<br>----------------------------------<br>";
    var_dump($usuario);
    echo "<br>----------------------------------<br>";*/
    if (Helado::HeladoModificacion($helado)) {
        $respuesta = "Se modificó el helado exitosamente";
    }else {
        $respuesta = "Error al modificar el helado";
    }

    echo $respuesta;
?>