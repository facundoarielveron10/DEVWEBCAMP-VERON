<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Evento;

class PonentesController {
    // Principal
    public static function index(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }

        // Indica la pagina en cual nos encontramos
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        // Indica cuantos registros se van a mostrar por pagina
        $registros_por_pagina = 10;

        // Indica cuantos registros hay en total para calcular las paginas totales
        $total = Ponente::total();

        // Creamos una paginacion
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        // Si la pagina actual no existe o es negativa lo redireccionamos
        if(!$pagina_actual || $pagina_actual < 1 || $pagina_actual > $paginacion->totalPaginas()) {
            header('Location: /admin/ponentes?page=1');
        }

        // Nos traemos los ponentes ponentes correspondientes a cada pagina
        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());

        // Renderizamos la vista
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    // Crear un Ponente
    public static function crear(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }

        // Guardamos las alertas
        $alertas = [];

        // Creamos un Ponente
        $ponente = new Ponente;

        // Leemos los datos enviados por el usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                // Especificamos donde se van a guardar las imagenes
                $carpeta_imagenes = '../public/img/speakers';

                // Crea la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                // Creamos las imagenes en formato PNG y WEBP
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);
            
                // Le asignamos un nombre unico a la imagen
                $nombre_imagen = md5(uniqid(rand(), true));

                // Guardamos la imagen
                $_POST['imagen'] = $nombre_imagen;
            }

            // Formateamos las redes
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            // Sincronizamos el modelo de ponentes con los datos enviados
            $ponente->sincronizar($_POST);

            // Validamos los datos
            $alertas = $ponente->validar();

            // Si no hubo problemas de validacion
            if(empty($alertas)) {
                // Guardamos las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                // Guardamos en la Base de Datos
                $resultado = $ponente->guardar();

                // Reedirecionamos
                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        
        // Volvemos a hacer un arreglo con las redes
        $redes = json_decode($ponente->redes);

        // Renderizamos la vista
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => $redes
        ]);
    }

    // Editar un ponente
    public static function editar(Router $router) {
        // Protegemos la ruta
        if(!isAdmin()) {
            header('Location: /login');
        }
        
        // Guardamos las alertas
        $alertas = [];
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        // Si no es un ID valido redireccionamos al usuario
        if (!$id) {
            header('Location: /admin/ponentes');
        }

        // Obtener ponente a Editar
        $ponente = Ponente::find($id);

        // Si no hay un Ponente
        if (!$ponente) {
            header('Location: /admin/ponentes');
        }

        // Mostramos la imagen actual del ponente
        $ponente->imagen_actual = $ponente->imagen;

        // Volvemos a hacer un arreglo con las redes
        $redes = json_decode($ponente->redes);

        // Leemos los datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                // Especificamos donde se van a guardar las imagenes
                $carpeta_imagenes = '../public/img/speakers';

                // Crea la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                // Creamos las imagenes en formato PNG y WEBP
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);
            
                // Le asignamos un nombre unico a la imagen
                $nombre_imagen = md5(uniqid(rand(), true));

                // Guardamos la imagen
                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }
            
            // Formateamos las redes
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            // Sincronizamos el ponente con los nuevos datos
            $ponente->sincronizar($_POST);

            // Validamos los datos
            $alertas = $ponente->validar();

            // Si no hubo problemas de validacion
            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    // Guardamos las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }

                // Guardamos los datos en la Base de Datos
                $resultado = $ponente->guardar();

                // Redireccionamos
                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        // Renderizamos la vista
        $router->render('admin/ponentes/editar', [
            'titulo' => 'Actualizar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => $redes
        ]);
    }

    // Eliminar un ponente
    public static function eliminar() {
        // Leemos los datos enviados
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAdmin()) {
                header('Location: /login');
            }
            
            // Buscamos el ponente por el id
            $id = $_POST['id'];
            $ponente = Ponente::find($id);

            // Nos traemos todos los eventos
            $eventos = Evento::all();

            // Si no exite el ponente redireccionamos
            if(!isset($ponente)) {
                header('Location: /admin/ponentes');
            }


            // Eliminamos los eventos relacionados con ese ponente
            if($eventos) {
                foreach($eventos as $evento) {
                    if ($evento->ponente_id === $ponente->id) {
                        $evento->eliminar();
                    }
                }
            }
            // Eliminamos el ponente
            $resultado = $ponente->eliminar();

            if($resultado) {
                header('Location: /admin/ponentes');
            }
        }
    }
}