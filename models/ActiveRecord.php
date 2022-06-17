<?php

namespace Model;

class ActiveRecord
{
    //Base DE DATOS
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';


    //Errores
    protected static $errores = [];

    //Definir la conexion a la BD
    public static function setBD($database)
    {
        self::$db = $database;
    }

    // Metodo guardar
    public function guardar()
    {
        if (!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Crear
            $this->crear();
        }
    }

    public function crear()
    {

        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES(' ";
        $query .= join("', '", array_values($atributos));
        $query .=  " ')";


        $resultado = self::$db->query($query);

        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?mensaje=1');
        }
    }

    public function actualizar()
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        join(', ', $valores);

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = ' " . self::$db->escape_string($this->id) . " ' ";
        $query .= "LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?mensaje=2');
        }
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla  . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?mensaje=4');
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] =  self::$db->escape_string($value);
        }


        return $sanitizado;
    }

    //Subida de archivo

    public function setImagen($imagen)
    {

        //Eliminar la imagen previa
        if (!is_null($this->id)) {

            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Borrar archivo de la imagen

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // Validacion
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = []; 
        return static::$errores;
    }

    //Lista todos los registro
    public static function all($limit = false)
    {
        if (!$limit) {
            $query = "SELECT * FROM " . static::$tabla;
        } else {
            $query = "SELECT * FROM " . static::$tabla . " LIMIT 3 ";
        }

        $resultado = self::consultarSQL($query);

        return $resultado;
    }


    // Busca una propiedad por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }



    public static function consultarSQL($query)
    {
        //Consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();

        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    //Sincronizar
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
