<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Pedidos</h1>
    <table>
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
</body>

</html>