<?php

namespace Model;

class Evento extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'disponibles', 'categoria_id', 'dia_id', 'hora_id', 'ponente_id'];

    // Atributos
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $disponibles;
    protected $categoria_id;
    protected $dia_id;
    protected $hora_id;
    protected $ponente_id;

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->dia_id = $args['dia_id'] ?? '';
        $this->hora_id = $args['hora_id'] ?? '';
        $this->ponente_id = $args['ponente_id'] ?? '';
    }

    // Metodos
    // Mensajes de validación para la creación de un evento
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatoria';
        }
        if(!$this->categoria_id  || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige una Categoría';
        }
        if(!$this->dia_id  || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige el Día del evento';
        }
        if(!$this->hora_id  || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige la hora del evento';
        }
        if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Añade una cantidad de Lugares Disponibles';
        }
        if(!$this->ponente_id || !filter_var($this->ponente_id, FILTER_VALIDATE_INT) ) {
            self::$alertas['error'][] = 'Selecciona la persona encargada del evento';
        }

        return self::$alertas;
    }

    // Get y Set
    public function getId() : string {
        return $this->id;
    }
    public function getNombre() : string {
        return $this->nombre;
    }
    public function getDescripcion() : string {
        return $this->descripcion;
    }
    public function getDisponibles() : string {
        return $this->disponibles;
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
    public function getPonenteId() : string {
        return $this->ponente_id;
    }
}