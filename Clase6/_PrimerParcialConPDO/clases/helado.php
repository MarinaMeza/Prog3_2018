<?php
class Helado {
    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;
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

    public function __construct1($pSabor, $pPrecio, $pTipo, $pCantidad) {
        $this->sabor = $pSabor;
        $this->precio = $pPrecio;
        $this->tipo = $pTipo;
        $this->cantidad = $pCantidad;
    }

    /*
    public function __construct($pSabor, $pPrecio, $pTipo, $pCantidad) {
        $this->sabor = $pSabor;
        $this->precio = $pPrecio;
        $this->tipo = $pTipo;
        $this->cantidad = $pCantidad;
        //$this->id = $pSabor.$pTipo;
    }*/

    public function InsertarHelado() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into helados (sabor, precio, tipo, cantidad)values('$this->sabor','$this->precio','$this->tipo','$this->cantidad')");
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
/*
    public static function ConsultarHelado($pTipo, $pSabor) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM helados WHERE tipo='$pTipo' AND sabor='$pSabor'");
        $consulta->execute(array($pTipo, $pSabor));
        $heladoBuscado = $consulta->fetchObject('Helado');
        
        return $heladoBuscado;
    }*/

    public static function TraerTodosBD() {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT sabor, tipo from helados");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "helado");		
    }
/*
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
    }*/
/*
    public static function ModificarStock($pId, $pVenta) {
        $retorno = FALSE;
        //$archivo = fopen('Helados.txt', 'r');
        $listaHelados = self::TraerTodos();

        for ($i=0; $i < count($listaHelados); $i++) { 
            if ($listaHelados[$i][0] == $pId) {
                $retorno = TRUE;
                
                $nuevoStock = $listaHelados[$i][4] - $pVenta;
                $auxHelado = $listaHelados[$i][0].'__'.$listaHelados[$i][1].'__'.$listaHelados[$i][2].'__'.$listaHelados[$i][3].'__'.$listaHelados[$i][4].'\r\n';
                $nuevoHelado = $listaHelados[$i][0].'__'.$listaHelados[$i][1].'__'.$listaHelados[$i][2].'__'.$listaHelados[$i][3].'__'.$nuevoStock.'\r\n';
                /*echo "<br>auxhelado".$auxHelado;
                echo "<br>nuevohelado".$nuevoHelado;
                file_put_contents('Helados.txt', str_replace($auxHelado, $nuevoHelado, file_get_contents('Helados.txt')));
            }
        }
        //fclose($archivo);
        return $retorno;
    }*/

    public static function HeladoModificacion($pHelado) {
        $retorno = FALSE;
        $listaHelados = self::TraerTodos();
        //echo "<br>---------------lista-------------------<br>";
        //var_dump ($listaHelados);
        $fecha = date('Y-m-d');
        
        for ($i=0; $i < count($listaHelados); $i++) { 
            $auxId = $pHelado->sabor.$pHelado->tipo;
            if ($listaHelados[$i][0] == $pHelado->id) {
                $retorno = TRUE;
                $auxHelado = $listaHelados[$i][0]."__".$listaHelados[$i][1]."__".$listaHelados[$i][2]."__".$listaHelados[$i][3]."__".$listaHelados[$i][4];
                
                echo $auxHelado;
                file_put_contents('Helados.txt', str_replace($auxHelado, $pHelado->ToString(), file_get_contents('Helados.txt')));
                
                if (file_exists('ImagenesDeHelado/'.$pHelado->id.'.jpg')) {
                    rename('ImagenesDeHelado/'.$pHelado->id.'.jpg', 'backup/'.$pHelado->id.'-'.$fecha.'.jpg');
                }
                
                move_uploaded_file($_FILES['foto']['tmp_name'], 'ImagenesDeHelado/'.$pHelado->id.'.jpg');
            }
        }
        if(!file_exists('backup')) {
            mkdir('backup', 0777, true);
        }
        //rename('Helados.txt', 'backup/helados'.$fecha.'.txt') ;
        
        //echo "<br>----------------------------------<br>";
        //var_dump ($listaHelados);
        return $retorno;
    }
/*
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
    }    */

    public function ToString () {
        return $this->id."__".$this->sabor."__".$this->precio."__".$this->tipo."__".$this->cantidad."\r\n";
    }
}
?>