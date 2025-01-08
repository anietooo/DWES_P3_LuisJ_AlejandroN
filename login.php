<?php
require_once("./views/header.php");
?>

<?php
session_start();
$email = $password1 = "";
$emailErr = $password1Err = "";
$errorLogin = "";
$errores = false;
include "./database/conexion.php";
include "./database/usuarioDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = securizar($_POST["email"]);
    $password1 = securizar($_POST["password1"]);

    if (empty($email)) {
        $emailErr = "Campo obligatorio";
        $errores = true;
    }

    if (empty($password1) || strlen($password1) < 5) {
        $password1Err = "Campo obligatorio, la contraseña tiene que tener más de 5 caracteres";
        $errores = true;
    }

    if (!$errores) {
        if (isset($_POST["conectado"])) {
            setcookie("conectado", $email, time() + 60 * 10, "/");
        } else {
            setcookie("conectado", $email, time() - 3600, "/");
        }

        $_SESSION["email"] = $email;

        $verificacion = comprobacionLogin($email, $password1);
        if ($verificacion > 0) {
            header("Location: ./index.php");
            exit();
        } elseif ($verificacion == -1) {
            $errorLogin = "No existe el email";
        } else {
            $errorLogin = "No coincide con la contraseña";
        }
    }
} else {
    $email = '';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        display: grid;
        height: 100vh;
        grid-template-rows: auto 1fr auto;
    }

    .bg-gradient-primary {
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(32, 86, 168) 35%, rgba(0, 212, 255, 1) 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
</style>

<body>
    <div class="container align-self-center">
        <div class="row">
            <div class="col">
                <nav class="breadcrumb bg-white">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item bg-white"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active bg-white" aria-current="page">
                            Registro
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center flex-column  text-white bg-gradient-primary">
                <h1>Identifícate o crea una nueva cuenta<br></h1>
                <p>Con tu cuenta de usuario podrás: <br><br> Disfrutar de ofertas exclusivas y personalizadas.<br> Acceder a tu historial de compras. <br>Establecer alertas de disponibilidad y nuevos lanzamientos.Compartir tus listas y configuraciones.</p>
            </div>
            <div class="col-md-6">
                <form action="login.php" method="post" class="border p-4 shadow-sm rounded">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control <?php if (!empty($emailErr)) echo 'is-invalid'; ?>" value="<?php echo htmlspecialchars($email); ?>">
                        <div class="invalid-feedback"><?php echo $emailErr; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password1">Contraseña:</label>
                        <input type="password" name="password1" id="password1" class="form-control <?php if (!empty($password1Err)) echo 'is-invalid'; ?>" value="">
                        <div class="invalid-feedback"><?php echo $password1Err; ?></div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="conectado" id="conectado" class="form-check-input">
                        <label class="form-check-label" for="conectado">Permanecer conectado</label>
                    </div>
                    <div class="form-group">
                        <label class="text-danger"><?php echo $errorLogin; ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary">Acceder</button>
                    <button type="reset" class="btn btn-secondary">Limpiar formulario</button>
                    <p class="mt-3">¿No tienes una cuenta? <a href="/signup.php">Regístrate aquí</a></p>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
<?php
require_once("./views/footer.php");
?>