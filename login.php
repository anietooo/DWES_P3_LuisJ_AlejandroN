<?php
require_once("./views/header.php")
?>

<?php
session_start();
$email = $contraseña = "";
$emailErr = $contraseñaErr = "";
$errores = false;
include "./database/conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];

    if (empty($email)) {
        $emailErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($contraseña)) {
        $contraseñaErr = "Campo obligatorio";
        $errores = true;
    }

    if(!$errores){
        if(isset($_POST["conectado"])){
            setcookie("conectado", $email, time() + 60 * 10, "/");
        } else{
            setcookie("conectado", $email, time() -3600 , "/");
        }

        $_SESSION["email"] = $email;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>
<style>
    body{
        display: grid;
        height: 100dvh;
        grid-template-rows: auto 1fr auto;
    }
</style>
<body>
    <form class="container align-self-center" action="">
        Email: <input type="email" name="email"
        class="<?php if(!empty($emailErr)) echo "error"; ?>"
        value="">
        <label><?php echo $emailErr; ?></label>
        <br><br>
        Contraseña: <input type="password" name="password"
        class="<?php if(!empty($contraseñaErr)) echo "error"; ?>"
        value="">
        <br><br>
        <input type="checkbox" name="conectado"> Permanecer conectado
        <br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar formulario">
    </form>
</body>
</html>
<?php
require_once("./views/footer.php")
?>