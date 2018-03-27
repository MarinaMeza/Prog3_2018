<?php
require_once "persona.php";
class Alumno extends Persona implements iMostrar{
    private $legajo;
    private $fechaDeInscripcion;

    public function __construct($pNombre, $pApellido, $pDni, $pDireccion, $pLegajo, $pFechaDeInscripcion){
        parent::__construct($pNombre, $pApellido, $pDni, $pDireccion);
        $this->legajo = $pLegajo;
        $this->fechaDeInscripcion = $pFechaDeInscripcion;
    }

    public function getLegajo(){
        return $this->getLegajo;
    }

    public function getFechaDeInscripcion(){
        return $this->fechaDeInscripcion;
    }

    public function setLegajo($pLegajo){
        $this->legajo = $pLegajo;
    }

    public function setFechaDeInscripcion($pFechaDeInscripcion){
        $this->fechaDeInscripcion = $pFechaDeInscripcion;
    }

    public function MostrarHTML(){
        $salida = '';
        $salida .= parent::MostrarHTML();
        $salida .= "<h1>Legajo: </h1><p>".$this->legajo."</p>";
        $salida .= "</p><h1>Fecha de inscripcion: </h1><p>";
        $salida .= $this->fechaDeInscripcion."</p>";
        
        return $salida;
    }
}
?>