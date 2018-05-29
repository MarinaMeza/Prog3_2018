<?php
class Cliente{
    public $nombre;
    public $nacionalidad;
    public $sexo;
    public $edad;
    public $id;

    public function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 0:
                self::__construct0();
                break;
            case 4:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
        }
    }

    public function __construct0() {
    }

    public function __construct1($pNombre, $pNacionalidad, $pSexo, $pEdad){
        $this->nombre = $pNombre;
        $this->nacionalidad = $pNacionalidad;
        $this->sexo = $pSexo;
        $this->edad = $pEdad;
    }

    public function InsertarCliente() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into clientes (nombre, nacionalidad, sexo, edad)values('$this->nombre','$this->nacionalidad','$this->sexo','$this->edad')");
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }


    public static function TraerTodosBD(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT nombre, nacionalidad, sexo, edad from clientes");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "cliente");	
    }
}
?>