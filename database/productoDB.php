<?php
include_once("./model/Producto.php");

/**
 * Inserta un producto en la base de datos.
 *
 * @param Producto $producto El producto a insertar.
 * @return bool True si la inserción fue exitosa, false en caso contrario.
 */
function insertarProducto($producto): bool
{
    $c = conectar();
    crearTabla();
    $sql = "INSERT INTO Producto (id,nombre, descripcion,precio,stock) values (?, ?, ?, ?, ?)";
    $prepared = $c->prepare($sql);
    $prepared->bind_param("issii", $id, $nombre, $descripcion, $precio, $stock);
    $id = $producto->getId();
    $nombre = $producto->getNombre();
    $descripcion = $producto->getDescripcion();
    $precio = $producto->getPrecio();
    $stock = $producto->getStock();
    return $prepared->execute();
}

/**
 * Lee todos los productos de la base de datos.
 *
 * @return mysqli_result El resultado de la consulta.
 */
function leerProducto(){
    $c = conectar();
    $sql = "SELECT id,nombre, descripcion, precio, stock FROM Producto";
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
 * Actualiza un producto en la base de datos.
 *
 * @param Producto $p El producto a actualizar.
 * @return void
 */
function actualizarProducto($p)
{
    $c = conectar();
    $sql = "UPDATE Producto SET id = ?, nombre = ?, descripcion = ?, precio = ? , stock = ? WHERE id = ?";
    $ps = $c->prepare($sql);
    $ps->bind_param("issii", $id, $nombre, $descripcion, $precio, $stock);
    $id = $p->getId();
    $nombre = $p->getNombre();
    $descripcion = $p->getDescripcion();
    $precio = $p->getPrecio();
    $stock = $p->getStock();
    $ps->execute();
    $c->close();
}

/**
 * Elimina un producto de la base de datos.
 *
 * @param int $id El ID del producto a eliminar.
 * @return bool True si la eliminación fue exitosa, false en caso contrario.
 */
function eliminarProducto($id)
{
    $c = conectar();
    $sql = "DELETE FROM Producto WHERE id = ?";
    $ps = $c->prepare($sql);

    if (!$ps) {
        die("Error en la preparación de la consulta: " . $c->error);
    }

    $ps->bind_param("i", $id);
    $resultado = $ps->execute();

    if (!$resultado) {
        die("Error en la ejecución de la consulta: " . $ps->error);
    }

    $ps->close();
    $c->close();

    return $resultado;
}
?>