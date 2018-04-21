<?php
class Vehiculo
{
    private $_patente;
    private $_horaIngreso;

    function __construct($patente, $horaIngreso)
    {
        $this->_patente = $patente;
        $this->_horaIngreso = $horaIngreso;
    }

    public function Estacionar()
    {
        $retorno = false;
        $archivo=fopen("archivos/estacionados.txt", "a");//escribe y mantiene la informacion existente		
        if($archivo != false)
        {
            $renglon=$this->_patente."=>".$this->_horaIngreso."\n";
            $escribio = fwrite($archivo, $renglon);
            if($escribio != false)
            {
                $retorno = true;
                fclose($archivo);
            }	 
        }
        return $retorno;
    }

    public function GetPatente()
    {
        return $this->_patente;
    }

    public static function Sacar($patente)
	{
		$listado=self::TraerTodos();
		$ListadoAdentro=array();
        $estaElVehiculo=false;
        $importe = 0;
		foreach ($listado as $auto) 
		{
			if($auto[0]==$patente)
			{
				$estaElVehiculo=true;
				$inicio=$auto[1];	
				$ahora=date("Y-m-d H:i:s"); 			 
 				$diferencia = strtotime($ahora)- strtotime($inicio) ;
 				//http://www.w3schools.com/php/func_date_strtotime.asp
 				$importe+=$diferencia*15;
				$mensaje= "tiempo transcurrido:".$diferencia." segundos <br> costo $importe ";
				
				$archivo=fopen("archivos/facturacion.txt", "a"); 		  
		 		$dato=$patente ."=> $".$importe."\n" ;
		 		fwrite($archivo, $dato);
		 		fclose($archivo);
			}
			else
			{
				$ListadoAdentro[]=$auto;				
			}
		}// fin del foreach
		if(!$estaElVehiculo)
		{
			$mensaje= "no esta esa patente!!!";
		}
		self::GuardarTodos($ListadoAdentro);
        echo $mensaje;
        return $importe;
    }
    
    public static function TraerTodos()
	{
        $ListaDeAutosLeida=array();
		$archivo=fopen("archivos/estacionados.txt", "r");//lee el archivo
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$auto=explode("=>", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
			$auto[0]=trim($auto[0]);
			if($auto[0]!="")
				$ListaDeAutosLeida[]=$auto;
		}
		fclose($archivo);
		return $ListaDeAutosLeida;
    }
    
    public static function GuardarTodos($listado)
	{
        $retorno = false;
        $archivo=fopen("archivos/estacionados.txt", "w");
        $errorEscritura = false;
        if($archivo != false)
        {
            foreach ($listado as $auto) 
            {
                if($auto[0]!="")
                {
                    $dato=$auto[0] ."=>".$auto[1]."\n" ;
                    $escribio = fwrite($archivo, $dato);
                    if($escribio == false)
                    {
                        $errorEscritura = true;
                    }   
                }	 	
            }
            if(!$errorEscritura)
            {
                $retorno = true;
                fclose($archivo);
            }
        }
        return $retorno;
	}
}
?>