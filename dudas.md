Hay que ver si se usan las imagenes con fondo (sino borrarlas)
EN pedido -----> private ?int $id; (Que es la interrogacion)

CREATE DATABASE DWES_P3_LuisJ_AlejandroN;
USE DWES_P3_LuisJ_AlejandroN;

CREATE TABLE Usuario (
    email VARCHAR(255) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    password1 VARCHAR(255) NOT NULL
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


SELECT * FROM PedidoProducto;
SELECT * FROM Usuario;
SELECT * FROM Producto;
SELECT * FROM Pedido;