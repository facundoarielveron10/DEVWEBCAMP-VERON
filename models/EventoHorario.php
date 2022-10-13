<?php

namespace Model;

class EventoHorario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'categoria_id', 'dia_id', 'hora_id'];

    // Atributos
    protected $id;
    protected $categoria_id;
    protected $dia_id;
    protected $hora_id;

    // Get y Set
    public function getId() : string {
        return $this->id;
    }
    public function getCategoriaId() : string {
        return $this->categoria_id;
    }
    public function getDiaId() : string {
        return $this->dia_id;
    }
    public function getHoraId() : string {
        return $this->hora_id;
    }
}