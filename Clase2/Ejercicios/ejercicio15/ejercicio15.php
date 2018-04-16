<?php
    require_once "clases/figuraGeometrica.php";
    require_once "clases/triangulo.php";
    require_once "clases/rectangulo.php";

    $rectangulo = new Rectangulo($_POST["base"], $_POST["altura"]);
    $triangulo = new Triangulo($_POST["base"], $_POST["altura"]);

    $triangulo->SetColor($_POST["color"]);
    $rectangulo->SetColor($_POST["color"]);

    echo $rectangulo->ToString();
    echo $triangulo->ToString();
?>