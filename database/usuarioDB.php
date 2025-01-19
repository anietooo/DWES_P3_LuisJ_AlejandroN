<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/model/Usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/conexion.php";

/**
 * Inserta un usuario en la base de datos.
 *
 * @param Usuario $u El usuario a insertar.
 * @return void
 */
function insertarUsuario($u)
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT into Usuario (email, nombre, password1, admin1)
        values (?, ?, ?, ?)";
    $ps = $c->prepare($sql);
    $email = $u->getEmail();
    $nombre = $u->getNombre();
    $password = $u->getPassword();
    $admin1 = $u->getAdmin1();
    $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);
    $ps->bind_param("sssi", $email, $nombre, $passwordHasheada, $admin1);
    $ps->execute();
    $c->close();
}


/**
 * Verifica Si el Usuario es Administrador.
 *
 * @param Usuario $email El email a verificar.
 * @return void
 */
function verificarAdmin($email)
{
    // Verificar si el usuario es administrador
    $c = conectar();
    $email = $_SESSION['email'];
    $stmt = $c->prepare("SELECT admin1 FROM Usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0 || $result->fetch_assoc()['admin1'] <= 0) {
        // Si admin1 es 0 o no existe, denegar acceso
        echo "<h1>Acceso denegado</h1>";
        echo "<p>No tienes permisos para acceder a esta página.</p>";
        exit();
    }
}

/**
 * Lee un usuario de la base de datos por su email.
 *
 * @param string $email El email del usuario a leer.
 * @return Usuario|null El usuario leído o null si no se encontró.
 */
function leerUsuario($email)
{
    $c = conectar();
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("s", $email);
    $ps->execute();
    $r = $ps->get_result();
    if ($r && $row = $r->fetch_assoc()) {
        return new Usuario($row['email'], $row['nombre'], $row['password1'], $row['admin1']);
    }
    return null;
}

/**
 * Comprueba las credenciales de un usuario.
 *
 * @param string $email El email del usuario.
 * @param string $password1 La contraseña del usuario.
 * @return int 1 si las credenciales son correctas, -1 si el usuario no existe, -2 si la contraseña es incorrecta.
 */
function comprobacionLogin($email, $password1)
{
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $c = conectar();
    $ps = $c->prepare($sql);
    $ps->bind_param("s", $email);
    $ps->execute();
    $r = $ps->get_result();

    if ($r->num_rows > 0) {
        $fila = $r->fetch_assoc();
        $hash = $fila["password1"];
        if (password_verify($password1, $hash)) {
            return 1;
        } else {
            return -2;
        }
    } else {
        return -1;
    }
}
