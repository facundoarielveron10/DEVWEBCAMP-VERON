<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController {
    // Principal
    public static function index(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }

        // Indica la pagina en cual nos encontramos
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        // Indica cuantos registros se van a mostrar por pagina
        $registros_por_pagina = 10;

        // Indica cuantos registros hay en total para calcular las paginas totales
        $total = Evento::total();

        // Creamos una paginacion
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        // Si la pagina actual no existe o es negativa lo redireccionamos
        if (!$pagina_actual || $pagina_actual < 1 || $pagina_actual > $paginacion->totalPaginas()) {
            header('Location: /admin/eventos?page=1');
        }

        // Nos traemos los eventos correspondientes a cada pagina
        $eventos = Evento::paginar($registros_por_pagina, $paginacion->offset());

        // Nos traemos los datos del evento
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }
        // Renderizamos la vista
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    // Crear un evento
    public static function crear(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
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

    // Edita un evento
    public static function editar(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }

        // Guardamos las alertas
        $alertas = [];

        // Leemos el id del evento de la URL
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        // Si no llega a existir ese ID lo redireccionamos
        if (!$id) {
            header('Location: /admin/eventos');
        }

        // Nos traemos todas las categorias
        $categorias = Categoria::all();
        // Nos traemos todos los dias
        $dias = Dia::all('ASC');
        // Nos traemos todas las horas
        $horas = Hora::all('ASC');
        
        // Creamos una instancia de evento
        $evento = Evento::find($id);

        // Si no existe el evento lo redireccionamos
        if (!$evento) {
            header('Location: /admin/eventos');
        }

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
        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    // Eliminar un evento
    public static function eliminar() {
        // Leemos los datos enviados
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAdmin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $evento = Evento::find($id);

            if(!isset($evento)) {
                header('Location: /admin/eventos');
            }

            $resultado = $evento->eliminar();

            if($resultado) {
                header('Location: /admin/eventos');
            }
        }
    }

}