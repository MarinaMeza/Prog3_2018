<?php
    class Auto {
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;

        public function __construct() {
            $argv = func_get_args();
            switch (func_num_args()) {
                case 2:
                    self::__construct1($argv[0], $argv[1]);
                    break;
                case 3:
                    self::__construct2($argv[0], $argv[1], $argv[2]);
                    break;
                case 4:
                    self::__construct3($argv[0], $argv[1], $argv[2], $argv[3]);
            }
        }

        public function __construct1($pMarca, $pColor) {
            $this->_marca = $pMarca;
            $this->_color = $pColor;
        }

        public function __construct2($pMarca, $pColor, $pPrecio) {
            self::__construct1($pMarca, $pColor);
            $this->_precio = $pPrecio;
        }

        public function __construct3($pMarca, $pColor, $pPrecio, $pFecha) {
            self::__construct2($pMarca, $pColor, $pPrecio);
            $this->_fecha = $pFecha;
        }

        public function AgregarImpuestos($pImpuesto) {
            $this->_precio += $pImpuesto;
        }

        public static function MostrarAuto($pAuto) {
            $respuesta = '';

            $respuesta .= "Marca: ".$pAuto->_marca."<br>";
            $respuesta .= "Color: ".$pAuto->_color."<br>";
            $respuesta .= "Precio: ".$pAuto->_precio."<br>";
            $respuesta .= "Fecha: ".$pAuto->_fecha."<br>";

            return $respuesta;
        }

        public function Equals($pAuto1, $pAuto2) {//ARREGLAR PARA QUE RECIBA UNO SOLO PORQUE ASI 0 SENTIDO
            $respuesta = FALSE;
            if($pAuto1->_marca == $pAuto2->_marca) {
                $respuesta = TRUE;
            }

            return $respuesta;
        }

        public static function Add($pAuto1, $pAuto2) {
            $respuesta = '';

            if(!self::Equals($pAuto1, $pAuto2) && $pAuto1->_color!=$pAuto->_color) {
                $respuesta = 0;
            }else {
                $respuesta = $pAuto1->_precio + $pAuto2->_precio;
            }

            return $respuesta;
        }
    }
?>