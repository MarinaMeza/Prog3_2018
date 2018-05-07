<?php
class Usuario {
    public $nombre;
    public $email;
    public $perfil;
    public $edad;
    public $clave;

    public function __construct ($pNombre = NULL, $pEmail, $pPerfil = NULL, $pEdad = NULL, $pClave) {
        $this->nombre = $pNombre;
        $this->email = $pEmail;
        $this->perfil = $pPerfil;
        $this->edad = $pEdad;
        $this->clave = $pClave;        
    }

    public static function UsuarioCarga($pUsuario) {
        $retorno = TRUE;
        $archivo = fopen('usuarios.txt','a');
        if (!fwrite($archivo, $pUsuario->ToString())) {
            $retorno = FALSE;
        }
        fclose($archivo);

        return $retorno;
    }

    public static function VerificarUsuario($pEmail, $pClave) {
        $listaUsuarios = self::TraerTodos();

        //var_dump($listaUsuarios);
        $retorno = 'El usuario no existe';

        foreach ($listaUsuarios as $usuario) {
            if ($pEmail == $usuario[1]) {
                if ($pClave==trim($usuario[4])) {
                    $retorno = "Bienvenido";
                    break;
                } else {
                    $retorno = "La clave ingresada es incorrecta";
                }
            }
        }

        return $retorno;
    }

    public static function TraerTodos() {
        $listaUsuarios = array();
        $archivo = fopen('usuarios.txt','r');
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            $usuarios = explode('__',$linea);
            $usuarios[0] = trim($usuarios[0]);
            if ($usuarios[0] != '') {
                $listaUsuarios[] = $usuarios;
            }
        }
        fclose($archivo);
        
        return $listaUsuarios;
    }


    public function ToString () {
        return $this->nombre."__".$this->email."__".$this->perfil."__".$this->edad."__".$this->clave."\r\n";
    }
}

?>