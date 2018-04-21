<?php
require_once ('clases/vehiculo.php');
class Facturado
{
    private $_vehiculo;
    private $_horaSalida;
    private $_importe;

    function __construct($vehiculo, $horaSalida)
    {
        $this->_vehiculo = $vehiculo;
        $this->_horaSalida = $horaSalida;
    }

    public static function TraerTodos()
	{
        $ListaDeAutosLeida=array();
		$archivo=fopen("archivos/facturacion.txt", "r");//lee el archivo
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
        $archivo=fopen("archivos/facturacion.txt", "w");
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