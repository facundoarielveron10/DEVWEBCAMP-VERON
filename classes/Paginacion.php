<?php

namespace Classes;

class Paginacion {
    // Atributos
    protected $pagina_actual;
    protected $registros_por_pagina;
    protected $total_registros;

    // Constructor
    public function __construct($pagina_actual = 1, $registros_por_pagina = 10, $total_registros = 0) {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registros_por_pagina = (int) $registros_por_pagina;
        $this->total_registros = (int) $total_registros;
    }

    //Metodos
    // Mira en que pagina estamos y en base a eso muestra ciertos registros
    public function offset() : int {
        return $this->registros_por_pagina * ($this->pagina_actual - 1);
    }

    // Calcula el total de las paginas
    public function totalPaginas() : int {
        return ceil($this->total_registros / $this->registros_por_pagina);
    }

    // Nos permite movernos a la pgina anterior
    public function paginaAnterior() {
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    // Nos permite movernos a la pagina siguiente
    public function paginaSiguiente() {
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->totalPaginas()) ? $siguiente : false;
    }

    // Muestra el enlace anterior
    public function enlaceAnterior() {
        $html = '';
        if($this->paginaAnterior()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaAnterior()}\">&laquo Anterior</a>";
        }
        return $html;
    }

    // Muestra el enlace siguiente
    public function enlaceSiguiente() {
        $html = '';
        if($this->paginaSiguiente()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaSiguiente()}\">Siguiente &raquo</a>";
        }
        return $html;
    }

    // Muestra los numeros de las paginas
    public function numerosPaginas() {
        $html = '';
        for ($i=1; $i <= $this->totalPaginas(); $i++) {
            if ($i === $this->pagina_actual) {
                if ($this->pagina_actual === 1) {
                    $html .= "<span class=\"paginacion__enlace paginacion__enlace--primero\">&laquo Anterior</span>";
                }
                $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual\">{$i}</span>";
                if ($this->pagina_actual === $this->totalPaginas()) {
                    $html .= "<span class=\"paginacion__enlace paginacion__enlace--ultimo\">Siguiente &raquo</span>";
                }
            } else {
                $html .= "<a class=\"paginacion__enlace paginacion__enlace--numero\" href=\"?page={$i}\">{$i}</a>";
            }
        }
        return $html;
    }

    // Muestra la paginacion
    public function paginacion() {
        $html = '';
        if($this->total_registros > 1) {
            $html .= '<div class="paginacion">';
            $html .= $this->enlaceAnterior();
            $html .= $this->numerosPaginas();
            $html .= $this->enlaceSiguiente();
            $html .= '</div>';
        }
        return $html;
    }
}