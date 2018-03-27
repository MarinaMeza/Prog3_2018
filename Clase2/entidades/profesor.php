<?php
require_once "persona.php";
class Profesor extends Persona implements iMostrar{
    private $materia;
    private $dias;

    public function __construct($pNombre, $pApellido, $pDni, $pDireccion, $pMateria, $pDias){
        parent::__construct($pNombre, $pApellido, $pDni, $pDireccion);
        $this->materia = $pMateria;
        $this->dias = $pDias;
    }

    public function MostrarHTML(){
        $salida = '';
        $salida .= parent::MostrarHTML();
        $salida .= "<h1>Materias: </h1><p>";
        foreach ($this->materia as $value) {
            $salida .= $value."<br>";   
        }

        $salida .= "</p><h1>Dias: </h1><p>";
        foreach ($this->dias as $value) {
            $salida .= $value."<br>";
        }
        $salida .= "</p>";

        return $salida;
    }
}
?>