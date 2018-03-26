<?php
require_once "direccion.php";
class Persona implements iMostrar{
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;

    public function __construct($pNombre, $pApellido, $pDni, $pDireccion){
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->dni = $pDni;
        $this->direccion = $pDireccion;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDni(){
        return $this->dni;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setNombre($pNombre){
        $this->nombre = $pNombre;
    }

    public function setApellido($pApellido){
        $this->apellido = $pApellido;
    }

    public function setDni($pDni){
        $this->dni = $pDni;
    }

    public function setDireccion($pDireccion){
        $this->direccion = $pDireccion;
    }

    public function MostrarHTML(){
        $salida = '';
        $salida .= "<h1>Nombre: </h1><p>".$this->nombre."</p>";
        $salida .= "<h1>Apellido: </h1><p>".$this->apellido."</p>";
        $salida .= "<h1>DNI: </h1><p>".$this->dni."</p>";
        $salida .= $this->direccion->MostrarHTML();

        return $salida;
    }
}

?>