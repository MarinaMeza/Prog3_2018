<?php
    require_once 'clases/usuario.php';

    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;

    $listaUsuarios = Usuario::TraerTodos();

    //var_dump($listaUsuarios);
    echo Usuario::VerificarUsuario($email, $clave)
?>