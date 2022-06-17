<?php

define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {

        header('Location: /bienesraices_inicio/');
    }
}

function debugear($objeto)
{
    echo "<pre>";
    var_dump($objeto);
    echo "</pre>";
    exit;
}

//Escapar el HTML
function s($html)
{
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de Contenido
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

function validarORedireccionar($url, $mensaje)
{
    //Validar el id del formulario
    $id = $_GET['id'] ?? NULL;
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($mensaje) {
        if (!$id) {
            header("Location: /${url}?mensaje=3");
        }
    } else {
        if (!$id) {
            header("Location: /${url}");
        }
    }

    return $id;
}
