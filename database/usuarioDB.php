<?php
include_once "./database/conexion.php";
function insertarUsuario($u)
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT into Usuario (nombre, email, contraseña)
        values (?, ?, ?)";
    $ps = $c->prepare($sql);
    $email = $u->getNombre();
    $email = $u->getEmail();
    $contraseña = $u->getPassword();
    $contraseñaHasheada = password_hash($contraseña,PASSWORD_DEFAULT);
    $ps->bind_param("sss", $nombre, $email, $contraseñaHasheada);
    $ps->execute();
    $c->close();
}

function leerUsuario($id)
{
    $c = conectar();
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("s", $email);
    $ps->execute();
    $r = $ps->get_result();
    $r = $r->fetch_assoc();
    $u = new Usuario($r["nombre"], $r["email"], $r["contraseña"]);
    $c->close();
    return $u;
}
?>