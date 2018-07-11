<?php
class Log{
    public $id;
    public $usuario;
    public $metodo;
    public $ruta;
    public $hora;

    public function InsertarUsuarioParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into mdw (usuario,metodo,ruta,hora)values(:usuario,:metodo,:ruta,:hora)");
        $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
        $consulta->bindValue(':metodo', $this->metodo, PDO::PARAM_STR);
        $consulta->bindValue(':ruta', $this->ruta, PDO::PARAM_STR);
        $consulta->bindValue(':hora', $this->hora, PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
}
?>