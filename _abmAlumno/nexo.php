<?php
    require_once "clases/alumno.php";
    //require_once "clases/archivos.php";
/*
    $queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;
    $queHago = isset($_GET['queHago']) ? $_GET['queHago'] : NULL;
    */
    
    

    if (isset($_POST['queHago'])) {
        $queHago = $_POST['queHago'];
        
        switch ($queHago) {
            case 'alta':
                echo "Hola alta";
                $alumno = new Alumno($_POST['nombre'], $_POST['legajo'], $_FILES['foto']['name']);
                $alumno->Guardar();
                break;
            case 'baja':
            echo "Hola baja";
                Alumno::holaAlumno();
                break;
            case 'modificacion':
                echo "Hola modificacion";
                break;
            default:
                # code...
                break;
        }
    }else if(isset($_GET['queHago'])) {
        $queHago = isset($_GET['queHago']);
        switch ($queHago) {
            case 'listar':
                echo "Hola get";
                break;
            
            default:
                # code...
                break;
        }
    }
?>