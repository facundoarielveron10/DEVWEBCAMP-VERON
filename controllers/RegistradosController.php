<?php

namespace Controllers;

use MVC\Router;

class RegistradosController {
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados'
        ]);
    }
}