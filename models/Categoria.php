<?php

namespace Model;

class Categoria extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'categorias';
    protected static $columnasDB = ['id', 'nombre'];

    // Atributos
    public $id;
    public $nombre;
}