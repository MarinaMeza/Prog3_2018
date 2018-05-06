<?php
class Comentario {
    public $email;
    public $titulo;
    public $comentario;
    public $foto;

    public function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 3:
                self::__construct1($argv[0], $argv[1], $argv[2]);
                break;
            case 4:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
        }
    }
    
    public function __construct1 ($pEmail, $pTitulo, $pComentario) {
        $this->email = $pEmail;
        $this->titulo = $pTitulo;
        $this->comentario = $pComentario;
    }

    public function __construct2 ($pEmail, $pTitulo, $pComentario, $pFoto) {
        self::__construct1($pEmail, $pTitulo, $pComentario);
        $this->foto = $pFoto;
    }


    public function ToString () {
        return $this->email."__".$this->titulo."__".$this->comentario."\r\n";
    }
}    
?>