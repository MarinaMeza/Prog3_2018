<?php
class Usuario {
    public $nombre;
    public $email;
    public $perfil;
    public $edad;
    public $clave;
    public $foto;
/*
    public function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 6:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
                break;
            default:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
        }
}*//*
    public function __construct1($pNombre = NULL, $pEmail, $pPerfil = NULL, $pEdad = NULL, $pClave) {
        $this->nombre = $pNombre;
        $this->email = $pEmail;
        $this->perfil = $pPerfil;
        $this->edad = $pEdad;
        $this->clave = $pClave;        
    }*/

    public function __construct($pNombre = NULL, $pEmail, $pPerfil = NULL, $pEdad = NULL, $pClave = NULL, $pFoto = NULL) {
        $this->nombre = $pNombre;
        $this->email = $pEmail;
        $this->perfil = $pPerfil;
        $this->edad = $pEdad;
        $this->clave = $pClave; 
        $extension = pathinfo($pFoto, PATHINFO_EXTENSION);
        $this->pFoto = "ImagenesDeUsuario/".$pEmail.".".$extension;
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

    public static function UsuarioModificacion($pUsuario) {
        $retorno = FALSE;
        $listaUsuarios = self::TraerTodos();
        echo "<br>---------------lista-------------------<br>";
        var_dump ($listaUsuarios);
        $fecha = date('Y-m-d');
        /*
        foreach ($listaUsuarios as $usuario) {            
            if ($pUsuario->email == $usuario[1] /*&& $pUsuario->perfil == 'user') {
                echo "<br>IF".$usuario[0]."<br>";
                echo "<br>IF".$pUsuario->nombre."<br>";
                $usuario[0] = $pUsuario->nombre;
                echo "<br>IF".$usuario[0]."<br>";
                $retorno = TRUE;
                break;
            }
    }*/
        
        for ($i=0; $i < count($listaUsuarios); $i++) { 
            //echo "<br>lista".$listaUsuarios[$i][1]."<br>";
                //echo "<br>pusuario".$pUsuario->email."<br>";
            if ($listaUsuarios[$i][1] == $pUsuario->email) {
                echo "<br>lista".$listaUsuarios[$i][0]."<br>";
                echo "<br>pusuario".$pUsuario->ToString()."<br>";
                echo "<br>fileget".file_get_contents('usuarios.txt')."<br>";
                $auxUsuario = $listaUsuarios[$i][0]."__".$listaUsuarios[$i][1]."__".$listaUsuarios[$i][2]."__".$listaUsuarios[$i][3]."__".$listaUsuarios[$i][4];
                
                file_put_contents('usuarios.txt', str_replace($auxUsuario, $pUsuario->ToString(), file_get_contents('usuarios.txt')));
                
                rename('ImagenesDeUsuario/'.$pUsuario->email.'.jpg', 'backup/'.$pUsuario->email.'-'.$fecha.'.jpg');
                move_uploaded_file($_FILES['foto']['tmp_name'], 'ImagenesDeUsuario/'.$pUsuario->email.'.jpg');
            }
        }
        if(!file_exists('backup')) {
            mkdir('backup', 0777, true);
        }
        rename('usuarios.txt', 'backup/usuarios'.$fecha.'.txt') ;
        
        echo "<br>----------------------------------<br>";
        var_dump ($listaUsuarios);
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