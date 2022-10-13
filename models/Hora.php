<?php

namespace Model;

class Hora extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'horas';
    protected static $columnasDB = ['id', 'hora'];

    // Atributos
    protected $id;
    protected $hora;

    // Metodos
    // Get y Set
    public function getId() : string {
        return $this->id;
    }
    public function getHora() : string {
        return $this->hora;
    }
}