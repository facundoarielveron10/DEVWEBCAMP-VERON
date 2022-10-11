<?php

namespace Controllers;

use MVC\Router;

class RegalosController {
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('admin/regalos/index', [
            'titulo' => 'Regalos'
        ]);
    }
}