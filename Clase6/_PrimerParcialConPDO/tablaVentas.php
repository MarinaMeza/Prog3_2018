<?php
    require_once 'clases/helado.php';
    require_once 'clases/venta.php';

    $email = isset($_GET['email']) ? $_GET['email'] : NULL;
    $sabor = isset($_GET['sabor']) ? $_GET['sabor'] : NULL;
    /*$email = $_GET['email'];
    $sabor = $_GET['sabor'];
    var_dump($email);
    var_dump($sabor);*/
    

    echo Venta::TablaVentas($email, $sabor);
?>