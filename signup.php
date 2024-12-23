<?php
require_once("./views/header.php")
?>

<?php
session_start();
$nombre = $email = $password = $password2 = "";
$nombreErr = $emailErr = $passwordErr = $password2Err = "";
$errores = false;
include "./database/conexion.php";
include "./database/usuarioDB.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if (empty($nombre)) {
        $nombreErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($email)) {
        $emailErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($password)) {
        $passwordErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($password2)) {
        $password2Err = "Campo obligatorio";
        $errores = true;
    }

    if($password != $password2){
        $passwordErr = "No coinciden";
        $errores = true;
    }

    if(!$errores){
        $_SESSION["nombre"] = $nombre;
        $_SESSION["email"] = $email;
        $_SESSION["origen"] = "signup";

        crearTabla();
        if (!leerUsuario($email)) {
            //header("Location: ./index.php");
            $u = new Usuario($email,$nombre,$password);
            insertarUsuario($u);
            exit();
        }else{
            $emailErr="Ya existe un usuario con ese email";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</head>
<style>
    body{
        display: grid;
        height: 100dvh;
        grid-template-rows: auto 1fr auto;
    }
</style>
<body>
    <form class="container align-self-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Nombre: <input type="text" name="nombre"
        class="<?php if(!empty($nombreErr)) echo "error"; ?>"
        value="">
        <label><?php echo $nombreErr; ?></label>
        <br><br>
        Email: <input type="email" name="email"
        class="<?php if(!empty($emailErr)) echo "error"; ?>"
        value="">
        <label><?php echo $emailErr; ?></label>
        <br><br>
        Contraseña: <input type="password" name="password"
        class="<?php if(!empty($passwordErr)) echo "error"; ?>"
        value="">
        <br><br>
        Repetir contraseña: <input type="password" name="password2"
        class="" value="">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Enviar">
        <input class="btn btn-secondary" type="reset" value="Limpiar formulario">
    </form>
</body>
</html>
<?php
require_once("./views/footer.php")
?>