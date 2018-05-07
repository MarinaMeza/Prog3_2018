<?php
class Helado {
    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;
    public $id;

    public function __construct($pSabor, $pPrecio, $pTipo, $pCantidad) {
        $this->sabor = $pSabor;
        $this->precio = $pPrecio;
        $this->tipo = $pTipo;
        $this->cantidad = $pCantidad;
        $this->id = $pSabor.$pTipo;
    }

    public static function HeladoCarga($pHelado) {
        $retorno = TRUE;
        $archivo = fopen('Helados.txt','a');
        if (!fwrite($archivo, $pHelado->ToString())) {
            $retorno = FALSE;
        }
        fclose($archivo);

        return $retorno;
    }

    public static function ConsultarHelado($pTipo, $pSabor) {
        $listaHelados = self::TraerTodos();
        
        //var_dump($listaHelados);
        $retorno = 'El tipo no existe';
    
        foreach ($listaHelados as $helado) {
            if ($pTipo == $helado[2]) {
                if ($pSabor == $helado[0]) {
                    $retorno = "Si Hay";
                    break;
                } else {
                    $retorno = 'El sabor no existe';
                }
            }
        }
        return $retorno;
    }

    public static function TraerTodos() {
        $listaHelado = array();
        
        $archivo = fopen('Helados.txt','r');
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            $helados = explode('__',$linea);
            $helados[0] = trim($helados[0]);
            if ($helados[0] != '') {
                $listaHelado[] = $helados;
            }
        }
        fclose($archivo);
        
        return $listaHelado;
    }    

    public function ToString () {
        return $this->id."__".$this->sabor."__".$this->precio."__".$this->tipo."__".$this->cantidad."\r\n";
    }
}
?>