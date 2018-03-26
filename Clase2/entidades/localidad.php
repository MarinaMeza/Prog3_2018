<?php
require_once "iMostrar.php";
class Localidad implements iMostrar{
    private $codigoPostal;
    private $nombre;

    public function __construct($pCodigoPostal, $pNombre){
        $this->codigoPostal = $pCodigoPostal;
        $this->nombre = $pNombre;
    }

    public function getCodigoPostal(){
        return $this->codigoPostal;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    
    public function setCodigoPostal($pCodigoPostal){
        $this->codigoPostal = $pCodigoPostal;
    }

    public function setNombre($pNombre){
        $this->nombre = $pNombre;
    }

    public function MostrarHTML(){
        $salida = '';
        $salida .= "<h1>Localidad: </h1><p>".$this->nombre."</p>";
        $salida .= "<h1>CP: </h1><p>".$this->codigoPostal."</p>";
        
        return $salida;
    }
}

?>