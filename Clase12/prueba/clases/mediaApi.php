<?php
require_once 'media.php';
require_once 'IApiUsable.php';

class mediaApi extends Media implements IApiUsable{

    public function CargarUno($request, $response, $args) {
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $color= $ArrayDeParametros['color'];
        $marca= $ArrayDeParametros['marca'];
        $precio= $ArrayDeParametros['precio'];
        $talle= $ArrayDeParametros['talle'];
        
        $miMedia = new Media();
        $miMedia->color = $color;
        $miMedia->marca = $marca;
        $miMedia->precio = $precio;
        $miMedia->talle = $talle;
        
        $archivos = $request->getUploadedFiles();
        if(!file_exists('fotos')) {
            mkdir('fotos', 0777, true);
        }
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);
        if(isset($archivos['foto'])){
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior);
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $archivos['foto']->moveTo($destino.$marca.$color.".".$extension[0]);
            $miMedia->foto = $destino.$marca.$color.".".$extension[0];
        }
        $miMedia->InsertarMediaParametros();
        //$response->getBody()->write("se guardo el cd");
        $objDelaRespuesta->respuesta = "Se guardó la media.";   
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function TraerUno($request, $response, $args) {
        $id=$args['id'];
        $laMedia=Media::TraerUnaMedia($id);
        if(!$laMedia) {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="No esta la media";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
        } else {
            $NuevaRespuesta = $response->withJson($laMedia, 200); 
        }     
        return $NuevaRespuesta;
    }
    
    public function TraerTodos($request, $response, $args) {
        $todasLasMedias=Media::TraerTodasLasMedias();
        $newresponse = $response->withJson($todasLasMedias, 200);  
        return $newresponse;
    }

    public function TraerTodosFiltrado($request, $response, $args) {
        $todasLasMedias=Media::TraerTodasLasMediasFiltrado();
        $todasLasMediasAux = array();
        foreach ($todasLasMedias as $media) {
            $aux = (object) array_filter((array) $media);
            array_push($todasLasMediasAux,$aux);
        }
        $newresponse = $response->withJson($todasLasMediasAux, 200);  
        return $newresponse;
    }

    public function BorrarUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $id=$ArrayDeParametros['id'];
        $media= new Media();
        $media->id=$id;
        $cantidadDeBorrados=$media->BorrarMedia();

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
        $miMedia = new Media();
        $miMedia->id=$ArrayDeParametros['id'];
        $miMedia->color=$ArrayDeParametros['color'];
        $miMedia->marca=$ArrayDeParametros['marca'];
        $miMedia->precio=$ArrayDeParametros['precio'];
        $miMedia->talle=$ArrayDeParametros['talle'];
        $miMedia->foto=$ArrayDeParametros['foto'];
        $resultado =$miMedia->ModificarMediaParametros();
        $objDelaRespuesta= new stdclass();
        //var_dump($resultado);
        $objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
        return $response->withJson($objDelaRespuesta, 200);
   }

}
?>