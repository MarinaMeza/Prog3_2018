<?php
require_once 'venta.php';
require_once 'IApiUsable.php';

class ventaApi extends Venta implements IApiUsable{

    public function CargarUno($request, $response, $args) {
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $idMedia= $ArrayDeParametros['idMedia'];
        $nombreCliente= $ArrayDeParametros['nombreCliente'];
        $importe= $ArrayDeParametros['importe'];
        $miVenta = new Venta();
        $miVenta->idMedia = $idMedia;
        $miVenta->nombreCliente = $nombreCliente;
        $miVenta->fecha = date("y-m-d");
        $miVenta->importe = $importe;
        $archivos = $request->getUploadedFiles();
        if(!file_exists('fotosVenta')) {
            mkdir('fotosVenta', 0777, true);
        }
        $destino="./fotosVenta/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);
        if(isset($archivos['foto'])){
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior);
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $archivos['foto']->moveTo($destino.$idMedia.$nombreCliente.$miVenta->fecha.".".$extension[0]);
            $miVenta->foto = $destino.$nombreCliente.$idMedia.".".$extension[0];
        }
        $miVenta->InsertarVentaParametros();
        //$response->getBody()->write("se guardo el cd");
        $objDelaRespuesta->respuesta = "Se guardó la venta.";
        
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function TraerUno($request, $response, $args) {
        $id=$args['id'];
        $laVenta=Venta::TraerUnaVenta($id);
        if(!$laVenta) {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="No esta la venta";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
        } else {
            $NuevaRespuesta = $response->withJson($laVenta, 200); 
        }     
        return $NuevaRespuesta;
    }
    
    public function TraerTodos($request, $response, $args) {
        $todasLasVentas=Venta::TraerTodasLasVentas();
        $newresponse = $response->withJson($todasLasVentas, 200);  
        return $newresponse;
    }

    public function TraerTodosFiltrado($request, $response, $args) {
        $todasLasVentas=Venta::TraerTodasLasVentas-filtrado();
        $todasLasVentasAux = array();
        foreach ($todasLasVentas as $venta) {
            $aux = (object) array_filter((array) $venta);
            array_push($todasLasVentasAux,$aux);
        }
        $newresponse = $response->withJson($todasLasVentasAux, 200);  
        return $newresponse;
    }

    public function BorrarUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $id=$ArrayDeParametros['id'];
        $venta= new Venta();
        $venta->id=$id;
        $cantidadDeBorrados=$venta->BorrarVenta();

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
        echo "array de para<br>";
        var_dump($ArrayDeParametros);
        echo "<br>";
        $miVenta = new Venta();
        $miVenta->id=$ArrayDeParametros['id'];
        $miVenta->idMedia=$ArrayDeParametros['idMedia'];
        $miVenta->nombreCliente=$ArrayDeParametros['nombreCliente'];
        //$miVenta->fecha=$ArrayDeParametros['fecha'];
        $miVenta->importe=$ArrayDeParametros['importe'];
        //$miVenta->foto=$ArrayDeParametros['foto'];
        $archivos = $request->getUploadedFiles();        
        if(!file_exists('fotosVenta')) {
            mkdir('fotosVenta', 0777, true);
        }
        $destino="./fotosVenta/";
        if(isset($archivos['foto'])){
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior);
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $miVenta->fecha = date("y-m-d");;
            $nombreArchivo = $miVenta->idMedia.$miVenta->nombreCliente.$miVenta->fecha.".".$extension[0];
            $nueva = $destino.$nombreArchivo;
            $estructura = "./fotosVenta/Backup/";
            if (file_exists($nueva)) {
                if(!file_exists($estructura)) {
                    mkdir($estructura, 0777, true);
                }
                //$nuevoDestino = "Backup/";
                //$archivos['foto']->moveTo($estructura.$nombreArchivo);
                rename($nueva, $estructura.$nombreArchivo);
            }
            $archivos['foto']->moveTo($nueva);
            $miVenta->foto = $destino.$nombreArchivo;
            echo "<br>nombre de archivo: ".$nombreArchivo."<br>nueva: ".$nueva."<br>esrtuctura: ".$estructura."<br>";
        }
        
        $resultado =$miVenta->ModificarVentaParametros();
        $objDelaRespuesta= new stdclass();
        //var_dump($resultado);
        $objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
        return $response->withJson($objDelaRespuesta, 200);
   }

}
?>