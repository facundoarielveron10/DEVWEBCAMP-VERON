<?php

namespace Model;

class Hora extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'horas';
    protected static $columnasDB = ['id', 'hora'];

    // Atributos
    public $id;
    public $hora;
}