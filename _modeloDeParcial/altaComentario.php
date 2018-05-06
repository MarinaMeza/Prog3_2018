<?php
    require_once "clases/usuario.php";
    require_once "clases/comentario.php";

    $comentario = new Comentario($_POST['email'], $_POST['titulo'], $_POST['comentario']);
    //var_dump($comentario);
    $listaUsuarios = Usuario::TraerTodos();
    $retorno = 0;
    $archivo = fopen('comentario.txt','a');

    
    foreach ($listaUsuarios as $usuario) {
        if ($comentario->email == $usuario[1]) {
            $retorno = 1;
            break;
        }
    }

    if ($retorno == 1) {
        fwrite($archivo, $comentario->ToString());
    }
    fclose($archivo);
?>