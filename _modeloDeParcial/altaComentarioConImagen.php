<?php
    require_once "clases/usuario.php";
    require_once "clases/comentario.php";
    
    if(!file_exists('ImagenesDeComentario')) {
        mkdir('ImagenesDeComentario', 0777, true);
    }
    
    $comentario = new Comentario($_POST['email'], $_POST['titulo'], $_POST['comentario'], $_FILES['foto']['name']);
    
    $respuesta = '';

    //var_dump($comentario);
    
    if (Comentario::AltaComentarioConImagen($comentario)) {
        $respuesta = "Se subió el comentario";
    }else {
        $respuesta = "Error al subir el comentario";
    }

    echo $respuesta;
?>