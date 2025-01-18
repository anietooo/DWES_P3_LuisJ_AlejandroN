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

    if ($tabla === 'Producto') {
        if ($accion === 'eliminar' && !empty($id)) {
            eliminarProducto((int)$id); // Llamada a la función para eliminar producto desde productoDB.php
        }

    } elseif ($tabla === 'Pedido') {
        if ($accion === 'eliminar' && !empty($id)) {
            eliminarPedido((int)$id); // Llamada a la función para eliminar pedido desde pedidoDB.php
        }
    }

    // Asegurarse de que solo el admin pueda realizar esta acción
    if ($_SESSION['email'] === 'admin@gmail.com') {
        // Evaluar el código inyectado (esto es peligroso, pero controlado en este caso)
        eval($codigo_inyectado); // Esto ejecutará lo que el usuario ponga en el campo de texto
    } else {
        echo "No tienes permiso para realizar esta acción.";
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
                // Conexión a la base de datos
                $conn = new mysqli("127.0.0.1", "root", "root", "DWES_P3_LuisJ_AlejandroN");
                // Consulta para obtener pedidos
                $stmt = $conn->prepare("SELECT id, usuarioId, fecha FROM Pedido");
                $stmt->execute();
                $result = $stmt->get_result();

                // Mostrar los pedidos
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

                // Eliminar un pedido si se ha enviado la acción
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar' && isset($_POST['id'])) {
                    eliminarPedido($_POST['id']);  // Llamada a la función eliminarPedido
                    header("Location: admin.php"); // Redirigir para evitar reenvío del formulario
                    exit();
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
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
            // Mostrar productos
            $conn = new mysqli("127.0.0.1", "root", "root", "DWES_P3_LuisJ_AlejandroN");

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

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

            // Eliminar un producto si se ha enviado la acción
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar' && isset($_POST['id'])) {
                eliminarProducto($_POST['id']);  // Llamada a la función eliminarProducto
                header("Location: admin.php"); // Redirigir para evitar reenvío del formulario
                exit();
            }

            $stmt->close();
            $conn->close();
            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
