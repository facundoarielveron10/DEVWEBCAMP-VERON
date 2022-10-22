<?php

namespace Model;

class Paquete extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'paquetes';
    protected static $columnasDB = ['id', 'nombre'];

    // Atributos
    public $id;
    public $nombre;
}