<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require __DIR__.'/vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/UsuarioApi.php';
require_once './clases/loginApi.php';
require_once './clases/compraApi.php';
require_once './clases/AutentificadorJWT.php';
require_once './clases/MWparaCORS.php';
require_once './clases/MWparaAutentificar.php';
require_once './clases/MWLog.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);



/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
$app->group('/usuario', function () {
  
   $this->get('/', \usuarioApi::class . ':traerTodos')->add(\MWparaAutentificar::class . ':VerificarUsuarioAdmin');
   
   $this->post('/', \usuarioApi::class . ':CargarUno');
   
 })->add(\MWparaCORS::class . ':HabilitarCORSTodos')->add(\MWparaCORS::class . ':HabilitarCORS8080');


 $app->group('/login', function () {

   $this->post('/', \loginApi::class . ':CrearToken')->add(\MWparaCORS::class . ':HabilitarCORSTodos'); 

 })->add(\MWparaCORS::class . ':HabilitarCORS8080');


 $app->group('/compra', function () {
  
   $this->get('/', \compraApi::class . ':traerFiltrado')->add(\MWparaAutentificar::class . ':VerificarUsuario');
   
   $this->post('/', \compraApi::class . ':CargarUno')->add(\MWparaAutentificar::class . ':VerificarUsuario');
      
 })->add(\MWparaCORS::class . ':HabilitarCORSTodos')->add(\MWparaCORS::class . ':HabilitarCORS8080');



$app->run();