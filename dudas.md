                                                                        DUDAS
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------

-Como crear una lista en el objeto padre Producto

CREATE TABLE Usuario (
    email VARCHAR(255) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
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
    descripcion TEXT,
    precio FLOAT,
    stock BOOLEAN
);

CREATE TABLE PedidoProducto (
    idPedido INT,
    idProducto INT,
    cantidad INT,
    PRIMARY KEY (idPedido, idProducto),
    FOREIGN KEY (idPedido) REFERENCES Pedido(id),
    FOREIGN KEY (idProducto) REFERENCES Producto(id)
);
