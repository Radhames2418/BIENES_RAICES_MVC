<?php

namespace Controllers;


use MVC\Router;
use Model\Admin;


class LoginController
{

    public static function login(Router $router)
    {

        $auth = new Admin;
        $errores = $auth::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear la instancia
            $auth = new Admin($_POST['auth']);

            // Validamos
            $errores = $auth->validar();


            if (empty($errores)) {

                //Verificar si el usuario exite
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if (!$autenticado) {

                        $errores = Admin::getErrores();
                    } else {

                        $auth->autenticar();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }


    public static function logout()
    {
        session_start();

        $_SESSION = [];

        header('location: /');
    }
}
