<?php

namespace Controllers;

use Model\Regalo;
use Model\Registro;

class APIRegalos{
    // Principal
    public static function index() {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
            return;
        }
        // Nos traemos todos los regalos
        $regalos = Regalo::all();

        // Iteramos en los regalos
        foreach($regalos as $regalo) {
            $regalo->total = Registro::totalArray(['regalo_id' => $regalo->id, 'paquete_id' => '1']);
        }

        echo json_encode($regalos);
        return;
    }
}