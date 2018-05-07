<?php
    require_once "clases/usuario.php";
    require_once "clases/comentario.php";

    $comentario = new Comentario($_POST['email'], $_POST['titulo'], $_POST['comentario']);

    $respuesta = '';

    //var_dump($comentario);
    
    if (Comentario::AltaComentario($comentario)) {
        $respuesta = "Se subió el comentario";
    }else {
        $respuesta = "Error al subir el comentario";
    }

    echo $respuesta;
?>