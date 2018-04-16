<?php
require_once "punto.php";
    class Rectangulo {
        private $_vertice1;// = new Punto($_POST["x1"], $_POST["y1"]);
        private $_vertice2;// = new Punto($_POST["x2"], $_POST["y2"]);
        private $_vertice3;// = new Punto($_POST["x3"], $_POST["y3"]);
        private $_vertice4;// = new Punto($_POST["x4"], $_POST["y4"]);
        public $area;
        public $ladoUno;
        public $ladoDos;
        public $perimetro;

        public function __construct($v1, $v3) {
            $this->_vertice1 = $v1;
            $this->_vertice3 = $v3;
            $this->_vertice2 = new Punto($this->_vertice3->GetX(), $this->_vertice1->GetY());
            $this->_vertice4 = new Punto($this->_vertice1->GetX(), $this->_vertice3->GetY());
            $this->ladoUno = $this->_vertice3->GetX() - $this->_vertice4->GetX();
            $this->ladoDos = $this->_vertice1->GetY() - $this->_vertice4->GetY();
            $this->area = $this->ladoUno * $this->ladoDos;
            $this->perimetro = ($this->ladoUno * 2) + ($this->ladoDos * 2);
        }

        public function Dibujar() {
            $respuesta = '';
            if ($this->_vertice3->GetX() <= $this->_vertice1->GetX() ||
                $this->_vertice1->GetY() <= $this->_vertice3->GetY()) {
                $respuesta = "Error. X3 debe ser mayor a X1 e Y1 debe ser mayor a Y3";
            }else {
                $respuesta .= "Vertice 1: (".$this->_vertice1->GetX().";".$this->_vertice1->GetY().")<br>";
                $respuesta .= "Vertice 2: (".$this->_vertice2->GetX().";".$this->_vertice2->GetY().")<br>";
                $respuesta .= "Vertice 3: (".$this->_vertice3->GetX().";".$this->_vertice3->GetY().")<br>";
                $respuesta .= "Vertice 4: (".$this->_vertice4->GetX().";".$this->_vertice4->GetY().")<br>";
                $respuesta .= "Lado uno: ".$this->ladoUno."<br>";
                $respuesta .= "Lado dos: ".$this->ladoDos."<br>";
                $respuesta .= "Area: ".$this->area."<br>";
                $respuesta .= "Perimetro: ".$this->perimetro."<br>";
                
                for ($i=10; $i > 0 ; $i--) { 
                    for ($j=0; $j < 10; $j++) { 
                        if ($j >= $this->_vertice1->GetX() && $j < $this->_vertice2->GetX() &&
                        $i > $this->_vertice3->GetY() && $i <= $this->_vertice2->GetY() ) {
                            $respuesta .= "X";
                        }else {
                            $respuesta .= "O";
                        }
                    }
                    $respuesta .= "<br>";
                }
            }
            
            return $respuesta;
        }
    }
?>