<?php


namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }




    public function comprobarRutas()
    {
        session_start();

        // Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/propiedades/eliminar'];


        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger la rutas
        if (in_array($urlActual, $rutas_protegidas) ) {
            if (!$_SESSION['login']) {
                header('Location: /');
            }
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "<h1>ERROR 404 </h1>";
        }
    }

    // Muestra una vista
    public function render($view, $datos = [])
    {

        ob_start();

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        include_once __DIR__ . "/view/${view}.php";

        $contenido = ob_get_clean();

        include_once __DIR__ . "/view/layout.php";
    }
}
