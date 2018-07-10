<?php
class Venta{
    public $id;
    public $idMedia;
    public $nombreCliente;
    public $fecha;
    public $importe;
    public $foto;

    public function InsertarVentaParametros() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventamedia (idMedia,nombreCliente,fecha,importe)values(:idMedia,:nombreCliente,:fecha,:importe)");
        $consulta->bindValue(':idMedia',$this->idMedia, PDO::PARAM_STR);
        $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
        $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':importe', $this->importe, PDO::PARAM_STR);
        var_dump($this->fecha);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    
  	public static function TraerTodosLasVentas() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,idMedia,nombreCliente,fecha,importe from ventamedia");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Ventas");
    }

	public static function TraerUnaVenta($idMedia, $nombreCliente, $fecha) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
        select id,idMedia,nombreCliente,fecha 
        from ventamedia 
        where idMedia = '$idMedia' and 
        nombreCliente = '$nombreCliente' and 
        fecha = '$fecha'");
        $consulta->execute();
        $ventaBuscado = $consulta->fetchObject('Venta');
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