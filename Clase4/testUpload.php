<?php
    /*var_dump($_POST);
    var_dump($_FILES);*/

    $destino = "archivos/".$_FILES['archivo']['name'];
    //echo "<b><br>".$destino."</b><br>";
    move_uploaded_file($_FILES['archivo']['tmp_name'],$destino);

    //sacar la extension manipulando el nombre
    $arrayNombre = explode(".",$_FILES['archivo']['name']);
    //array_pop($arrayNombre);
    //$extension = array_reverse($arrayNombre)[0];//invierte el array y retorna el primer elemento
    //$extension = end($arrayNombre);
    $tipoDeArechivo = pathinfo($_FILES['archivo']['name'],PATHINFO_EXTENSION);


    var_dump($tipoDeArechivo);


    
?>