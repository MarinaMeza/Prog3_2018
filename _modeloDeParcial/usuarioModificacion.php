<?php
    require_once "clases/usuario.php";

    if(!file_exists('ImagenesDeUsuario')) {
        mkdir('ImagenesDeUsuario', 0777, true);
    }
    $foto = isset($_FILE['foto']) ? $_FILE['foto'] : NULL;

    $usuario = new Usuario($_POST['nombre'], $_POST['email'], $_POST['perfil'], $_POST['edad'], $_POST['clave'], $foto);/*
    echo "<br>----------------------------------<br>";
    var_dump($usuario);
    echo "<br>----------------------------------<br>";*/
    if (Usuario::UsuarioModificacion($usuario)) {
        $respuesta = "Se modificó el usuario exitosamente";
    }else {
        $respuesta = "Error al modificar el usuario";
    }

    echo $respuesta;
?>