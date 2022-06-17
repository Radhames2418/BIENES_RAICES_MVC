<?php

namespace Model;


class Admin extends ActiveRecord
{

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];


    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {

        if (!$this->email) {
            self::$errores[] = "El email es obligatorio o no es valido";
        }


        if (!$this->password) {
            self::$errores[] = "El password es obligatorio";
        }

        return self::getErrores();
    }

    public function existeUsuario()
    {
        //Revisar un usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = "Usuario no encontrado";
            return;
        }

        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);


        if (!$autenticado) {
            self::$errores[] = "Contraseña incorrecta";
            return;
        }

        return $autenticado;
    }

    public function autenticar()
    {
        //El usuario esta autenticado
        session_start();

        // Llenar la arreglo de la sesion
        $_SESSION['usuario'] =  $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
