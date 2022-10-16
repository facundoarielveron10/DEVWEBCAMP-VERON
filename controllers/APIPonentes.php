<?php

namespace Controllers;

use Model\Ponente;

class APIPonentes {
    // Principal
    public static function index() {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }

        $ponentes = Ponente::all();
        echo json_encode($ponentes);
    }

    // Nos traemos el ponente asociado al id de la URL
    public static function ponente() {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }
        
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            echo json_encode([]);
            return;
        }

        $ponente = Ponente::find($id);
        echo json_encode($ponente, JSON_UNESCAPED_SLASHES);
    }
}