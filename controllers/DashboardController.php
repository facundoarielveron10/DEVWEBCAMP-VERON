<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        // Protegemos la URL
        if (!isAdmin()) {
            header('Location: /login');
        }

        // Renderizamos la vista
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administracion'
        ]);
    }
}