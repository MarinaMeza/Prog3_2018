<?php
    require_once 'clases/usuario.php';

    $email = $_POST['email'];
    $clave = $_POST['clave'];

    $listaUsuarios = Usuario::TraerTodos();

    //var_dump($listaUsuarios);
    $respuesta = 'El usuario no existe';

    foreach ($listaUsuarios as $usuario) {
        if ($email == $usuario[1]) {
            if ($clave==$usuario[3]) {
                $respuesta = "Bienvenido";
                break;
            } else {
                $respuesta = "La clave ingresada es incorrecta";
            }
        }
    }

    echo $respuesta;
?>