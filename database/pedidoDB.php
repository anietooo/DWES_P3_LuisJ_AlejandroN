
<?php
include_once("./model/Pedido.php");

/**
 * FALTA POR HACER
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
 * FALTA POR HACER
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
 * FALTA POR HACER
 * DUDA DE PRODUCTOS EN NEW PEDIDO
 */
function leerPedidoCriterio($id)
{
    $c = conectar();
    $sql = "SELECT * FROM Pedido WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("i", $id);
    $ps->execute();
    $r = $ps->get_result();
    $r = $r->fetch_assoc();
    $p = new Pedido($r["id"], $r["usuarioId"], $r["fecha"], $r["productos"]);
    $c->close();
    return $p;
}

/**
 * FALTA POR HACER
 */
function actualizarPedido($p)
{
    $c = conectar();
    $sql = "UPDATE Pedido SET id = ?, usuarioId = ?, fecha = ? WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("iii", $id, $usuarioId, $fecha);
    $id = $p->getId();
    $usuarioId = $p->getUsuarioId();
    $fecha = $p->getFecha();
    $ps->execute();
    $c->close();
}

/**
 * FALTA POR HACER
 */
function eliminarPedido($id)
{
    $c = conectar();
    $sql = "DELETE FROM Pedido WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("i", $id);
    $c->close();
    return $ps->execute();
}
?>