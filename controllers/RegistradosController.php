<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistradosController {
    public static function index(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
            return;
        }

        // Indica la pagina en cual nos encontramos
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        // Indica cuantos registros se van a mostrar por pagina
        $registros_por_pagina = 10;

        // Indica cuantos registros hay en total para calcular las paginas totales
        $total = Registro::total();

        // Creamos una paginacion
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        // Si la pagina actual no existe o es negativa lo redireccionamos
        if(!$pagina_actual || $pagina_actual < 1 || $pagina_actual > $paginacion->totalPaginas()) {
            header('Location: /admin/registrados?page=1');
        }

        // Paginamos los datos
        $registrados = Registro::paginar($registros_por_pagina, $paginacion->offset());
        
        // Cruzamos las informaciones de las tables
        foreach($registrados as $registrado) {
            $registrado->usuario = Usuario::find($registrado->usuario_id);
            $registrado->paquete = Paquete::find($registrado->paquete_id);
        }
        
        // Renderizamos la vista
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
            'registrados' => $registrados,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
}