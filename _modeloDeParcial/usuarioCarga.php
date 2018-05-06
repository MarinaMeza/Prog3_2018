<?php
    require_once "clases/usuario.php";

    $usuario = new Usuario($_GET['nombre'], $_GET['email'], $_GET['perfil'], $_GET['edad'], $_GET['clave']);
    //var_dump($usuario);

    
    $archivo = fopen('usuarios.txt','a');
    fwrite($archivo, $usuario->ToString());
?>