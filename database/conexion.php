<?php
/**
 * FALTA POR HACER
 */
function conectar(): mysqli
{
    $server = "127.0.0.1";  //localhost
    $user = "root";
    $pass = "Sandia4you";
    $dbname = "DWES_P3_LuisJ_AlejandroN";
    $conexion = new mysqli($server, $user, $pass, $dbname);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    return $conexion;
}

function crearTabla()
{
    // Establecer la conexión
    $c = conectar();
    
    // SQL para crear la tabla
    $sql = "CREATE TABLE IF NOT EXISTS Usuario (
        email VARCHAR(255) PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        contraseña VARCHAR(255) NOT NULL
    );";

    // Ejecutar la consulta y comprobar si hubo algún error
  
    
    // Cerrar la conexión
    $c->close();
}


?>