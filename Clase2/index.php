<?php
    require_once "entidades/persona.php";
    require_once "entidades/localidad.php";
    require_once "entidades/direccion.php";

    $miLocalidad = new Localidad(1414, "Lanus");
    $miDireccion = new Direccion("Av. Gomez", 1234, $miLocalidad);
    $miPersona = new Persona("Lucas", "Mascheroni", 35356356, $miDireccion);

    //mostrar html con persona en <h1> y cada atributo en <p>. el mostrarHtml de persona
    //llama al mostrarHtml de direccion y el mostrarHtml de direccion llamar al mostrarHtml de localidad
    /*var_dump($miLocalidad);
    var_dump($miDireccion);
    var_dump($miPersona);*/

    echo $miPersona->MostrarHtml();
?>