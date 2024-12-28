<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/model/Usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/conexion.php";

function insertarUsuario($u)
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT into Usuario (email, nombre, password1)
        values (?, ?, ?)";
    $ps = $c->prepare($sql);
    $email = $u->getEmail();
    $nombre = $u->getNombre();
    $password = $u->getPassword();
    $passwordHasheada = password_hash($password,PASSWORD_DEFAULT);
    $ps->bind_param("sss", $email, $nombre, $passwordHasheada);
    $ps->execute();
    $c->close();
}

function leerUsuario($email){
    $c = conectar();
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("s",$email);
    $ps->execute();
    $r = $ps->get_result();
    if($r && $row = $r->fetch_assoc()){
        return new Usuario($row['email'], $row['nombre'], $row['password1']);
    }
    return null;
}

function comprobacionLogin($email,$password1)
{
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $c = conectar();
    $ps = $c->prepare($sql);
    $ps->bind_param("s", $email);
    $ps->execute();
    $r = $ps->get_result();

    if($r->num_rows > 0){
        $fila = $r->fetch_assoc();
        $hash = $fila["password1"];
        if(password_verify($password1,$hash)){
            return 1;
        } else{
            return -2;
        }
    } else{
        return -1;
    }
}
?>