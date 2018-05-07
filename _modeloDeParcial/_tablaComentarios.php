<?php
    require_once "clases/comentario.php";

    $listaComentarios = Comentario::TraerTodos();

    var_dump($listaComentarios);
/*    $tabla = '';
/*    $rows = array();

    foreach ($listaComentarios as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>".implode('', $cells)."</tr>";
    }
    $tabla = "<table>".implode('', $rows)."</table>";*/
    $tabla = "<table> 
                <thread>
                    <tr>
                        <th>IMAGEN</th>
                        <th>TITULO</th>
                        <th>EDAD</th>
                        <th>NOMBRE</th>
                    </tr>
                </thread>";

    foreach ($listaComentarios as $comentario) {
        $foto = '';
        if ($comentario->getFoto()) {
            $foto = "No disponible";
        } else {
            $foto = $comentario->getFoto();
        }
        $tabla = "<tr>
                    <td><src=".$foto."></img></td>
                    <td>".$comentario->titulo."</td>
                    
                  </tr>";
    }
    echo $tabla;
?>*/