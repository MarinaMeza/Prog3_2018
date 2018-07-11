<?php
class Usuario{
    public $id;
    public $nombre;
    public $clave;
    public $sexo;
    public $perfil;

    public function InsertarUsuarioParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,clave,sexo,perfil)values(:nombre,:clave,:sexo,:perfil)");
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public static function TraerTodosLosUsuarios() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,clave,sexo,perfil from usuario");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
    }

    public static function TraerUnUsuario($nombre, $clave, $sexo) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta("
        select id,nombre,clave,perfil 
        from usuario 
        where nombre = '$nombre' and 
        sexo = '$sexo' and 
        clave = '$clave'");
        $consulta->execute();
        $usuarioBuscado = $consulta->fetchObject('Usuario');
        return $usuarioBuscado; 
    }
}
?>