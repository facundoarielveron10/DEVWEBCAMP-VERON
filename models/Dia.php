<?php

namespace Model;

class Dia extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'dias';
    protected static $columnasDB = ['id', 'nombre'];

    // Atributos
    public $id;
    public $nombre;
}