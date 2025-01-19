EMPRESA DEDICADA A VENTA DE ORDENADORES ONLINE:

La aplicación web será una plataforma de gestión para una empresa de ordenadores.
Permitirá a los usuarios registrados explorar un catálogo de Ordenadores.
Ademas podremos gestionar los usuarios (crear, leer, actualizar y eliminar), y realizar operaciones básicas de administración. El sistema incluirá un registro e inicio de sesión para los usuarios y tambien hemos creado un usuario que podra desde la web eliminar Pedidos y Productos.

# Base de datos utilizada:
--------------------------
CREATE DATABASE DWES_P3_LuisJ_AlejandroN;
USE DWES_P3_LuisJ_AlejandroN;

CREATE TABLE Usuario (
    email VARCHAR(255) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    password1 VARCHAR(255) NOT NULL,
    admin1 TINYINT(1) NOT NULL DEFAULT 0
);


CREATE TABLE Pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuarioId VARCHAR(255),
    fecha DATETIME,
    FOREIGN KEY (usuarioId) REFERENCES Usuario(email)
);

CREATE TABLE Producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(500),
    precio FLOAT,
    stock INT
);

CREATE TABLE PedidoProducto (
    idPedido INT,
    idProducto INT,
    PRIMARY KEY (idPedido, idProducto),
    FOREIGN KEY (idPedido) REFERENCES Pedido(id),
    FOREIGN KEY (idProducto) REFERENCES Producto(id)
);


SELECT * FROM pedidoproducto;
SELECT * FROM usuario;
SELECT * FROM producto;
SELECT * FROM pedido;

----------------------------------------

Modelo de Datos (UML de Clases)

Usuario (Usuario): Representa a un usuario registrado en la aplicación.
Producto (Producto): Representa un componente o accesorio informático en la tienda.
Pedido (Pedido): Representa una orden de compra que asocia un usuario con los productos comprados.

Características de las Clases:

Usuario (clase base):
Atributos: nombre, email, contraseña (hash).
Métodos: registrarUsuario(), iniciarSesion().
Producto:
Atributos: id, nombre, descripcion, precio, stock.
Métodos: crearProducto(), actualizarProducto(), eliminarProducto().
Pedido:
Atributos: id, usuarioId, fecha, productos (lista de productos).
Métodos: crearPedido(), leerPedido(), actualizarPedido().

--------------------------------------
# Modelo Entidad-Relación
Modelo Entidad Relacion en el siguiente enlace:

![Modelo ER](./admin.php) PONER RUTA A IMG DEL PROYECTO

--------------------------------------


POO:
Producto-clase Abstracta
-Ordenador-ram
-Monitor-hercios
-Periferico
Usuario
Pedido
