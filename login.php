<?php
require_once("./views/header.php");
session_start();
?>

<?php
$email = $password1 = "";
$emailErr = $password1Err = "";
$errorLogin = "";
$errores = false;
include "./database/conexion.php";
include "./database/usuarioDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Securizar los datos
    $email = securizar($_POST["email"]);
    $password1 = securizar($_POST["password1"]);

    //Si el email no se ha rellenado dará el siguiente error
    if (empty($email)) {
        $emailErr = "Campo obligatorio";
        $errores = true;
    }

    //Si la contraseña no se ha rellenado O la longitud de la contraseña
    // es menor que 5 dará el siguiente error
    if (empty($password1) || strlen($password1) < 5) {
        $password1Err = "Campo obligatorio, la contraseña tiene que tener más de 5 caracteres";
        $errores = true;
    }

    //Si no hay errores...
    if (!$errores) {
        //Se establecen las cookies
        if (isset($_POST["conectado"])) {
            //Cookies si se marca la opción de mantenerse conectado en el formulario
            // Esto es una cookie de 10 minutos
            setcookie("conectado", $email, time() + 60 * 10, "/");
        } else {
            //Cookie en caso de que no se marque la opción de mantenerse conectado, por defecto
            // Esto es una cookie de 1 hora antes del momento actual
            // Esto provoca que el navegador elimine la cookie, ya que las cookies con una fecha de expiración pasada se consideran expiradas.
            setcookie("conectado", $email, time() - 3600, "/");
        }

        $_SESSION["email"] = $email;
        $_SESSION['admin1'] = $admin1;

        //Verificar si el usuario existe en la base de datos para ver
        // si se puede loguear con el metodo comprobacionLogin()
        $verificacion = comprobacionLogin($email, $password1);

        //Si la verificacion es mayor de 0, es decir , es 1 significa que comprobacionLogin
        // ha ido bien y te redirige automaticamente a Index
        if ($verificacion > 0) {
            header("Location: ./index.php");
            exit();
        } elseif ($verificacion == -1) { //Si comprobacionLogin es -1, es decir, que no existe ese correo en la bdd
            // Saldra el siguiente error
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
            <!--
             Esto es un breadcrumb para que el usuario sepa donde
             se encuentra y facilitar la navegacion en la web.
            -->
            <div class="col">
                <nav class="breadcrumb bg-white">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item bg-white"><a href="./index.php">Inicio</a></li>
                        <li class="breadcrumb-item active bg-white" aria-current="page">
                            Iniciar sesión
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Contenedor de login -->
        <div class="row">
            <!-- Columna de la izquierda informativo -->
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center flex-column  text-white bg-gradient-primary">
                <h1>Inicia sesión con tu cuenta de usuario<br></h1>
                <p>Con tu cuenta de usuario podrás: <br><br> Disfrutar de ofertas exclusivas y personalizadas.<br> Acceder a tu historial de compras. <br>Establecer alertas de disponibilidad y nuevos lanzamientos.Compartir tus listas y configuraciones.</p>
            </div>
            <!-- Columna de la derecha con el formulario de login -->
            <div class="col-md-6">
                <form action="login.php" method="post" class="border p-4 shadow-sm rounded">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control <?php if (!empty($emailErr)) echo 'is-invalid'; ?>" value="<?php echo htmlspecialchars($email); ?>">
                        <!-- Error -->
                        <div class="invalid-feedback"><?php echo $emailErr; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password1">Contraseña:</label>
                        <input type="password" name="password1" id="password1" class="form-control <?php if (!empty($password1Err)) echo 'is-invalid'; ?>" value="">
                        <!-- Error -->
                        <div class="invalid-feedback"><?php echo $password1Err; ?></div>
                    </div>
                    <div class="form-group form-check">
                        <label><input type="checkbox" name="conectado"> Mantenerme conectado</label>
                    </div>
                    <div class="form-group">
                        <!-- Error de Login -->
                        <label class="text-danger"><?php echo $errorLogin; ?></label>
                    </div>
                    <!-- Botones para acceder y limpiar el formulario -->
                    <button type="submit" class="btn btn-primary">Acceder</button>
                    <button type="reset" class="btn btn-secondary">Limpiar formulario</button>
                    <!-- Enlace al registro -->
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