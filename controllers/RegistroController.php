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

        // Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);
        
        // Si el usuario ya esta registrado
        if (isset($registro) && $registro->paquete_id === "3") {
            header('Location: /boleto?id=' . urlencode($registro->token));
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

            // Verificar si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            
            // Si el usuario ya esta registrado
            if (isset($registro) && $registro->paquete_id === "3") {
                header('Location: /boleto?id=' . urlencode($registro->token));
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

    // Inscripcion al boleto gratis
    public static function pagar() {
        // Leemos los datos
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAuth()) {
                header('Location: /login');
            }

            // Validar que Post no venga vacio
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }
            
            // Asignamos los datos del registro
            $datos = $_POST;
            $datos['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];

            try {
                // Creamos el registro
                $registro = new Registro($datos);
                
                // Almacenamos el registro en la Base de Datos
                $resultado = $registro->guardar();

                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error'
                ]);
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

    // Cancelamos la inscripcion
    public static function cancelar() {
        // Leemos los datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAuth()) {
                header('Location: /login');
            }

            // Buscamos el registro a eliminar
            $registro = Registro::where('usuario_id' ,$_SESSION['id']);

            // Si el registro no exite
            if (isset($registro)) {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }

            // Eliminamos el registro
            $resultado = $registro->eliminar();

            // Redireccionamos
            if ($resultado) {
                header('Location: /finalizar-registro');
            } else {
                header('Location: /404');
            }
        }
    }
}