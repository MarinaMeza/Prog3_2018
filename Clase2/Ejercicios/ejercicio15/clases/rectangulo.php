<?php
require_once "figuraGeometrica.php";
    class Rectangulo extends FiguraGeometrica {
        private $_ladoDos;
        private $_ladoUno;

        public function __construct($pLadoDos, $pLadoUno) {
            $this->_ladoDos = $pLadoDos;
            $this->_ladoUno = $pLadoUno;
            
            $this->CalcularDatos();
        }

        protected function CalcularDatos() {
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
            $this->_perimetro = ($this->_ladoUno * 2) + ($this->_ladoDos * 2);
        }
        
        public function Dibujar() {
            $respuesta = '';

            for ($i=0; $i < $this->_ladoUno; $i++) { 
                
                for ($j=0; $j < $this->_ladoDos; $j++) { 
                    $respuesta .= "*";
                }
                $respuesta .= "<br>";
            }
            $respuesta = "<p style='color:".parent::GetColor()."'> ".$respuesta."</p>";
            return $respuesta;
        }

        public function ToString(){
            $respuesta = '';

            $respuesta .= get_class($this)."<br>";
            $respuesta .= "Lado uno: ".$this->_ladoUno."<br>";
            $respuesta .= "Lado dos: ".$this->_ladoDos."<br>";
            $respuesta .= "Superficie: ".$this->_superficie."<br>";
            $respuesta .= "Perimetro: ".$this->_perimetro."<br>";
            $respuesta .= $this->Dibujar();
            $respuesta .= "<br>";
            
            return $respuesta;
            
        }
    }
?>