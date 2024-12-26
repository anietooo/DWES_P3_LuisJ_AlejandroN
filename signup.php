<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("./views/header.php")
?>

<?php
session_start();
$nombre = $email = $password1 = $password2 = "";
$nombreErr = $emailErr = $password1Err = $password2Err = "";
$errores = false;
include "./database/conexion.php";
include "./database/usuarioDB.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = securizar($_POST["nombre"]);
    $email = securizar($_POST["email"]);
    $password1 =securizar($_POST["password1"]);
    $password2 =securizar($_POST["password2"]);

    if (empty($nombre)) {
        $nombreErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($email)) {
        $emailErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($password1) || strlen($password1)<5) {
        $password1Err = "Campo obligatorio , la contraseña debe tener mas de 5 Caracteres";
        $errores = true;
    }

    if (empty($password2)) {
        $password2Err = "Campo obligatorio";
        $errores = true;
    }

    if($password1 != $password2){
        $password1Err = "No coinciden";
        $errores = true;
    }

    if(!$errores){
        $_SESSION["nombre"] = $nombre;
        $_SESSION["email"] = $email;
        $_SESSION["origen"] = "signup";

        crearTabla();
        if (!leerUsuario($email)) {
            header("Location: ./index.php");
            $u = new Usuario($email,$nombre,$password1);
            insertarUsuario($u);
            exit();
        }else{
            $emailErr="Ya existe un usuario con ese email";
        }
    }
}else{
    $nombre = '';
    $email = '';
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
        Nombre:* <input type="text" name="nombre"
        class="<?php if(!empty($nombreErr)) echo "error"; ?>"
        value="<?php echo htmlspecialchars($nombre); ?>">
        <label><?php echo $nombreErr; ?></label>
        <br><br>
        Email:* <input type="email" name="email"
        class="<?php if(!empty($emailErr)) echo "error"; ?>"
        value="<?php echo htmlspecialchars($email); ?>">
        <label><?php echo $emailErr; ?></label>
        <br><br>
        Contraseña:* <input type="password" name="password1"
        class="<?php if(!empty($password1Err)) echo "error"; ?>"
        value="">
        <label><?php echo $password1Err; ?></label>
        <br><br>
        Repetir contraseña:* <input type="password" name="password2"
        class="" value="">
        <label><?php echo $password1Err; ?></label>
        <br><br>
        <input class="btn btn-primary" type="submit" value="Enviar">
        <input class="btn btn-secondary" type="reset" value="Limpiar formulario">
    </form>
</body>
</html>
<?php
require_once("./views/footer.php")
?>