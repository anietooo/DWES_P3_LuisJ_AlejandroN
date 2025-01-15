<?php
session_start();
require_once("./views/header.php");
//Uso de la variable de sesión email para recuperar el email del usuario y mostrarlo en el formulario
//para que no tenga que escribirlo de nuevo el usuario
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: grid;
            height: 100vh;
            grid-template-rows: auto 1fr auto;
            position: relative;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-container {
            position: absolute;
            width: 40%;
            top: 35%;
            left: 10%;
            background-color: rgba(255, 255, 255, 0.6);
            padding: 30px;
            border-radius: 10px;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(15px);
        }
    </style>
</head>

<body>
    <!-- Formulario con un campo de correo para contactar -->
    <div class="form-container">
        <h2 class="mb-4">Pon tu correo y te contactaremos</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <img src="./views/img/Contact.jpg" alt="">
</body>

</html>
<?php
require_once("./views/footer.php")
?>