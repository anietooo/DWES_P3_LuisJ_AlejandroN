
<?php
include_once("./model/Pedido.php");

/**
 * Inserta un pedido en la base de datos.
 *
 * @param Pedido $pedido El pedido a insertar.
 * @return bool True si la inserción fue exitosa, false en caso contrario.
 */
function insertarPedido($pedido): bool
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT INTO Pedido (usuarioId, fecha) VALUES (?, ?)";
    $prepared = $c->prepare($sql);
    $prepared->bind_param("ss", $usuarioId, $fecha);
    $usuarioId = $pedido->getUsuarioId();
    $fecha = $pedido->getFecha()->format('Y-m-d H:i:s');
    $result = $prepared->execute();

    if ($result) {
        $pedidoId = $c->insert_id;
        foreach ($pedido->getProductos() as $producto) {
            $sqlProducto = "INSERT INTO PedidoProducto (idPedido, idProducto) VALUES (?, ?)";
            $preparedProducto = $c->prepare($sqlProducto);
            $preparedProducto->bind_param("ii", $pedidoId, $producto['id']);
            $preparedProducto->execute();
        }
    }

    $c->close();
    return $result;
}

/**
 * Lee todos los pedidos de la base de datos.
 *
 * @return mysqli_result El resultado de la consulta.
 */
function leerPedido()
{
    $c = conectar();
    $sql = "SELECT * FROM Pedido";
    $r = $c->query($sql);
    $c->close();
    return $r;
}


/**
 * Actualiza un pedido en la base de datos.
 *
 * @param Pedido $p El pedido a actualizar.
 * @return void 
 */
function actualizarPedido($p)
{
    $c = conectar();
    $sql = "UPDATE Pedido SET id = ?, usuarioId = ?, fecha = ? WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("isi", $id, $usuarioId, $fecha);
    $id = $p->getId();
    $usuarioId = $p->getUsuarioId();
    $fecha = $p->getFecha();
    $ps->execute();
    $c->close();
}

/**
 * Elimina un pedido de la base de datos.
 *
 * @param int $id El ID del pedido a eliminar.
 * @return bool True si la eliminación fue exitosa, false en caso contrario.
 */
function eliminarPedido($id)
{
    $c = conectar();
    // Eliminar las relaciones en PedidoProducto
    $sqlDeleteProductos = "DELETE FROM PedidoProducto WHERE idPedido = ?";
    $psProductos = $c->prepare($sqlDeleteProductos);
    $psProductos->bind_param("i", $id);
    $resultadoProductos = $psProductos->execute();
    $psProductos->close();

    //eliminar el pedido
    $sqlDeletePedido = "DELETE FROM Pedido WHERE id = ?";
    $psPedido = $c->prepare($sqlDeletePedido);
    $psPedido->bind_param("i", $id);
    $resultadoPedido = $psPedido->execute();

    $psPedido->close();
    $c->close();

    return $resultadoPedido;
}


?>