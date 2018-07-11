<?php
class Compra{
    public $id;
    public $articulo;
    public $fecha;
    public $precio;
    public $perfil;
    public $foto;

    public function InsertarCompraParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into compra (articulo,fecha,precio,perfil)values(:articulo,:fecha,:precio,:perfil)");
        $consulta->bindValue(':articulo',$this->articulo, PDO::PARAM_STR);
        $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
        //var_dump($this->fecha);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    
  	public static function TraerTodasLasCompras() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,articulo,perfil,fecha,precio from compra");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Compra");
    }

	public static function TraerUnaCompra($articulo, $perfil, $fecha) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
        select id,articulo,perfil,fecha 
        from compra 
        where articulo = '$articulo' and 
        perfil = '$perfil' and 
        fecha = '$fecha'");
        $consulta->execute();
        $ventaBuscado = $consulta->fetchObject('Compra');
        return $ventaBuscado; 
    }

    public function ModificarVentaParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
         
        $consulta =$objetoAccesoDato->RetornarConsulta("
            update ventamedia 
            set idMedia=:idMedia,
            nombreCliente=:nombreCliente,
            fecha=:fecha,
            importe=:importe
            WHERE id=:id");
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
        $consulta->bindValue(':idMedia',$this->idMedia, PDO::PARAM_INT);
        $consulta->bindValue(':nombreCliente',$this->nombreCliente, PDO::PARAM_STR);
        $consulta->bindValue(':fecha',$this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':importe',$this->importe, PDO::PARAM_STR);
        return $consulta->execute();
    }

  	public function BorrarUsuario() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from ventamedia 				
            WHERE id=:id");	
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
            $consulta->execute();
            return $consulta->rowCount();
    }
 
}
?>