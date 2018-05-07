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
        $extension = pathinfo($pFoto, PATHINFO_EXTENSION);
        $this->foto = "ImagenesDeComentario/".$pTitulo.".".$extension;
    }
    
    public function getFoto(){
        return $this->foto;
    }

    public static function AltaComentario($pComentario) {
        $listaUsuarios = Usuario::TraerTodos();
        $retorno = FALSE;
        $archivo = fopen('comentario.txt','a');

        foreach ($listaUsuarios as $usuario) {
            if ($pComentario->email == $usuario[1]) {
                $retorno = TRUE;
                break;
            }
        }

        if ($retorno == TRUE) {
            fwrite($archivo, $pComentario->ToString());
        }
        fclose($archivo);

        return $retorno;
    }

    public static function AltaComentarioConImagen($pComentario) {
        $retorno = FALSE;
        $extension = pathinfo($pComentario->foto, PATHINFO_EXTENSION);
        if($pComentario->foto != "") {
            if ($extension != 'jpg') {
                echo "<br>Error guardando la foto<br>";
            }else {
                $retorno = TRUE;
                move_uploaded_file($_FILES['foto']['tmp_name'],$pComentario->foto);
            }
        }

        return $retorno;
    }

    public static function TablaComentarios($pEmail, $pTitulo) {
        $listaComentarios = Comentario::TraerTodos();
        $listaUsuarios = Usuario::TraerTodos();
        $flag = FALSE;
        $tabla = "<table style='border: 1px solid black'> 
                    
                        <tr>
                            <th>IMAGEN</th>
                            <th>TITULO</th>
                            <th>EDAD</th>
                            <th>NOMBRE</th>
                        </tr>
                    ";
        /*
        var_dump($listaComentarios);
        echo "<br>--------<br>";
        var_dump($listaUsuarios);*/
        //echo '<img src="ImagenesDeComentario/Saludos.jpg" alt="noseque">';

        foreach ($listaComentarios as $comentario) {
            if ($pEmail == $comentario[0] || $pTitulo == $comentario[1]) {
                $flag = TRUE;
                //$tabla .= "<br>".$comentario[1]."<br>";
                $tabla .= '<td><img src="'.$comentario[1].'.jpg" width="150" alt="'.$comentario[1].'.jpg"></td>
                        <td>'.$comentario[1].'</td>';
                foreach ($listaUsuarios as $usuario) {
                    if ($pEmail == $usuario[1]) {
                        //$tabla .= "<br>".$usuario[1]."<br>";
                        //$tabla .= "<br>".$usuario[3]."<br>";
                        $tabla .= '<td>'.$usuario[3].'</td>
                                <td>'.$usuario[1].'</td>
                                </tr>';
                    }
                }
                $tabla .= "</tr>";
            }
        }/*
        foreach ($listaComentarios as $comentario) {
            foreach ($listaUsuarios as $usuario) {
                if ($pEmail == $comentario[0] || $pTitulo == $comentario[1]) {
                    if ($pEmail == $listaUsuarios[1]) {
                        $tabla .= '<tr>
                                <td><img src="Saludos.jpg" width="150" alt="20"></td>
                                <td>'.$comentario[1].'</td>
                                <td>'.$usuario[3].'</td>
                                <td>'.$usuario[0].'</td>
                        </tr>';
                        break;
                    }
                    
                }
            }
        }*/
        $tabla .= "</table>";
        //<td><img src="ImagenesDeComentario/'.$comentario[1].'.jpg" ></td>

        //tabla hardcodeada que carga en chrome imagenes pero no en postman
        /*$tabla = '<table style="border: 1px solid black"> 
                    <tr>
                        <th>IMAGEN</th>
                        <th>TITULO</th>
                        <th>EDAD</th>
                        <th>NOMBRE</th>
                    </tr>';
                    for ($i=0; $i < 3; $i++) { 
                        $tabla .= '<tr><td><img src="Saludos.jpg" width="150" alt="20"></td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>1</td></tr>';
                    }
        $tabla.='</table>';*/
        if (!$flag) {
            $tabla = "No se han ingresado valores para la busqueda o los valores ingresados son incorrectos";
        } else {
            return $tabla;
        }
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