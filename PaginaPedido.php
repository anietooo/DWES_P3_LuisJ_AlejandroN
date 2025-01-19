<?php
session_start();
error_reporting(0);  // 0 - No mostrar errores ni advertencias
include_once("./database/conexion.php");
include_once("./database/productoDB.php");
include_once("./database/pedidoDB.php");
include_once("./model/Producto.php");
include_once("./model/Pedido.php");
require_once("./views/header.php");

if (!isset($_SESSION['email'])) {
    // Redirige al usuario al login si no está logueado
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];


    // Crear un array con los datos del producto
    $producto = [
        'id' => $id,
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'precio' => $precio,
        'stock' => $stock
    ];

    // Añadir el producto a la sesión del usuario
    if (!isset($_SESSION['productos'][$email])) {
        $_SESSION['productos'][$email] = [];
    }
    $_SESSION['productos'][$email][] = $producto;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_producto'])) {
    $id = $_POST['id'];
    // Eliminar el producto de la sesión
    foreach ($_SESSION['productos'][$email] as $key => $producto) {
        if ($producto['id'] == $id) {
            unset($_SESSION['productos'][$email][$key]);
            break;
        }
    }
    // Reindexar el array para evitar problemas de índices
    $_SESSION['productos'][$email] = array_values($_SESSION['productos'][$email]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vaciar_cesta'])) {
    // Vaciar la cesta de productos
    unset($_SESSION['productos'][$email]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar'])) {
    //En caso de que se compre, se insertara el pedido en la bdd
    $pedido = new Pedido(null, $email, new DateTime(), $_SESSION['productos'][$email]);
    insertarPedido($pedido);

    // Limpiar la sesión después de la compra
    unset($_SESSION['productos'][$email]);

       // Mostrar la alerta con JavaScript y redirigir
       echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
       echo '<script>';
       echo 'Swal.fire({ title: "¡Gracias por tu Compra!", text: "El pedido se ha realizado con éxito.", icon: "success", confirmButtonText: "Aceptar" }).then(() => {';
       echo 'window.location.href = "index.php";';
       echo '});';
       echo '</script>';
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Pedido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            display: grid;
            grid-template-rows: auto 1fr auto;
            height: 100vh;
        }

        /* Grid para definir como salen los pedidos por pantalla */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="product-grid ">
            <?php
            if (isset($_SESSION['productos'][$email])) {
                //Se recorren todos los productos y se sacan por pantalla mediante echo
                foreach ($_SESSION['productos'][$email] as $producto) {
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<form action="PaginaPedido.php" method="post" style="position: relative;">';
                    echo '<input type="hidden" name="id" value="' . $producto['id'] . '">';
                    echo '<button type="submit" name="eliminar_producto" class="btn btn-danger btn-sm" style="position: absolute; top: -5px; right: 10px;">X</button>';
                    echo '</form>';
                    //Acceso a nombre, descripción, precio y stock de cada producto para sacarlo en la card
                    echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $producto['descripcion'] . '</p>';
                    echo '<p class="card-text">Precio: ' . $producto['precio'] . '€</p>';
                    echo '<p class="card-text">Stock: ' . ($producto['stock'] ? "Disponible" : "No disponible") . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <!--
         Si has añadido algún producto a la cesta(PaginaPedido.php) entonces
         se verá por pantalla este form con 2 botones, uno para comprar y otro
         para vaciar la cesta por completo
        -->
        <?php if (isset($_SESSION['productos'][$email]) && count($_SESSION['productos'][$email]) > 0): ?>
            <form action="PaginaPedido.php" method="post" id="comprar" class="mt-3">
                <button type="submit" name="comprar" id="comprar" class="btn btn-outline-primary">Comprar</button>
                <button type="submit" name="vaciar_cesta" class="btn btn-danger">Vaciar Cesta</button>
            </form>
        <?php endif; ?>
    </div>
    <?php require_once("./views/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once("./views/footer.php");
?>