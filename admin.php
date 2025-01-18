<?php 
session_start();
include_once("./database/conexion.php");
include_once("./model/Producto.php");
include_once("./model/Monitor.php");
include_once("./model/Ordenador.php");
include_once("./model/Periferico.php");
include_once("./model/Pedido.php");
include_once("./database/productoDB.php"); // Aquí se encuentran las funciones para productos
include_once("./database/pedidoDB.php");   // Aquí se encuentran las funciones para pedidos

// Verificar sesión
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Procesar el formulario de inyección de código
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo_inyectado'])) {
    $codigo_inyectado = $_POST['codigo_inyectado'];
    $tabla = $_POST['tabla'] ?? '';
    $accion = $_POST['accion'] ?? '';
    $id = $_POST['id'] ?? '';

    // Validar que el usuario sea admin
    if ($_SESSION['email'] !== 'admin@gmail.com') {
        echo "No tienes permiso para realizar esta acción.";
        exit();
    }

    // Permitir solo las funciones `actualizarPedido` y `actualizarProducto`
    if (preg_match('/^(actualizarPedido|actualizarProducto)\(.+\);$/', $codigo_inyectado)) {
        eval($codigo_inyectado);
    } else {
        echo "Código no permitido.";
    }

    // Procesar las acciones de eliminar
    if ($tabla === 'Producto' && $accion === 'eliminar' && !empty($id)) {
        eliminarProducto((int)$id); // Llamada a la función para eliminar producto
    } elseif ($tabla === 'Pedido' && $accion === 'eliminar' && !empty($id)) {
        eliminarPedido((int)$id); // Llamada a la función para eliminar pedido
    }
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
        <h1 class="mb-4">Inyección de Código (Solo Admin)</h1>
        
        <!-- Formulario de inyección de código -->
        <form action="admin.php" method="POST">
            <label for="codigo_inyectado" class="form-label">Introduce el código a ejecutar:</label>
            <input type="text" name="codigo_inyectado" class="form-control" placeholder="Ejemplo: actualizarPedido(1, 'nuevoemail@example.com', '2025-01-19 14:30:00');">
            <button type="submit" class="btn btn-primary mt-2">Confirmar</button>
        </form>

        <h1 class="mb-4 mt-5">Pedidos</h1>
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>UsuarioId</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = conectar();
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
                                    <button type='submit' name='accion' value='eliminar' class='btn btn-danger btn-sm'>Eliminar</button>
                                </form>
                            </td>
                        </tr>";
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>

        <h1 class="mb-4">Productos</h1>
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = conectar();
                $stmt = $conn->prepare("SELECT id, nombre, descripcion, precio, stock FROM Producto");
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
                                    <button type='submit' name='accion' value='eliminar' class='btn btn-danger btn-sm'>Eliminar</button>
                                </form>
                            </td>
                        </tr>";
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
