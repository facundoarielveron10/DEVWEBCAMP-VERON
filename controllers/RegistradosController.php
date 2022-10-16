<?php

namespace Controllers;

use MVC\Router;

class RegistradosController {
    public static function index(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }
        
        // Renderizamos la vista
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados'
        ]);
    }
}