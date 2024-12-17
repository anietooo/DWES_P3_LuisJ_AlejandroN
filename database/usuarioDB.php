<?php

function insertarUsuario($email,$nombre, $contraseña): bool
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

function registrarUsuario(){
        
}

function iniciarSesion(){

}
?>