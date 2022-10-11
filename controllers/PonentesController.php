<?php

namespace Controllers;

use MVC\Router;

class PonentesController {
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas'
        ]);
    }
}