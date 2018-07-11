<?php
require_once 'compra.php';
require_once 'IApiUsable.php';
require_once 'AutentificadorJWT.php';

class compraApi extends Compra implements IApiUsable{

    public function CargarUno($request, $response, $args) {
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
  //      $id= $ArrayDeParametros['id'];
        $articulo= $ArrayDeParametros['articulo'];
        $precio= $ArrayDeParametros['precio'];
        $perfil= $ArrayDeParametros['perfil'];
        $miCompra = new Compra();
        $miCompra->articulo = $articulo;
        $miCompra->fecha = date("y-m-d");
        $miCompra->precio = $precio;
        $miCompra->perfil = $perfil;
        $archivos = $request->getUploadedFiles();
        if(!file_exists('IMGCompras')) {
            mkdir('IMGCompras', 0777, true);
        }
        $destino="./IMGCompras/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);
        
        if(isset($archivos['foto'])){
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior);
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $archivos['foto']->moveTo($destino.$perfil.$articulo.".".$extension[0]);
            $miCompra->foto = $destino.$perfil.$articulo.".".$extension[0];
        }
        $miCompra->InsertarCompraParametros();
        //$response->getBody()->write("se guardo el cd");
        $objDelaRespuesta->respuesta = "Se guardó la compra.";
        
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
    
    public function traerFiltrado($request, $response, $args) {
        $token = $request->getHeader('token')[0];
        //var_dump($token);
        $payload=AutentificadorJWT::ObtenerData($token);
        //var_dump($payload->nombre);
        if ($payload->nombre == 'admin') {
            //var_dump($payload->nombre);
            return self::TraerTodos($request, $response, $args);
        }else { 
            //var_dump($payload->nombre);
            return self::TraerTodosFiltrado($request, $response, $args, $payload->nombre);
        }
    }

    public function TraerTodos($request, $response, $args) {
        $todasLasCompras=Compra::TraerTodasLasCompras();
        $newresponse = $response->withJson($todasLasCompras, 200);  
        return $newresponse;
    }
    public function TraerTodosFiltrado($request, $response, $args, $filtro) {
        $todasLasCompras=Compra::TraerTodasLasCompras();
        $todasLasComprasAux = array();
        foreach ($todasLasCompras as $venta) {
            if ($filtro == $venta->perfil) {
                $aux = (object) array_filter((array) $venta);
                array_push($todasLasComprasAux,$aux);
            }
        }
        $newresponse = $response->withJson($todasLasComprasAux, 200);  
        return $newresponse;
    }

    public function BorrarUno($request, $response, $args) {/*
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
        return $newResponse;*/
   }
    
    public function ModificarUno($request, $response, $args) {
        //$response->getBody()->write("<h1>Modificar  uno</h1>");
       /* $ArrayDeParametros = $request->getParsedBody();
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
        return $response->withJson($objDelaRespuesta, 200);*/
   }

}
?>