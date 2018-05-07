<?php
    require_once "clases/usuario.php";

    $usuario = new Usuario($_GET['nombre'], $_GET['email'], $_GET['perfil'], $_GET['edad'], $_GET['clave']);
    //var_dump($usuario);

    $respuesta = '';

    //var_dump($comentario);
    
    if (Usuario::UsuarioCarga($usuario)) {
        $respuesta = "Se creó el usuario exitosamente";
    }else {
        $respuesta = "Error al creat el usuario";
    }

    echo $respuesta;
    
?>