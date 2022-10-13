<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;

class EventosController {
    // Principal
    public static function index(Router $router) {
        // Protegemos la ruta
        if (!isAuth()) {
            header('Location: /login');
        }

        // Renderizamos la vista
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }

    // Crear un evento
    public static function crear(Router $router) {
        // Protegemos la ruta
        if (!isAuth()) {
            header('Location: /login');
        }

        // Guardamos las alertas
        $alertas = [];

        // Nos traemos todas las categorias
        $categorias = Categoria::all();
        // Nos traemos todos los dias
        $dias = Dia::all('ASC');
        // Nos traemos todas las horas
        $horas = Hora::all('ASC');
        
        // Creamos una instancia de evento
        $evento = new Evento();

        // Leemos los datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sincronizamos los datos enviados con el objeto de evento
            $evento->sincronizar($_POST);
            // Validamos los datos
            $alertas = $evento->validar();
            // Si no hubo problemas de validacion
            if (empty($alertas)) {
                $resultado = $evento->guardar();

                // Redireccionamos
                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        // Renderizamos la vista
        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }
}