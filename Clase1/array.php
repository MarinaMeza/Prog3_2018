<?php
    require_once "alumno.php";

    $arrayTest = array(10, 8, 30);
    $arrayTest[] = 1000;
    $arrayTest["apellido"] = "Lopez";
    $arrayTest["alumno"] = new Alumno();
    $arrayTest[] = new Alumno();
    $arrayTest[] = "A";
    $arrayTest[33] = "Z";
    $arrayTest[10] = "B";
//agregar por cada sort un var_dump
    ksort($arrayTest);

    var_dump($arrayTest);

    
?>