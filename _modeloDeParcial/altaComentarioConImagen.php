<?php
    require_once 'altaComentario.php';

    if(!file_exists('ImagenesDeComentario')) {
        mkdir('ImagenesDeComentario', 0777, true);
    }
    var_dump($comentario);

    if($retorno == 1) {
        echo "holaaaa";
    } else {
        echo "NOPOOOOOOOOOOOOOO";
    }



    $extension = pathinfo($comentario->foto, PATHINFO_EXTENSION);
        if($comentario->foto != "") {
            if ($extension != 'jpg') {
                echo "<br>Error guardando la foto<br>";
            }else {
                $ubicacion = "ImagenesDeComentario/".$comentario->titulo.".".$extension;
                move_uploaded_file($_FILES['foto']['tmp_name'],$ubicacion);
            }
        }
?>