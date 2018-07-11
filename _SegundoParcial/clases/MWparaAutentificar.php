<?php

require_once "AutentificadorJWT.php";
class MWparaAutentificar {
 /**
   * @api {any} /MWparaAutenticar/  Verificar Usuario
   * @apiVersion 0.1.0
   * @apiName VerificarUsuario
   * @apiGroup MIDDLEWARE
   * @apiDescription  Por medio de este MiddleWare verifico las credeciales antes de ingresar al correspondiente metodo 
   *
   * @apiParam {ServerRequestInterface} request  El objeto REQUEST.
   * @apiParam {ResponseInterface} response El objeto RESPONSE.
   * @apiParam {Callable} next  The next middleware callable.
   *
   * @apiExample Como usarlo:
   *    ->add(\MWparaAutenticar::class . ':VerificarUsuario')
   */
	public function VerificarUsuario($request, $response, $next) {
         
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->respuesta="";
	   
		if($request->isGet()) {
			//$response->getBody()->write('<p>NO necesita credenciales para los get </p>');
			$response = $next($request, $response);
		} else {
			$objDelaRespuesta->esValido = true;
			try {
				$token = $request->getHeader('token')[0];
				AutentificadorJWT::verificarToken($token);
				$objDelaRespuesta->esValido = true; 
			}
			catch (Exception $e) {
				//guardar en un log
				$objDelaRespuesta->excepcion = $e->getMessage();
				$objDelaRespuesta->esValido = false;
			}

			if($objDelaRespuesta->esValido) {
				if($request->isGet()) {
					// el post sirve para todos los logeados
					$response = $next($request, $response);
				}else {
					$payload=AutentificadorJWT::ObtenerData($token);
					//var_dump($payload);
					// DELETE,PUT y DELETE sirve para todos los logeados y admin
					if($payload->nombre=="admin" || $payload->nombre == "usuario" || $payload->nombre == "prueba") {
						$response = $next($request, $response);
					}else {	
						$objDelaRespuesta->respuesta="Solo administradores";
					}
				}
			}else {
				//$response->getBody()->write('<p>no tenes habilitado el ingreso</p>');
				$objDelaRespuesta->respuesta="Solo usuarios registrados";
				$objDelaRespuesta->elToken=$token;
			}
		}
		if($objDelaRespuesta->respuesta!="") {
			$nueva=$response->withJson($objDelaRespuesta, 401);
			return $nueva;
		}
		
		 //$response->getBody()->write('<p>vuelvo del verificador de credenciales</p>');
		return $response;
	}

	public function VerificarUsuarioAdmin($request, $response, $next) {
         
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->respuesta="";
	   
		if($request->isPost()) {
			//$response->getBody()->write('<p>NO necesita credenciales para los get </p>');
			$response = $next($request, $response);
		} else {
			$objDelaRespuesta->esValido = true;
			try {
				$token = $request->getHeader('token')[0];
				AutentificadorJWT::verificarToken($token);
				$objDelaRespuesta->esValido = true; 
			}
			catch (Exception $e) {
				//guardar en un log
				$objDelaRespuesta->excepcion = $e->getMessage();
				$objDelaRespuesta->esValido = false;
			}

			if($objDelaRespuesta->esValido) {
				if($request->isPost()) {
					// el post sirve para todos los logeados
					$response = $next($request, $response);
				}else {
					$payload=AutentificadorJWT::ObtenerData($token);
					//var_dump($payload->nombre);
					// DELETE,PUT y DELETE sirve para todos los logeados y admin
					if($payload->nombre=="admin") {
						$response = $next($request, $response);
					}else {	
						$objDelaRespuesta->respuesta="Hola";
					}
				}
			}else {
				//$response->getBody()->write('<p>no tenes habilitado el ingreso</p>');
				$objDelaRespuesta->respuesta="Solo usuarios registrados";
				$objDelaRespuesta->elToken=$token;
			}
		}
		if($objDelaRespuesta->respuesta!="") {
			$nueva=$response->withJson($objDelaRespuesta, 401);
			return $nueva;
		}
		 //$response->getBody()->write('<p>vuelvo del verificador de credenciales</p>');
		 return $response;
	}

	public function RetornaUsuario($request, $response, $next) {
		
	   $objDelaRespuesta= new stdclass();
	   $objDelaRespuesta->respuesta="";
	  
	   if($request->isGet()) {
		   //$response->getBody()->write('<p>NO necesita credenciales para los get </p>');
		   $response = $next($request, $response);
	   } else {
		   $objDelaRespuesta->esValido = true;
		   try {
			   $token = $request->getHeader('token')[0];
			   AutentificadorJWT::verificarToken($token);
			   $objDelaRespuesta->esValido = true; 
		   }
		   catch (Exception $e) {
			   //guardar en un log
			   $objDelaRespuesta->excepcion = $e->getMessage();
			   $objDelaRespuesta->esValido = false;
		   }

		   if($objDelaRespuesta->esValido) {
			   if($request->isGet()) {
				   // el post sirve para todos los logeados
				   $response = $next($request, $response);
			   }else {
				   $payload=AutentificadorJWT::ObtenerData($token);
				   //var_dump($payload);
				   // DELETE,PUT y DELETE sirve para todos los logeados y admin
				   if($payload->nombre=="admin" || $payload->nombre == "usuario" || $payload->nombre == "prueba") {
					   $response = $next($request, $response);
					   return $payload->nombre;
				   }else {	
					   $objDelaRespuesta->respuesta="Solo administradores";
				   }
			   }
		   }else {
			   //$response->getBody()->write('<p>no tenes habilitado el ingreso</p>');
			   $objDelaRespuesta->respuesta="Solo usuarios registrados";
			   $objDelaRespuesta->elToken=$token;
		   }
	   }
	   if($objDelaRespuesta->respuesta!="") {
		   $nueva=$response->withJson($objDelaRespuesta, 401);
		   return $nueva;
	   }
	   
		//$response->getBody()->write('<p>vuelvo del verificador de credenciales</p>');
	   return $response;
   }
}