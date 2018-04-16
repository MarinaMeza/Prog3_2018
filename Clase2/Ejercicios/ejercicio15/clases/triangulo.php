<?php
require_once "figuraGeometrica.php";
    class Triangulo extends FiguraGeometrica {
        private $_altura;
        private $_base;

        public function __construct($pAltura, $pBase) {
            $this->_altura = $pAltura;
            $this->_base = $pBase;
            $this->CalcularDatos();
        }

        protected function CalcularDatos() {
            $this->_superficie = ($this->_base * $this->_altura) / 2;
            $this->_perimetro = ($this->_base * 2) + $this->_altura;
        }
        
        public function Dibujar() {
            $respuesta = '';
            $auxAlt = $this->_altura;
            
            if ($this->_altura < $this->_base) {
                $respuesta = "La altura debe ser menor o igual a la base.";
            }elseif ($this->_altura > $this->_base) {
                for ($i=0; $i < $this->_altura; $i++) { 
                    if($i==0){
                        $respuesta .= str_repeat('&nbsp;',$auxAlt);
                    }
                    if (($i % 2) != 0) {
                        $respuesta .= str_repeat('&nbsp;',$auxAlt);
                    }
                    
                    $auxAlt--;
                    for ($j=0; $j < $this->_altura; $j++) { 
                        if (($i % 2) != 0) {
                            break;
                        }
                        $respuesta .= "*";
                        if ($i<=$j) {
                            break;
                        }
                    }
                    if (($i % 2) == 0) {
                        $respuesta .= "<br>";
                    }
                    
                }
            }else {
                for ($i=0; $i < $this->_altura; $i++) { 
                    $respuesta .= str_repeat('&nbsp;',$auxAlt);
                    $auxAlt--;
                    for ($j=0; $j < $this->_altura; $j++) { 
                        $respuesta .= "*";
                        if ($i<=$j) {
                            break;
                        }
                    }
                    $respuesta .= "<br>";
                }
            }
            $respuesta = "<p style='color:".parent::GetColor()."'> ".$respuesta."</p>";
            return $respuesta;
        }

        public function ToString(){
            $respuesta = '';

            $respuesta .= get_class($this)."<br>";
            $respuesta .= "Altura: ".$this->_altura."<br>";
            $respuesta .= "Base: ".$this->_base."<br>";
            $respuesta .= "Superficie: ".$this->_superficie."<br>";
            $respuesta .= "Perimetro: ".$this->_perimetro."<br>";
            $respuesta .= $this->Dibujar();
            $respuesta .= "<br>";
            
            return $respuesta;
        }

    }
?>