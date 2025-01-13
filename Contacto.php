<?php
session_start();
require_once("./views/header.php");
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Pon tu correo y te contactaremos</h2>
        <form action="submit_email.php" method="post">
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <img src="./views/img/Contact.jpg" alt="">
</body>

</html>
<?php
require_once("./views/footer.php")
?>