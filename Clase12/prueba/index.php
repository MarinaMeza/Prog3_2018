<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require __DIR__.'/vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/mediaApi.php';
require_once './clases/UsuarioApi.php';
require_once './clases/AutentificadorJWT.php';
require_once './clases/MWparaCORS.php';
require_once './clases/MWparaAutentificar.php';

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
$app->group('/media', function () {
 
  $this->get('/', \mediaApi::class . ':traerTodos')->add(\MWparaCORS::class . ':HabilitarCORSTodos');

  $this->get('/F', \mediaApi::class . ':traerTodosFiltrado')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
 
  $this->get('/{id}', \mediaApi::class . ':traerUno')->add(\MWparaCORS::class . ':HabilitarCORSTodos');

  $this->post('/', \mediaApi::class . ':CargarUno');

  $this->delete('/', \mediaApi::class . ':BorrarUno')->add(\MWparaAutentificar::class . ':VerificarUsuario');

  $this->put('/', \mediaApi::class . ':ModificarUno');
     
})->add(\MWparaCORS::class . ':HabilitarCORS8080');

$app->group('/usuario', function () {
 
  $this->get('/', \usuarioApi::class . ':traerTodos')->add(\MWparaAutentificar::class . ':VerificarUsuario')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
  
  $this->get('/{id}', \usuarioApi::class . ':traerUno')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
  
  $this->post('/', \usuarioApi::class . ':CargarUno');
  
  $this->post('/login', \usuarioApi::class . ':CrearToken')->add(\MWparaCORS::class . ':HabilitarCORSTodos'); 

  $this->delete('/', \usuarioApi::class . ':BorrarUno');

  $this->put('/', \usuarioApi::class . ':ModificarUno');
     
})->add(\MWparaCORS::class . ':HabilitarCORS8080');


$app->run();