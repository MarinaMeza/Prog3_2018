<?php
require_once 'usuario.php';
require_once 'IApiUsable.php';

class usuarioApi extends Usuario implements IApiUsable{

    public function CargarUno($request, $response, $args) {
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $nombre= $ArrayDeParametros['nombre'];
        $clave= $ArrayDeParametros['clave'];
        $sexo= $ArrayDeParametros['sexo'];
        if ($ArrayDeParametros['perfil'] == NULL) {
            $perfil= 'usuario';
        } else {
            $perfil= $ArrayDeParametros['perfil'];
        }
        $miUsuario = new Usuario();
        $miUsuario->nombre = $nombre;
        $miUsuario->clave = $clave;
        $miUsuario->sexo = $sexo;
        $miUsuario->perfil = $perfil;
        $miUsuario->InsertarUsuarioParametros();
        $archivos = $request->getUploadedFiles();/*
        if(!file_exists('fotos')) {
            mkdir('fotos', 0777, true);
        }
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);
        if(isset($archivos['foto'])){
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior)  ;
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $archivos['foto']->moveTo($destino.$clave.$nombre.".".$extension[0]);
        }*/
        //$response->getBody()->write("se guardo el cd");
        $objDelaRespuesta->respuesta = "Se guardó el usuario.";
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function TraerUno($request, $response, $args) {
        /*$nombre=$args['nombre'];
        $clave=$args['clave'];
        $perfil=$args['perfil'];*/
        $elUsuario=Usuario::TraerUnUsuario($request);
        //var_dump($elUsuario);
        if(!$elUsuario) {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="No esta el Usuario";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
        } else {
            $NuevaRespuesta = $response->withJson($elUsuario, 200); 
        }     
        var_dump($NuevaRespuesta);
        return $NuevaRespuesta;
    }
    
    public function TraerTodos($request, $response, $args) {
        $todosLosUsuarios=Usuario::TraerTodosLosUsuarios();
        $newresponse = $response->withJson($todosLosUsuarios, 200);  
        return $newresponse;
    }

    public function BorrarUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $id=$ArrayDeParametros['id'];
        $usuario= new Usuario();
        $usuario->id=$id;
        $cantidadDeBorrados=$usuario->BorrarUsuario();

        $objDelaRespuesta= new stdclass();
        $objDelaRespuesta->cantidad=$cantidadDeBorrados;
        if($cantidadDeBorrados>0) {
            $objDelaRespuesta->resultado="algo borro!!!";
        } else {
            $objDelaRespuesta->resultado="no Borro nada!!!<br>".$ArrayDeParametros;
        }
        $newResponse = $response->withJson($objDelaRespuesta, 200);  
        return $newResponse;
   }
    
    public function ModificarUno($request, $response, $args) {
        //$response->getBody()->write("<h1>Modificar  uno</h1>");
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);    	
        $miUsuario = new Usuario();
        $miUsuario->id=$ArrayDeParametros['id'];
        $miUsuario->nombre=$ArrayDeParametros['nombre'];
        $miUsuario->clave=$ArrayDeParametros['clave'];
        
        $resultado =$miUsuario->ModificarUsuarioParametros();
        $objDelaRespuesta= new stdclass();
        //var_dump($resultado);
        $objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
        return $response->withJson($objDelaRespuesta, 200);
   }

   public function CrearToken($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $nombre= $ArrayDeParametros['nombre'];
        $clave= $ArrayDeParametros['clave'];
        $perfil= $ArrayDeParametros['perfil'];
        //var_dump($ArrayDeParametros);
        $miUsuario = new Usuario();
        $resultado = $miUsuario->TraerUnUsuario($nombre, $clave, $perfil);
        //var_dump($resultado);
        if (!$resultado) {
            $newResponse = "Los datos ingresados son incorrectos";
        } else {
            $data = array('nombre' => $nombre, 'perfil' => $perfil);
            $token = AutentificadorJWT::CrearToken($data);
            $newResponse = $response->withJson($token, 200);
        }
        return $newResponse;
   }
}
?>