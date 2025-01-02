<?php
include_once("./model/Producto.php");

/**
 * FALTA POR HACER
 */
function insertarProducto($producto): bool
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT INTO Producto (id,nombre, descripcion,precio,stock) values (?, ?, ?, ?, ?)";
    $prepared = $c->prepare($sql);
    $prepared->bind_param("issfi", $id, $nombre, $descripcion, $precio, $stock);
    $id = $producto->getId();
    $nombre = $producto->getNombre();
    $descripcion = $producto->getDescripcion();
    $precio = $producto->getPrecio();
    $stock = $producto->getStock();
    return $prepared->execute();
}

/**
 * FALTA POR HACER
 */
function leerProducto(){
    $c = conectar();
    $sql = "SELECT * FROM Producto";
    $r = $c->query($sql);
    $c->close();
    return $r;
}

/**
 * FALTA POR HACER
 */
function leerProductoOrdenador($id)
{
    $c = conectar();
    $sql = "SELECT  nombre, descripcion, precio, stock FROM Producto WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("i", $id);
    $ps->execute();
    $r = $ps->get_result();
    $r = $r->fetch_assoc();
    $p = new Ordenador($r["ram"], $r["id"], $r["nombre"], $r["descripcion"], $r["precio"], $r["stock"]);
    $c->close();
    return $p;
}

function leerProductoMonitor($id)
{
    $c = conectar();
    $sql = "SELECT  nombre, descripcion, precio, stock FROM Producto WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("i", $id);
    $ps->execute();
    $r = $ps->get_result();
    $r = $r->fetch_assoc();
    $p = new Monitor($r["hz"], $r["id"], $r["nombre"], $r["descripcion"], $r["precio"], $r["stock"]);
    $c->close();
    return $p;
}

/**
 * FALTA POR HACER
 */
function actualizarProducto($p)
{
    $c = conectar();
    $sql = "UPDATE Producto SET id = ?, nombre = ?, descripcion = ?, precio = ? , stock = ? WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("issfi", $id, $nombre, $descripcion, $precio, $stock);
    $id = $p->getId();
    $nombre = $p->getNombre();
    $descripcion = $p->getDescripcion();
    $precio = $p->getPrecio();
    $stock = $p->getStock();
    $ps->execute();
    $c->close();
}

/**
 * FALTA POR HACER
 */
function eliminarProducto($id)
{
    $c = conectar();
    $sql = "DELETE FROM Producto WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("i", $id);
    $c->close();
    return $ps->execute();
}
?>