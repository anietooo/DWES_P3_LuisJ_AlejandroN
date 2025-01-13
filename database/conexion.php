<?php
/**
 * Establece una conexión con la base de datos.
 *
 * @return mysqli La conexión a la base de datos.
 */
function conectar(): mysqli
{
    $server = "127.0.0.1";  //localhost
    $user = "root";
    $pass = "root";
    $dbname = "DWES_P3_LuisJ_AlejandroN";
    //$puerto = "3307";
    $conexion = new mysqli($server, $user, $pass, $dbname);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    return $conexion;
}

/**
 * Crea la tabla Usuario en la base de datos si no existe.
 *
 * @return void
 */
function crearTabla()
{
    // Establecer la conexión
    $c = conectar();
    
    // SQL para crear la tabla
    $sql = "CREATE TABLE IF NOT EXISTS Usuario (
        email VARCHAR(255) PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        password1 VARCHAR(255) NOT NULL
    );";

    // Ejecutar la consulta y comprobar si hubo algún error
  
    
    // Cerrar la conexión
    $c->close();
}

/**
 * Securiza los datos de entrada.
 *
 * @param string $datos Los datos a securizar.
 * @return string Los datos securizados.
 */
function securizar($datos): string {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


?>