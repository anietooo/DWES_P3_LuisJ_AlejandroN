<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "../DWES_P3_LuisJ_AlejandroN/model/Usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "../DWES_P3_LuisJ_AlejandroN/database/conexion.php";

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

    if ($r && $row = $r->fetch_assoc()) {
        return new Usuario($row['email'], $row['nombre'], $row['password']);
    }

    return null;
  
}
?>