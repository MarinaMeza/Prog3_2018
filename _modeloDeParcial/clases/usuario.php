<?php
class Usuario {
    public $nombre;
    public $email;
    public $perfil;
    public $edad;
    public $clave;

    public function __construct ($pNombre, $pEmail, $pPerfil, $pEdad, $pClave) {
        $this->nombre = $pNombre;
        $this->email = $pEmail;
        $this->perfil = $pPerfil;
        $this->edad = $pEdad;
        $this->clave = $pClave;        
    }


    public function ToString () {
        return $this->nombre."__".$this->email."__".$this->perfil."__".$this->edad."__".$this->clave."\r\n";
    }
}

?>