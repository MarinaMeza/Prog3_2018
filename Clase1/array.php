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

    echo "----------------Sort----------------<br>";
    sort($arrayTest);
    var_dump($arrayTest);
    echo "<br>";

    echo "<br>----------------RSort----------------<br>";
    rsort($arrayTest);
    var_dump($arrayTest);
    echo "<br>";

    echo "<br>----------------ASort----------------<br>";
    asort($arrayTest);
    var_dump($arrayTest);
    echo "<br>";

    echo "<br>----------------ARSort----------------<br>";
    arsort($arrayTest);
    var_dump($arrayTest);
    echo "<br>";

    echo "<br>----------------KSort----------------<br>";
    ksort($arrayTest);
    var_dump($arrayTest);
    echo "<br>";

    echo "<br>----------------KRSort----------------<br>";
    krsort($arrayTest);
    var_dump($arrayTest);
    
?>