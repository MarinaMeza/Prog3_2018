<?php
/*
    $nombre = "José";
    echo "Hola mundo PHP $nombre <br>";
    $sueldo = 10.333;
    printf("Sueldo: %f <br>", $sueldo);
    printf("Nombre: $nombre<br>");
    
    //Tres metodos para construir un array:
    //1 - Constructor de array
    $miArray = array(1, 2, 3, "legajo" => 19);
    var_dump($miArray);

    //2
    $segundoArray[33] = "Hola";
    $segundoArray["Nombre"] =  "María";
    $segundoArray[34] =  "2018";
    printf("<br>");
    var_dump($segundoArray);
    printf("<br>");
*/
    /*
    class Alumno{
        public $nombre;
    }*/

    //require "alumno1.php";//require frena la ejecucion si no encuentra el archivo, el include sigue
    //include "alumno1.php";
    require "alumno.php";
    require_once "alumno.php"; //funciona porque al tener el once no lo vuelve a pedir
    $contador = 1;
    for($i = 0; $i < 10; $i++){
        include "repetidor.php";    
    }
    
    $elAlumno = new Alumno();
    $elAlumno->nombre = "Pepe";
    $elAlumno->legajo = 666;
    $elAlumno->mail = "No tengo";
    $otro = $elAlumno;
    $otro->nombre = "Juan";
    var_dump($elAlumno);//Muestra Juan porque los dos objetos ocupan la misma posicion de memoria

?>