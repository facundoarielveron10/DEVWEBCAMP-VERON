<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Hora;
use MVC\Router;

class EventosController {
    // Principal
    public static function index(Router $router) {
        // Renderizamos la vista
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }

    // Crear un evento
    public static function crear(Router $router) {
        // Guardamos las alertas
        $alertas = [];

        // Nos traemos todas las categorias
        $categorias = Categoria::all();
        // Nos traemos todos los dias
        $dias = Dia::all('ASC');
        // Nos traemos todas las horas
        $horas = Hora::all('ASC');

        // Renderizamos la vista
        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas
        ]);
    }
}