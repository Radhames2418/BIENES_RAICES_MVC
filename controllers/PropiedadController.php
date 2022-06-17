<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController
{

    public static function index(Router $router)
    {
        $mensaje =  $_GET['mensaje'] ?? null;

        $propieadades = Propiedad::all();
        $vendedores = Vendedores::all();

        $router->render("propiedades/admin", [
            'propiedades' => $propieadades,
            'vendedores' => $vendedores,
            'mensaje' => $mensaje
        ]);
    }

    public static function crear(Router $router)
    {

        $propiedad = new Propiedad;
        $vendedores = Vendedores::all();
        $errores = $propiedad::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $propiedad = new Propiedad($_POST['propiedad']);
            // SUBIR ARCHIVOS

            //Genrar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Setear la imagen
            //Realizar un resize a la imagen con intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }



            //Validar
            $errores = $propiedad->validar();



            if (empty($errores)) {


                //Crear la carpeta
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guardar en la base de datos
                $resultado = $propiedad->guardar();
            }
        }

        $router->render("propiedades/crear", [

            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores

        ]);
    }

    public static function actualizar(Router $router)
    {
        try {
            //Validar el id del formulario
            $id = validarORedireccionar('admin', true);


            // Obtener propiedad;
            $propiedad = Propiedad::find($id);

            // Obtener vendedores
            $vendedores = Vendedores::all();


            // Obtener errores
            $errores = $propiedad::getErrores();

            //Ejecutar el codigo despues que el usuario envia el formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $args =  $_POST['propiedad'];

                $propiedad->sincronizar($args);

                // Validacion del formulario
                $errores = $propiedad->validar();

                //Generar nombre unico de la imagen
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


                //Subida de archivos
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                    $propiedad->setImagen($nombreImagen);
                }

                // Insertar en la base de datos

                if (empty($errores)) {

                    if ($_FILES['propiedad']['tmp_name']['imagen']) {
                        //Almacenar la imagen en el disco duro
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                    /** Subida de archivos  **/
                    $propiedad->guardar();
                }
            }


            $router->render("propiedades/actualizar", [
                'errores' => $errores,
                'propiedad' => $propiedad,
                'vendedores' =>  $vendedores
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                } else {

                    header('Location: /admin?mensaje=5');
                }
            }
        }
    }
}
