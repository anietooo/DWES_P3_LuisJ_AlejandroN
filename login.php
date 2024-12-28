<?php
require_once("./views/header.php")
?>

<?php
session_start();
$email = $password1 = "";
$emailErr = $password1Err = "";
$errorLogin="";
$errores = false;
include "./database/conexion.php";
include "./database/usuarioDB.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = securizar( $_POST["email"]);
    $password1 = securizar($_POST["password1"]);

    if (empty($email)) {
        $emailErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($password1) || strlen($password1)<5) {
        $password1Err = "Campo obligatorio , la contraseña tiene que tener mas de 5 Caracteres";
        $errores = true;
    }

    if(!$errores){
        if(isset($_POST["conectado"])){
            setcookie("conectado", $email, time() + 60 * 10, "/");
        } else{
            setcookie("conectado", $email, time() -3600 , "/");
        }

        $_SESSION["email"] = $email;

        $verificacion = comprobacionLogin($email,$password1);
        if ($verificacion>0) {
            header("Location: ./index.php");
            exit();
        }elseif ($verificacion == -1){
            $errorLogin="No existe el email";
        }else{
            $errorLogin="No coincide con la contraseña";
        }
    }
}else{
    $email = '';
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
    <form class="container align-self-center" action="login.php" method="post" >
        Email: <input type="email" name="email"
        class="<?php if(!empty($emailErr)) echo "error"; ?>"
        value="<?php echo htmlspecialchars($email); ?>">
        <label><?php echo $emailErr; ?></label>
        <br><br>
        Contraseña: <input type="password" name="password1"
        class="<?php if(!empty($password1Err)) echo "error"; ?>"
        value="">
        <label><?php echo $password1Err; ?></label>
        <br><br>
        <label><?php echo $errorLogin; ?></label>
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