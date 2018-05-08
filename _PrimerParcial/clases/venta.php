<?php
class Venta {
    public $email;
    public $sabor;
    public $tipo;
    public $cantidad;
    public $foto;

    public function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 4:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
            case 5:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
        }
    }

    public function __construct1($pEmail, $pSabor, $pTipo, $pCantidad) {
        $this->email = $pEmail;
        $this->sabor = $pSabor;
        $this->tipo = $pTipo;
        $this->cantidad = $pCantidad;
    }

    public function __construct2 ($pEmail, $pSabor, $pTipo, $pCantidad, $pFoto) {
        self::__construct1($pEmail, $pSabor, $pTipo, $pCantidad);
        $extension = pathinfo($pFoto, PATHINFO_EXTENSION);
        $fecha = date('Y-m-d');
        $this->foto = "ImagenesDeLaVenta/".$pSabor."-".$fecha.".".$extension;
    }

    public static function TablaVentas($pEmail, $pSabor) {
        $listaVentas = Venta::TraerTodos();
        $listaHelados = Helado::TraerTodos();
        $fecha = date('Y-m-d');
        $flag = FALSE;
        $tabla = "<table style='border: 1px solid black'> 
                    
                        <tr>
                            <th>IMAGEN</th>
                            <th>EMAIL</th>
                            <th>SABOR</th>
                            <th>TIPO</th>
                            <th>CANTIDAD</th>
                        </tr>
                    ";
                    
        foreach ($listaVentas as $venta) {
            if ($pEmail == $venta[0] && $pSabor == $venta[1]) {
                $flag = TRUE;
                foreach ($listaHelados as $helado) {
                    if ($pSabor == $helado[1]) {
                        $tabla .= '<td><img src="ImagenesDeLaVenta/'.$venta[1].$venta[2].$fecha.'.jpg" width="150" alt="'.$venta[1].'.jpg"></td>
                        <td>'.$venta[0].'</td>';
                        $tabla .= '<td>'.$helado[1].'</td>
                        <td>'.$helado[3].'</td>
                        <td>'.$helado[2].'</td>
                                </tr>';
                    }
                }
                $tabla .= "</tr>";
            }
        }
        $tabla .= "</table>";
        if (!$flag) {
            $tabla = "No se han ingresado valores para la busqueda o los valores ingresados son incorrectos";
        }
           return $tabla;
        
    }

    public static function AltaVenta($pVenta) {
        $listaHelados = Helado::TraerTodos();
        $retorno = FALSE;

        $archivo = fopen('Venta.txt','a');
        //$auxHelado = $pVenta->sabor.$pVenta->tipo;
        //var_dump($listaHelados);
        foreach ($listaHelados as $helado) {
            if ($pVenta->sabor == $helado[0] && $pVenta->tipo == $helado[2]  && $pVenta->cantidad <= trim($helado[4])) {
                $helado[4] -= $pVenta->cantidad;
                
                $retorno = TRUE;
                break;
            }
        }

        if ($retorno == TRUE) {
            fwrite($archivo, $pVenta->ToString($helado[4]));
            //Helado::ModificarStock($auxHelado, $pVenta->cantidad);
        }
        
        fclose($archivo);
        
        return $retorno;
    }

    public static function AltaVentaConImagen($pVenta) {
        $retorno = FALSE;
        $extension = pathinfo($pVenta->foto, PATHINFO_EXTENSION);
        if($pVenta->foto != "") {
            if ($extension != 'jpg') {
                echo "<br>Error guardando la foto<br>";
            }else {
                $retorno = TRUE;
                move_uploaded_file($_FILES['foto']['tmp_name'],$pVenta->foto);
            }
        }

        return $retorno;
    }
    
    public static function TraerTodos() {
        $listaVentas = array();
        $archivo = fopen('Venta.txt','r');
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            $ventas = explode('__',$linea);
            $ventas[0] = trim($ventas[0]);
            if ($ventas[0] != '') {
                $listaVentas[] = $ventas;
            }
        }
        fclose($archivo);
        
        return $listaVentas;
    }

    public function ToString ($nuevaCant) {
        return $this->email."__".$this->sabor."__".$this->tipo."__".$nuevaCant."\r\n";
    }
}

?>