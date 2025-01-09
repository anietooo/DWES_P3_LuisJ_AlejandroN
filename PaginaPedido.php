<?php
// filepath: /c:/Users/zonag/Desktop/fp/DAW/2ºAÑO/PHP/DWES_P3_LuisJ_AlejandroN/PaginaPedido.php
include_once("./database/conexion.php");
include_once("./database/productoDB.php");
include_once("./database/pedidoDB.php");
include_once("./model/Producto.php");
include_once("./model/Pedido.php");
require_once("./views/header.php");

session_start();

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
      // Insertar el pedido en la base de datos
      $pedido = new Pedido(null, $email, new DateTime(), $_SESSION['productos'][$email]);
      insertarPedido($pedido);
  
      // Limpiar la sesión después de la compra
      unset($_SESSION['productos'][$email]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Pedido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            if (isset($_SESSION['productos'][$email])) {
                foreach ($_SESSION['productos'][$email] as $producto) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<form action="PaginaPedido.php" method="post" style="position: relative;">';
                    echo '<input type="hidden" name="id" value="' . $producto['id'] . '">';
                    echo '<button type="submit" name="eliminar_producto" class="btn btn-danger btn-sm" style="position: absolute; top: 10px; right: 10px;">X</button>';
                    echo '</form>';
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
        <?php if (isset($_SESSION['productos'][$email]) && count($_SESSION['productos'][$email]) > 0): ?>
            <form action="PaginaPedido.php" method="post">
                <button type="submit" name="comprar" class="btn btn-outline-primary">Comprar</button>
                <button type="submit" name="vaciar_cesta" class="btn btn-danger">Vaciar Cesta</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
require_once("./views/footer.php");
?>