<?php

namespace Model;

class EventoRegistro extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'eventos_registros';
    protected static $columnasDB = ['id', 'evento_id', 'registro_id'];

    // Atributos
    public $id;
    public $evento_id;
    public $registro_id;

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->evento_id = $args['evento_id'] ?? '';
        $this->registro_id = $args['registro_id'] ?? '';
    }
}