<?php
function conectar():mysqli{
    $server = "127.0.0.1";
    $user = "root";
    $password = "Sandia4you";
    $dbname = "DWES_P3_LuisJ_AlejandroN";
    $conexion = new mysqli($server,$user,$password,$dbname);
    return $conexion;
}

function crearTabla(): bool
{
    $sql = "CREATE TABLE Usuario IF NOT EXISTS (
    email VARCHAR(255) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
    );";

    $c = conectar();
    return $c->query($sql);
}

function insertarUsuario($email, $contraseña): bool
{
    $sql = "INSERT INTO Usuario (email,nombre,contraseña) values (?, ?,?)";
    $c = conectar();
    $prepared = $c->prepare($sql);
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $prepared->bind_param("sss", $email, $contraseña, $hash);
    return $prepared->execute();
}

function existeUsuario($email): bool
{
    $sql = "SELECT * FROM Usuario where email = ?";
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

function verificarUsuario($email, $contraseña): int
{
    $sql = "SELECT contraseña from Usuario where email = ?";
    $c = conectar();
    $prepared = $c->prepare($sql);
    $prepared->bind_param("s", $email);
    $prepared->execute();
    $r = $prepared->get_result();
    if ($r->num_rows > 0) {
        $fila = $r->fetch_assoc();
        $hash = $fila["contraseña"];
        if (password_verify($contraseña, $hash)) {
            return 1;
        } else {
            return -2;
        }
    } else {
        return -1;
    }
}
?>