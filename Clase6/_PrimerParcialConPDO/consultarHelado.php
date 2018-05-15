<?php
    require_once 'clases/helado.php';
    require_once 'clases/AccesoDatos.php';
    
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
    $sabor = isset($_POST['sabor']) ? $_POST['sabor'] : NULL;

    //echo Helado::ConsultarHelado($tipo, $sabor);
    $todosLosHelados = Helado::TraerTodosBD();
    //$retorno = "Si hay";
    $retorno = "No hay tipo ".$tipo."<br>";
    
    foreach ($todosLosHelados as $helado) {
        if ($helado->sabor == $sabor && $helado->tipo == $tipo) {
            $retorno = "Si hay";
            break;
            //$retorno = "No hay tipo ".$tipo."<br>";
        }else if ($helado->sabor != $sabor && $helado->tipo == $tipo) {
            $retorno = "No hay sabor ".$sabor."<br>";
            break;
        }
    }

    echo $retorno;
?>