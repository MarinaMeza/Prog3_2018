<?php
    require_once 'clases/comentario.php';
    require_once 'clases/usuario.php';

    $listaComentarios = Comentario::TraerTodos();
    $listaUsuarios = Usuario::TraerTodos();
    $flag = 0;
    $tabla = "<table style='border: 1px solid black'> 
                
                    <tr>
                        <th>IMAGEN</th>
                        <th>TITULO</th>
                        <th>EDAD</th>
                        <th>NOMBRE</th>
                    </tr>
                ";

    $email = isset($_GET['email']) ? $_GET['email'] : NULL;
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : NULL;
    /*
    var_dump($listaComentarios);
    echo "<br>--------<br>";
    var_dump($listaUsuarios);*/
    //echo '<img src="ImagenesDeComentario/Saludos.jpg" alt="noseque">';
    
    foreach ($listaComentarios as $comentario) {
        if ($email == $comentario[0] || $titulo == $comentario[1]) {
            $flag = 1;
            //$tabla .= "<br>".$comentario[1]."<br>";
            $tabla .= '<td><img src="'.$comentario[1].'.jpg" width="150" alt="'.$comentario[1].'.jpg"></td>
                       <td>'.$comentario[1].'</td>';
            foreach ($listaUsuarios as $usuario) {
                if ($email == $usuario[1]) {
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
            if ($email == $comentario[0] || $titulo == $comentario[1]) {
                if ($email == $listaUsuarios[1]) {
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
    if ($flag == 0) {
        $tabla = "No se han ingresado valores para la busqueda";
    }
    echo $tabla;
?>