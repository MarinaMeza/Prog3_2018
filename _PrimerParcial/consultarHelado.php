<?php
    require_once 'clases/helado.php';
    
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
    $sabor = isset($_POST['sabor']) ? $_POST['sabor'] : NULL;

    echo Helado::ConsultarHelado($tipo, $sabor);
?>