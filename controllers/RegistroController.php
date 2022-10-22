<?php

namespace Controllers;

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
}