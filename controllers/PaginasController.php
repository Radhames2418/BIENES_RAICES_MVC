<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class PaginasController
{

    public static function index(Router $router)
    {

        $propiedades  = Propiedad::all(true);

        $inicio = true;

        $router->render('paginas/index', [
            'inicio' => $inicio,
            'propiedades' => $propiedades
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('paginas/nosotros', []);
    }

    public static function anuncios(Router $router)
    {
        $propiedades  = Propiedad::all(false);

        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {
        //Validar el id del formulario
        $id = validarORedireccionar('anuncios', false);


        // Obtener propiedad;
        $propiedad = Propiedad::find($id);


        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuesta = $_POST['contacto'];
            $mail = new PHPMailer();

            try {

                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.mailtrap.io';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'f30bcc3bcdff96';
                $mail->Password   = '40fd5e65e5b7e3';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 2525;

                //Recipients
                $mail->setFrom('admin@bienesraices.com');
                $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
                $mail->Subject = 'Tienes un nuevo mensaje';

                //Content
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                //Body of email
                $contenido = "<html>";
                $contenido .= "<p> Tienes un nuevo mensaje </p>";
                $contenido .= "<p>Nombre: " . $respuesta['nombre'] . "</p>";
                if (isset($respuesta['email'])) {
                    $contenido .= "<p>Email :" . $respuesta['email']  . "</p>";
                }
                if (isset($respuesta['telefono'])) {
                    $contenido .= "<p>Telefono: " . $respuesta['telefono'] . "</p>";
                }
                $contenido .= "<p>Mensaje: " . $respuesta['mensaje']  . "</p>";
                if (isset($respuesta['tipo'])) {
                    $contenido .= "<p>Telefono: " . $respuesta['tipo'] . "</p>";
                }
                $contenido .= "<p>Precio o Presupuesto $:" . $respuesta['precio']  . "</p>";

                if (isset($respuesta['contacto'])) {
                    $contenido .= "<p>Fecha Contacto: " .  $respuesta['contacto']   . "</p>";
                }

                if (isset($respuesta['fecha'])) {
                    $contenido .= "<p>Fecha Contacto: " . $respuesta['fecha'] . "</p>";
                }
                if (isset($respuesta['hora'])) {
                    $contenido .= "<p>Hora: " . $respuesta['hora'] . "</p>";
                }
                $contenido .= "</html>";

                $mail->Body    = $contenido;
                $mail->AltBody = $contenido;

                $mail->send();
                $mensaje = 'Enviado Correctamente';
            } catch (Exception $e) {
                $mensaje = "No fue enviado correctamente ";
            }
        }


        $router->render('paginas/contacto', [
            'mensaje' =>  $mensaje
        ]);
    }
}
