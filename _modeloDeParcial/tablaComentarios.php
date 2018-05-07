<?php
    require_once 'clases/comentario.php';
    require_once 'clases/usuario.php';

    $email = isset($_GET['email']) ? $_GET['email'] : NULL;
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : NULL;
    
    $respuesta = '';

    //var_dump($comentario);

    echo Comentario::TablaComentarios($email, $titulo);
?>