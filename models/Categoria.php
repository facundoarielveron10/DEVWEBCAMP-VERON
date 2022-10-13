<?php

namespace Model;

class Categoria extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'categorias';
    protected static $columnasDB = ['id', 'nombre'];

    // Atributos
    protected $id;
    protected $nombre;

    // Metodos
    // Get y Set
    public function getId() : string {
        return $this->id;
    }
    public function getNombre() : string {
        return $this->nombre;
    }
}