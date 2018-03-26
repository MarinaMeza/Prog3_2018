<?php
require_once "persona.php";
class Alumno{
    private $legajo;
    private $fechaDeInscripcion;

    public function __construct($pLegajo, $pFechaDeInscripcion){
        parent::__construct();
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
}
?>