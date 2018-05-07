<?php
    require_once "clases/usuario.php";
/*
    $nombre = isset($_GET['nombre']);
    $email = isset($_GET['email']);
    $perfil = isset($_GET['perfil']);
    $edad = isset($_GET['edad']);
    $clave = isset($_GET['clave']);*/
    
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