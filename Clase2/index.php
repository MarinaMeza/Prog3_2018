<?php
    require_once "entidades/persona.php";
    require_once "entidades/localidad.php";
    require_once "entidades/direccion.php";
    require_once "entidades/profesor.php";
    require_once "entidades/alumno.php";

    $miLocalidad1 = new Localidad(1414, "Lanus");
    $miLocalidad2 = new Localidad(1424, "Avellaneda");
    $miLocalidad3 = new Localidad(1434, "Quilmes");
    $miDireccion1 = new Direccion("Av. Gomez", 123, $miLocalidad1);
    $miDireccion2 = new Direccion("Av. Lopez", 456, $miLocalidad2);
    $miDireccion3 = new Direccion("Av. Perez", 789, $miLocalidad3);/*
    $miPersona = new Persona("Lucas", "Mascheroni", 35356356, $miDireccion);
    $miPersona2 = new Persona("Jose", "Perez", 12312312, $miDireccion);*/
    $miProfesor1 = new Profesor("Jose", "Gomez", 12312312, $miDireccion1, array("Programacion","Laboratorio"), array("Lunes","Miercoles"));
    $miProfesor2 = new Profesor("Jose", "Lopez", 45645645, $miDireccion2, array("Ingles","Metodologia"), array("Jueve","Viernes"));
    $miProfesor3 = new Profesor("Jose", "Perez", 78978978, $miDireccion3, array("Matematica","Estadistica"), array("Martes","Miercoles"));
    $miAlumno1 = new Alumno("Lucas", "Mascheroni", 32132132, $miDireccion1, "18/09/15", 987987);
    $miAlumno2 = new Alumno("Marina", "Meza", 65465465, $miDireccion2, "19/10/15", 456456);
    $miAlumno3 = new Alumno("Gabriel", "Mendoza", 98798798, $miDireccion3, "20/11/15", 123123);

    //mostrar html con persona en <h1> y cada atributo en <p>. el mostrarHtml de persona
    //llama al mostrarHtml de direccion y el mostrarHtml de direccion llamar al mostrarHtml de localidad
    /*var_dump($miLocalidad);
    var_dump($miDireccion);
    var_dump($miPersona);*/
    $salida = '';

    $arraySalida = array($miProfesor1, $miProfesor2, $miProfesor3, $miAlumno1, $miAlumno2, $miAlumno3);

    foreach ($arraySalida as $value) {
        $salida .= $value->MostrarHTML();
    }
    echo $salida;
?>