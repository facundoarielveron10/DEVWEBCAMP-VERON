<?php

namespace Controllers;

use MVC\Router;

class RegalosController {
    public static function index(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }

        // Renderizamos la vista
        $router->render('admin/regalos/index', [
            'titulo' => 'Regalos'
        ]);
    }
}