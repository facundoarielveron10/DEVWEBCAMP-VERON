<?php

namespace Controllers;

use Classes\Email;
use Models\Usuario;
use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administracion'
        ]);
    }
}