<?php
class Empleado{
    public $nombre;
    public $turno;
    public $tipo;
    public $id;

    public function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 0:
                self::__construct0();
                break;
            case 3:
                self::__construct1($argv[0], $argv[1], $argv[2]);
                break;
        }
    }

    public function __construct0() {
    }

    public function __construct1($pNombre, $pTurno, $pTipo){
        $this->nombre = $pNombre;
        $this->turno = $pTurno;
        $this->tipo = $pTipo;
    }

    public function InsertarEmpleado() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into empleados (nombre, turno, tipo)values('$this->nombre','$this->turno','$this->tipo')");
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }


    public static function TraerTodosBD(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT nombre, turno, tipo from empleados");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");	
    }
}
?>