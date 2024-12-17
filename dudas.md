                                                                        DUDAS
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------

-Como crear una lista en el objeto padre Producto

<?php

/**
 * Función para conectarme a la base de datos daw en localhost (docker...)
 * @return mysqli Objeto mysqli que representa una conexión con la BD
 */
function conectar(): mysqli
{
    $server = "127.0.0.1";  //localhost
    $user = "root";
    $pass = "Sandia4you";
    $dbname = "daw";
    $conexion = new mysqli($server, $user, $pass, $dbname);
    return $conexion;
}

function crearTabla(): bool
{
    $sql = "CREATE table if not exists users (email varchar(50) primary key, pass varchar(255))";
    $c = conectar();
    return $c->query($sql);
}

/**
 * Función para <b>insertar</b> un usuario en la base de datos daw en la tabla users con la contraseña hasheada.
 * @param string $email Email único (primary key)
 * @param string $pass Contraseña clara (no hasheada)
 * @return bool True si lo ha hecho correctamente, false en caso de errores
 */
function insertarUsuario($email, $pass): bool
{
    $sql = "INSERT into users (email, pass) values (?, ?)";
    $c = conectar();
    $prepared = $c->prepare($sql);
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $prepared->bind_param("ss", $email, $hash);
    return $prepared->execute();
}

/**
 * Summary of existeUsuario
 * @param mixed $email
 * @return bool
 */
function existeUsuario($email): bool
{
    $sql = "SELECT * from users where email = ?";
    $c = conectar();
    $prepared = $c->prepare($sql);
    $prepared->bind_param("s", $email);
    $prepared->execute();
    $r = $prepared->get_result();
    if ($r->num_rows > 0) {
        return true;
    }
    return false;
}

/**
 * Verificar si existe en la BD email y contraseña
 * @param mixed $email Email a buscar en la BD
 * @param mixed $pass Contraseña no hasheada
 * @return int Devuelve: 1 si existe el email y contraseña.
 * -1 si el email no existe en la base de datos.
 * -2 si la contraseña no coincide con ese email
 */
function verificarUsuario($email, $pass): int
{
    //Select a la base de de datos para coger hash
    $sql = "SELECT pass from users where email = ?";
    $c = conectar();
    $prepared = $c->prepare($sql);
    $prepared->bind_param("s", $email);
    $prepared->execute();
    $r = $prepared->get_result();
    if ($r->num_rows > 0) {
        //TODO no está probado
        $fila = $r->fetch_assoc();
        $hash = $fila["pass"];
        if (password_verify($pass, $hash)) {
            return 1;
        } else {
            return -2;
        }
    } else {
        return -1;
    }
}