<?php
include_once "./database/conexion.php";
include_once "./model/Usuario.php";
function insertarUsuario($u)
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT into Usuario (email, nombre, contraseña)
        values (?, ?, ?)";
    $ps = $c->prepare($sql);
    $email = $u->getEmail();
    $nombre = $u->getNombre();
    $contraseña = $u->getPassword();
    $contraseñaHasheada = password_hash($contraseña,PASSWORD_DEFAULT);
    $ps->bind_param("sss", $email, $nombre, $contraseñaHasheada);
    $ps->execute();
    $c->close();
}

function leerUsuario($email)
{
    $c = conectar();
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("s", $email);
    $ps->execute();
    $r = $ps->get_result();
    $r = $r->fetch_assoc();
    $u = new Usuario($r["email"], $r["nombre"], $r["password"]);
    $c->close();
    return $u;
}
?>