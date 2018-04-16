<?php
    abstract class FiguraGeometrica {
        protected $_color;
        protected $_perimetro;
        protected $_superficie;

        public function __construct() {
            
        }

        public function GetColor() {
            return $this->_color;
        }

        public function SetColor($pColor) {
            $this->_color = $pColor;
        }
        
        public function ToString() {

        }

        public abstract function Dibujar();

        protected abstract function CalcularDatos();
    }
?>