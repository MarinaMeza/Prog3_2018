<?php
require_once 'usuario.php';
require_once 'IApiUsable.php';

class loginApi extends Usuario /*implements IApiUsable*/{

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