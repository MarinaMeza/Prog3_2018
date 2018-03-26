<?php
require_once "localidad.php";
class Direccion implements iMostrar{
    private $calle;
    private $altura;
    private $localidad;


    public function __construct($pCalle, $pAltura, $pLocalidad){
        $this->calle = $pCalle;
        $this->altura = $pAltura;
        $this->localidad = $pLocalidad;
    }

    public function getCalle(){
        return $this->calle;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function getLocalidad(){
        return $this->localidad;
    }

    public function setCalle($pCalle){
        $this->calle = $pCalle;
    }

    public function setAltura($pAltura){
        $this->altura = $pAltura;
    }

    public function setLocalidad($pLocalidad){
        $this->localidad = $pLocalidad;
    }

    public function MostrarHTML(){
        $salida = '';
        $salida .= "<h1>Calle: </h1><p>".$this->calle."</p>";
        $salida .= "<h1>Altura: </h1><p>".$this->altura."</p>";
        $salida .= $this->localidad->MostrarHTML();
        return $salida;
    }
}

?>