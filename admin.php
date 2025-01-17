<?php
session_start();
include_once("./database/conexion.php");
include_once("./model/Producto.php");
include_once("./model/Monitor.php");
include_once("./model/Ordenador.php");
include_once("./model/Periferico.php");
include_once("./model/Pedido.php");
include_once("./database/productoDB.php");
include_once("./database/pedidoDB.php");


// Verificar sesión
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


// Procesar acciones para pedidos o productos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tabla = $_POST['tabla'] ?? '';
    $accion = $_POST['accion'] ?? '';
    $id = $_POST['id'] ?? '';

    if ($tabla === 'Producto') {
        if ($accion === 'eliminar' && !empty($id)) {
            eliminarProducto((int)$id);
        } elseif ($accion === 'actualizar' && !empty($id)) {
            $id = $_POST['id'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $precio = $_POST['precio'] ?? 0;
            $stock = $_POST['stock'] ?? 0;
            $ram = $_POST['ram'] ?? 0;

            $producto = new Ordenador($id, $nombre, $descripcion,$precio,$stock,$ram);
            actualizarProducto($producto);
        }
    } elseif ($tabla === 'Pedido') {
        if ($accion === 'eliminar' && !empty($id)) {
            eliminarPedido((int)$id); // Asegúrate de tener esta función implementada
        } elseif ($accion === 'actualizar' && !empty($id)) {
            $id= $_POST['id'] ?? '';
            $usuarioId = $_POST['usuarioId'] ?? '';
            $fecha = $_POST['fecha'] ?? '';

            actualizarPedido($id, $usuarioId, $fecha); // Asegúrate de tener esta función implementada
        }
    }

    // Redirigir para evitar reenvío de formularios
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Pedidos</h1>
        <table class="table table-responsive table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>UsuarioId</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>

            <?php
            $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "DWES_P3_LuisJ_AlejandroN");

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT id, usuarioId, fecha FROM Pedido");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['usuarioId'] . "</td>
                        <td>" . $row['fecha'] . "</td>
                        <td>
                            <form action='' method='post' style='display:inline;'>
                                <input type='hidden' name='tabla' value='Pedido'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='hidden' name='usuarioId' value='" . htmlspecialchars($row['usuarioId']) . "'>
                                <input type='hidden' name='fecha' value='" . htmlspecialchars($row['fecha']) . "'>
                                <button type='submit' name='accion' value='actualizar' class='btn btn-primary btn-sm'>Actualizar</button>
                            </form>
                            <form action='' method='post' style='display:inline;'>
                                <input type='hidden' name='tabla' value='Pedido'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit' name='accion' value='eliminar' class='btn btn-danger btn-sm'>Eliminar</button>
                            </form>
                        </td>
                    </tr>";
            }

            $stmt->close();
            ?>
        </table>

        <h1 class="mb-4">Productos</h1>
        <table class="table table-responsive table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>

            <?php
            $stmt = $conn->prepare("SELECT id, nombre, descripcion , precio, stock FROM Producto");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nombre'] . "</td>
                        <td>" . $row['descripcion'] . "</td>
                        <td>" . $row['precio'] . "</td>
                        <td>" . $row['stock'] . "</td>
                        <td>
                            <form action='' method='post' style='display:inline;'>
                                <input type='hidden' name='tabla' value='Producto'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='hidden' name='nombre' value='" . htmlspecialchars($row['nombre']) . "'>
                                <input type='hidden' name='descripcion' value='" . htmlspecialchars($row['descripcion']) . "'>
                                <input type='hidden' name='precio' value='" . $row['precio'] . "'>
                                <input type='hidden' name='stock' value='" . $row['stock'] . "'>
                                <button type='submit' name='accion' value='actualizar' class='btn btn-primary btn-sm'>Actualizar</button>
                            </form>
                            <form action='' method='post' style='display:inline;'>
                                <input type='hidden' name='tabla' value='Producto'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit' name='accion' value='eliminar' class='btn btn-danger btn-sm'>Eliminar</button>
                            </form>
                        </td>
                    </tr>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
