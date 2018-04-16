<?php
    require_once "clases/punto.php";
    require_once "clases/rectangulo.php";

    $punto1 = new Punto($_POST["x1"], $_POST["y1"]);
    $punto3 = new Punto($_POST["x3"], $_POST["y3"]);

    $rectangulo = new Rectangulo($punto1, $punto3);
    
    echo $rectangulo->Dibujar();
?>