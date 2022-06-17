<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedores;


class VendedoresController
{
    public static function crear(Router $router)
    {
        $vendedor = new Vendedores;
        $errores = Vendedores::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear una nueva instancia
            $vendedor = new Vendedores($_POST['vendedor']);

            // Validar
            $errores = $vendedor->validar();

            //No hay errores
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }


        $router->render("vendedores/crear", [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        try {
            //Validar el id del formulario
            $id = validarORedireccionar('admin', true);

            $vendedor = Vendedores::find($id);

            // Obtener errores
            $errores = $vendedor::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                //Asignar los valores
                $args = $_POST['vendedor'];

                //Sincronizar objeto en memoria
                $vendedor->sincronizar($args);

                $errores = $vendedor->validar();

                if (empty($errores)) {
                    $vendedor->guardar();
                }
            }


            $router->render("vendedores/actualizar", [
                'vendedor' => $vendedor,
                'errores' => $errores
            ]);
        } catch (\Throwable $th) {
            header('Location: /admin?mensaje=3');

        }
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? NULL;
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedores::find($id);
                    $vendedor->eliminar();
                } else {

                    header('Location: /admin?mensaje=5');
                }
            }
        }
    }
}
