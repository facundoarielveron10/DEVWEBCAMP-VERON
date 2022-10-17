<?php

namespace Controllers;

use MVC\Router;

class PaginasController {
    // Principal
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }

    // Informacion de lo relacionado al proyecto
    public static function evento(Router $router) {
        // Renderizamos la vista
        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }

    // Los paquetes que se ofrecen
    public static function paquetes(Router $router) {
        // Renderizamos la vista
        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes DevWebCamp'
        ]);
    }

    // Todos las Conferencias y Workshops
    public static function conferencias(Router $router) {
        // Renderizamos la vista
        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops'
        ]);
    }
}