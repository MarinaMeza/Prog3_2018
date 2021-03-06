<?php
require_once 'cd.php';
require_once 'IApiUsable.php';

class cdApi extends cd implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$elCd=cd::TraerUnCd($id);
     	$newResponse = $response->withJson($elCd, 200);  
    	return $newResponse;
    }
     public function TraerTodos($request, $response, $args) {
      	$todosLosCds=cd::TraerTodoLosCds();
     	$response = $response->withJson($todosLosCds, 200);  
    	return $response;
    }
    public function CargarUno($request, $response, $args) {
    	$ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $valor_char= $ArrayDeParametros['valor_char'];
        $valor_date= $ArrayDeParametros['valor_date'];
        $vaor_int= $ArrayDeParametros['valor_int'];
        
        $micd = new cd();
        $micd->valor_char=$valor_char;
        $micd->valor_date=$cantante;
        $micd->vaor_int=$vaor_int;
        $micd->InsertarElCdParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("se guardo el cd");

        return $response;
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$cd= new cd();
     	$cd->id=$id;
     	$cantidadDeBorrados=$cd->BorrarCd();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {
     	//$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $micd = new cd();
	    $micd->id=$ArrayDeParametros['id'];
	    $micd->titulo=$ArrayDeParametros['titulo'];
	    $micd->cantante=$ArrayDeParametros['cantante'];
	    $micd->año=$ArrayDeParametros['anio'];

	   	$resultado =$micd->ModificarCdParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }


}