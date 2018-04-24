<?php
    require_once "clases/alumno.php";
    //require_once "clases/archivos.php";
/*
    $queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;
    $queHago = isset($_GET['queHago']) ? $_GET['queHago'] : NULL;
    */
    
    

    if (isset($_POST['queHago'])) {
        $queHago = isset($_POST['queHago']);
        switch ($queHago) {
            case 'saludo':
                echo "Hola post";
                break;
            
            default:
                # code...
                break;
        }
    }else if(isset($_GET['queHago'])) {
        $queHago = isset($_GET['queHago']);
        switch ($queHago) {
            case 'saludo':
                echo "Hola get";
                break;
            
            default:
                # code...
                break;
        }
    }
?>