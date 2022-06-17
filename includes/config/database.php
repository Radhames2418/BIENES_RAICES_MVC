<?php 

function conectarDB() : mysqli
{
    //Conexion a la base datos
    $db = new mysqli('localhost', 'root', '', 'bienes_raices');

    if (!$db) {
        echo '<h1> No se pudo conectar </h1>';
        exit;
    } 


    return $db;
}


