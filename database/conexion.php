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
    return $conexion;
}

/**
 * FALTA POR HACER
 */
function crearTabla(): bool
{
    $sql = "CREATE TABLE IF NOT EXISTS Usuario (
    email VARCHAR(255) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
    );";

    $c = conectar();
    return $c->query($sql);
}
?>