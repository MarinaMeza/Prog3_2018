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

    public function getFoto(){
        return $this->foto;
    }

    public function __construct2 ($pEmail, $pTitulo, $pComentario, $pFoto) {
        self::__construct1($pEmail, $pTitulo, $pComentario);
        $extension = pathinfo($pFoto, PATHINFO_EXTENSION);
        $this->foto = "ImagenesDeComentario/".$pTitulo.".".$extension;
    }

    public static function TraerTodos() {
        $listaComentarios = array();
        $archivo = fopen('comentario.txt','r');
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            $comentarios = explode('__',$linea);
            $comentarios[0] = trim($comentarios[0]);
            if ($comentarios[0] != '') {
                $listaComentarios[] = $comentarios;
            }
        }
        fclose($archivo);
        
        return $listaComentarios;
    }

    public function ToString () {
        return $this->email."__".$this->titulo."__".$this->comentario."\r\n";
    }
}    
?>