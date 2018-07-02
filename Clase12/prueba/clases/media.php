<?php
class Media{
    public $id;
    public $color;
    public $marca;
    public $precio;
    public $talle;
    public $foto;


    public function InsertarMediaParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into medias (color,marca,precio,talle)values(:color,:marca,:precio,:talle)");
        $consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
        $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':talle', $this->talle, PDO::PARAM_INT);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    
  	public static function TraerTodasLasMedias() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        //$consulta =$objetoAccesoDato->RetornarConsulta("select id,color,marca,precio,talle from medias");
        $consulta =$objetoAccesoDato->RetornarConsulta("select color,marca,talle from medias");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Media");		
    }

	public static function TraerUnaMedia($id) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,color,marca,precio,talle from medias where id = $id");
        $consulta->execute();
        $mediaBuscada= $consulta->fetchObject('media');
        return $mediaBuscada;				
    }

    public function ModificarMediaParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            update medias 
            set color=:color,
            marca=:marca,
            precio=:precio,
            talle=:talle
            WHERE id=:id");
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
        $consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
        $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':talle', $this->talle, PDO::PARAM_INT);
        return $consulta->execute();
    }

  	public function BorrarMedia() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from medias 				
            WHERE id=:id");	
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
            $consulta->execute();
            return $consulta->rowCount();
    }
 
}
?>