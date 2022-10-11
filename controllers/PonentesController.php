<?php

namespace Controllers;

use MVC\Router;

class PonentesController {
    // Principal
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas'
        ]);
    }

    // Crear un Ponente
    public static function crear(Router $router) {
        // Guardamos las alertas
        $alertas = [];

        // Renderizamos la vista
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas
        ]);
    }
}