<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();

        if (isset($_SERVER['PATH_INFO'])) {
            $currentUrl = $_SERVER["PATH_INFO"] ?? "/";
        } else {
            $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        }
        
        $method = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $currentUrl);

        if ($method === 'GET') {
            $fn = $this->getRoutes[$splitURL[0]] ?? null;
        } else {
            $fn = $this->postRoutes[$splitURL[0]] ?? null;
        }

        if ( $fn ) {
            call_user_func($fn, $this);
        } else {
            header('Location: /404');
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value; 
        }

        ob_start(); 

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el layout de acuerdo a la URL
        if (isset($_SERVER['PATH_INFO'])) {
            $url_actual = $_SERVER["PATH_INFO"] ?? "/";
        } else {
            $url_actual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        }
        
        if(str_contains($url_actual, '/admin')) {
            include_once __DIR__ . '/views/admin-layout.php';
        } else {
            include_once __DIR__ . '/views/layout.php';   
        }
    }
}
