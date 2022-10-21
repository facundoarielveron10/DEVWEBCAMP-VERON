<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class PaginasController {
    // Principal
    public static function index(Router $router) {
        // Nos tramos los eventos ordenados por la hora
        $eventos = Evento::ordenar('hora_id', 'ASC');
        
        // Arreglo con todos los eventos formateados por fecha y hora
        $eventos_formateados = [];
        // Recorremos todos los eventos
        foreach($eventos as $evento) {
            // Cruzamos la informacion
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            // CONFERENCIAS
            // Si son Conferencias del dia Viernes
            if ($evento->dia_id === '1' && $evento->categoria_id === '1') {
                $eventos_formateados['conferencias_v'][] = $evento;
            }
            // Si son Conferencias del dia Sabado
            if ($evento->dia_id === '2' && $evento->categoria_id === '1') {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            // WORKSHOPS
            // Si son Workshops del dia Viernes
            if ($evento->dia_id === '1' && $evento->categoria_id === '2') {
                $eventos_formateados['workshops_v'][] = $evento;
            }
            // Si son Workshops del dia Sabado
            if ($evento->dia_id === '2' && $evento->categoria_id === '2') {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // Obtener el total de cada bloque
        $ponentesTotal = Ponente::total();
        $conferenciasTotal = Evento::total('categoria_id', 1);
        $workshopsTotal = Evento::total('categoria_id', 2);

        // Obtener todos los ponentes
        $ponentes = Ponente::all();

        // Renderizamos la vista
        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'eventos' => $eventos_formateados,
            'ponentesTotal' => $ponentesTotal,
            'conferenciasTotal' => $conferenciasTotal,
            'workshopsTotal' => $workshopsTotal,
            'ponentes' => $ponentes
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
        // Nos tramos los eventos ordenados por la hora
        $eventos = Evento::ordenar('hora_id', 'ASC');
        
        // Arreglo con todos los eventos formateados por fecha y hora
        $eventos_formateados = [];
        // Recorremos todos los eventos
        foreach($eventos as $evento) {
            // Cruzamos la informacion
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            // CONFERENCIAS
            // Si son Conferencias del dia Viernes
            if ($evento->dia_id === '1' && $evento->categoria_id === '1') {
                $eventos_formateados['conferencias_v'][] = $evento;
            }
            // Si son Conferencias del dia Sabado
            if ($evento->dia_id === '2' && $evento->categoria_id === '1') {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            // WORKSHOPS
            // Si son Workshops del dia Viernes
            if ($evento->dia_id === '1' && $evento->categoria_id === '2') {
                $eventos_formateados['workshops_v'][] = $evento;
            }
            // Si son Workshops del dia Sabado
            if ($evento->dia_id === '2' && $evento->categoria_id === '2') {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // Renderizamos la vista
        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados
        ]);
    }
}