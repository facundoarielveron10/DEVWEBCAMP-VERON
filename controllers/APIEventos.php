<?php 

namespace Controllers;

use Model\EventoHorario;

class APIEventos {
    // Principal
    public static function index() {
        // Leemos de la URL el dia y la categoria
        $dia_id = $_GET['dia_id'] ?? '';
        $categoria_id = $_GET['categoria_id'] ?? '';

        // Validamos que sea un numero
        $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);
        $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);

        // Si no esta presente el dia o la categoria
        if (!$dia_id || !$categoria_id) {
            // Retornamos un arreglo vacio
            echo json_encode([]);
            return;
        }

        // Consultamos a la Base de Datos
        $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]) ?? [];
        echo json_encode($eventos);
    }
}