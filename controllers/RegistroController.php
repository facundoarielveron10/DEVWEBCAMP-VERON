<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\EventoRegistro;
use Model\Hora;
use Model\Paquete;
use Model\Ponente;
use Model\Regalo;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistroController {
    // Creamos el un registro
    public static function crear(Router $router) {
        // Protegemos la ruta
        if(!isAuth()) {
            header('Location: /login');
            return;
        }

        // Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);
        
        // Si el usuario ya esta registrado y tiene pago virtual o es gratis
        if (isset($registro) && ($registro->paquete_id === "3" || $registro->paquete_id === "2")) {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;
        }

        // Si el usuario ya pago
        if(isset($registro) && $registro->paquete_id === '1') {
            header('Location: /finalizar-registro/conferencias');
            return;
        }
        
        // Renderizamos la vista
        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    // Inscripcion al boleto gratis
    public static function gratis() {
        // Leemos los datos
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAuth()) {
                header('Location: /login');
                return;
            }

            // Verificar si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            
            // Si el usuario ya esta registrado
            if (isset($registro) && $registro->paquete_id === "3") {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }

            // Creamos un token unico para el registro
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            
            // Asignamos los datos del registro
            $datos = [
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];
            
            // Creamos el registro
            $registro = new Registro($datos);
            
            // Almacenamos el registro en la Base de Datos
            $resultado = $registro->guardar();

            // Redireccionamos
            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }
        }
    }

    // Inscripcion al boleto presencial
    public static function pagar() {
        // Leemos los datos
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAuth()) {
                header('Location: /login');
                return;
            }

            // Validar que Post no venga vacio
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }
            
            // Asignamos los datos del registro
            $datos = $_POST;
            $datos['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];

            try {
                // Creamos el registro
                $registro = new Registro($datos);
                
                // Almacenamos el registro en la Base de Datos
                $resultado = $registro->guardar();

                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error'
                ]);
            }
        }
    }

    // Seleccionamiento de conferencias
    public static function conferencias(Router $router) {
        // Protegemos la ruta
        if(!isAuth()) {
            header('Location: /login');
            return;
        }

        // Validar que el usuario tenga el plan presencial
        $usuario_id = $_SESSION['id'];
        $registro = Registro::where('usuario_id', $usuario_id);

        // Si no es el plan presencial redireccionamos
        if (isset($registro) && $registro->paquete_id === '2') {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;
        }

        // Si no es el plan presencial, redireccionamos
        if($registro->paquete_id !== '1') {
            header('Location: /');
            return;
        }

        // Redireccionamos a boleto virtual en caso de haber finalizado su registro
        if($registro->registro === '1' && $registro->paquete_id === '1') {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;
        }

        // Nos tramos los eventos ordenados por la hora
        $eventos = Evento::ordenar('hora_id', 'ASC');

        // Arreglo con todos los eventos formateados por fecha y hora
        $eventos_formateados = [];
        // Recorremos todos los eventos
        foreach($eventos as $evento) {
            // Cruzamos la informacion
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            // CONFERENCIAS
            // Si son Conferencias del dia Viernes
            if ($evento->dia_id === '1' && $evento->categoria_id === '1') {
                $eventos_formateados['conferencias_v'][] = $evento;
            }
            // Si son Conferencias del dia Sabado
            if ($evento->dia_id === '2' && $evento->categoria_id === '1') {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            // WORKSHOPS
            // Si son Workshops del dia Viernes
            if ($evento->dia_id === '1' && $evento->categoria_id === '2') {
                $eventos_formateados['workshops_v'][] = $evento;
            }
            // Si son Workshops del dia Sabado
            if ($evento->dia_id === '2' && $evento->categoria_id === '2') {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // Nos traemos todos los regalos
        $regalos = Regalo::all('ASC');

        // Manejando el registro mediante $_POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Revisar que el usuario este autenticado
            if(!isAuth()) {
                header('Location: /login');
                return;
            }

            // Separamos los eventos del arreglo
            $eventos = explode(',', $_POST['eventos']);
            
            // Si de alguna manera no hay eventos
            if (empty($eventos)) {
                echo json_encode(['resultado' => false]);
                return;
            }
            
            // Obtener el registro del usuario
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            
            // Si no exite el registro o el registro no es el Presencial
            if (!isset($registro) || $registro->paquete_id !== '1') {
                echo json_encode(['resultado' => false]);
                return;
            }
            
            // Arreglo de ayuda, para ir guardando los eventos registrados
            $eventos_array = [];
            // Validar la disponibilidad de los eventos seleccionados
            foreach($eventos as $evento_id) {
                // Nos traemos los eventos seleccionados
                $evento = Evento::find($evento_id);
                
                // Comprobar que el evento exista
                if (!isset($evento) || $evento->disponibles === '0') {
                    echo json_encode(['resultado' => false]);
                    return;
                }

                // Guardamos en el arreglo de ayuda el evento
                $eventos_array[] = $evento;
            }

            foreach($eventos_array as $evento) {
                // Le restamos uno a la disponibilidad
                $evento->disponibles -= 1;
                // Guardamos en base de datos el evento
                $evento->guardar();
                
                // Almacenar el registro
                $datos = [
                    'evento_id' => (int) $evento->id,
                    'registro_id' => (int) $registro->id
                ];
                
                // Instanciamos un registro con su evento
                $registro_usuario = new EventoRegistro($datos);
                // Guardamos en la base de datos
                $registro_usuario->guardar();
            }

            // Almacenar el regalo
            $registro->sincronizar(['regalo_id' => $_POST['regalo_id']]);
            // Confirmamos que finalizo el registro
            $registro->registro = '1';
            $resultado = $registro->guardar();

            // Si no hubo problemas en la validaciones
            if ($resultado) {
                echo json_encode([
                    'resultado' => $resultado, 
                    'token' => $registro->token
                ]);
            } else {
                echo json_encode(['resultado' => false]);
            }

            return;
        }

        // Renderizamos la vista
        $router->render('registro/conferencias', [
            'titulo' => 'Elige Workshops y Conferencias',
            'eventos' => $eventos_formateados,
            'regalos' => $regalos
        ]);
    }

    // Creamos el un boleto virtual
    public static function boleto(Router $router) {
        // Protegemos la ruta
        if(!isAuth()) {
            header('Location: /login');
            return;
        }
        
        // Validar la URL
        $id = $_GET['id'];
        // Buscar el id en la Base de Datos
        $registro = Registro::where('token', $id);

        // Si el id no existe o el id es menor a 8 caracteres o no existe el registro redireccionamos a inicio
        if (!$id || !strlen($id) === 8 || !$registro) {
            header('Location: /');
            return;
        }

        // Llenar las tablas de referencias
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        // Renderizamos la vista
        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }

    // Cancelamos la inscripcion
    public static function cancelar() {
        // Leemos los datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protegemos la ruta
            if(!isAuth()) {
                header('Location: /login');
                return;
            }

            // Buscamos el registro a eliminar
            $registro = Registro::where('usuario_id' ,$_SESSION['id']);

            // Si el registro no exite
            if (isset($registro)) {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }

            // Eliminamos el registro
            $resultado = $registro->eliminar();

            // Redireccionamos
            if ($resultado) {
                header('Location: /finalizar-registro');
                return;
            } else {
                header('Location: /404');
                return;
            }
        }
    }
}