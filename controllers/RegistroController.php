<?php

namespace Controllers;

use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistroController {
    // Creamos el un registro
    public static function crear(Router $router) {
        // Protegemos la ruta
        if(!isAuth()) {
            header('Location: /login');
        }
        
        // Renderizamos la vista
        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    // Inscripcion al boleto gratis
    public static function gratis() {
        // Leemos los datos
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAuth()) {
                header('Location: /login');
            }

            // Creamos un token unico para el registro
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            
            // Asignamos los datos del registro
            $datos = [
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];
            
            // Creamos el registro
            $registro = new Registro($datos);
            
            // Almacenamos el registro en la Base de Datos
            $resultado = $registro->guardar();

            // Redireccionamos
            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }
        }
    }

    // Creamos el un boleto virtual
    public static function boleto(Router $router) {
        // Protegemos la ruta
        if(!isAuth()) {
            header('Location: /login');
        }
        
        // Validar la URL
        $id = $_GET['id'];
        // Buscar el id en la Base de Datos
        $registro = Registro::where('token', $id);

        // Si el id no existe o el id es menor a 8 caracteres o no existe el registro redireccionamos a inicio
        if (!$id || !strlen($id) === 8 || !$registro) {
            header('Location: /');
        }

        // Llenar las tablas de referencias
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        // Renderizamos la vista
        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }
}