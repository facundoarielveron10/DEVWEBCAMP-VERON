<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function paginaActual($path) : bool {
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path ) ? true : false;
}

function isAuth() : bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function isAdmin() : bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

function aos_animacion() : void {
    $efectos = ['fade-up', 'fade-down', 'fade-right', 'fade-left', 'flip-left', 'flip-up', 'zoom-in', 'zoom-in-up', 'fade-down-left', 'fade-down-right'];
    $efecto = array_rand($efectos, 1);
    echo ($efectos[$efecto]);
}