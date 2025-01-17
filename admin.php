<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt5">
    <h1 class="mb-4">Pedidos</h1>
    <table class=" table table-responsive table-bordered table-striped">
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
                </tr>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </table>

    <hr>
    <h1 class="mb-4">Productos</h1>
    <table class="table table-responsive table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Accion</th>
        </tr>

        <?php
        $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "DWES_P3_LuisJ_AlejandroN");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

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
                </tr>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </table>
    </div>
    
</body>

</html>