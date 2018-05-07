<?php
class Venta {
    public $email;
    public $sabor;
    public $tipo;
    public $cantidad;

    public function __construct($pEmail, $pSabor, $pTipo, $pCantidad) {
        $this->email = $pEmail;
        $this->sabor = $pSabor;
        $this->tipo = $pTipo;
        $this->cantidad = $pCantidad;
    }


    
}

?>