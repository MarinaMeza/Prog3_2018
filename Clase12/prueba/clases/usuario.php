<?php
class Usuario{
    public $id;
    public $nombre;
    public $clave;
    public $perfil;

    public function InsertarUsuarioParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,clave,perfil)values(:nombre,:clave,:perfil)");
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    
  	public static function TraerTodosLosUsuarios() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,clave,perfil from usuarios");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
    }

	public static function TraerUnUsuario($id) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,clave,perfil from usuarios where id = $id");
        $consulta->execute();
        $usuarioBuscada= $consulta->fetchObject('Usuario');
        return $usuarioBuscada; 
    }

    public function ModificarUsuarioParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            update usuarios 
            set nombre=:nombre,
            clave=:clave,
            perfil=:perfil
            WHERE id=:id");
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        return $consulta->execute();
    }

  	public function BorrarUsuario() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from usuarios 				
            WHERE id=:id");	
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
            $consulta->execute();
            return $consulta->rowCount();
    }
 
}
?>