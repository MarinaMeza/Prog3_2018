<?php
require_once "persona.php";
class Profesor{
    private $materia = array();
    private $dias = array();

    public function __construct($pMateria, $pDias){
        parent::__construct();
        array_push($materia, $pMateria);
        array_push($dias, $pDias);
    }
}
?>