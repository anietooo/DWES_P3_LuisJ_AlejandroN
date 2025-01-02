<?php
include_once("./database/conexion.php");
include_once("./database/productoDB.php");
include_once("./database/pedidoDB.php");
include_once("./model/Producto.php");
include_once("./model/Pedido.php");
require_once("./views/header.php");

session_start();

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

    // Añadir el producto a la sesión
    if (!isset($_SESSION['productos'])) {
        $_SESSION['productos'] = [];
    }
    $_SESSION['productos'][] = $producto;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar'])) {
    // Insertar el pedido en la base de datos
    $pedido = new Pedido(null, $_SESSION['email'], new DateTime(), $_SESSION['productos']);
    insertarPedido($pedido);

    // Limpiar la sesión después de la compra
    unset($_SESSION['productos']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Pedido</title>
</head>
<style>
    body {
        display: grid;
        height: 100dvh;
        grid-template-rows: auto 1fr auto;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            if (isset($_SESSION['productos'])) {
                foreach ($_SESSION['productos'] as $producto) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $producto['descripcion'] . '</p>';
                    echo '<p class="card-text">Precio: ' . $producto['precio'] . '€</p>';
                    echo '<p class="card-text">Stock: ' . ($producto['stock'] ? "Disponible" : "No disponible") . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <?php if (isset($_SESSION['productos']) && count($_SESSION['productos']) > 0): ?>
            <form action="PaginaPedido.php" method="post">
                <button type="submit" name="comprar" class="btn btn-success">Comprar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
require_once("./views/footer.php");
?>