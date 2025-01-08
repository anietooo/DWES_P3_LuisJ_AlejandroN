SIGUIENTE DIA:

Pagina de pedido
Realizar el index
Diseño de la pagina
Agregar JS


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

SELECT * FROM Usuario;



<body>
    <form class="container align-self-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Nombre:* <input type="text" name="nombre"
        class="<?php if(!empty($nombreErr)) echo "error"; ?>"
        value="<?php echo htmlspecialchars($nombre); ?>">
        <label><?php echo $nombreErr; ?></label>
        <br><br>
        Email:* <input type="email" name="email"
        class="<?php if(!empty($emailErr)) echo "error"; ?>"
        value="<?php echo htmlspecialchars($email); ?>">
        <label><?php echo $emailErr; ?></label>
        <br><br>
        Contraseña:* <input type="password" name="password1"
        class="<?php if(!empty($password1Err)) echo "error"; ?>"
        value="">
        <label><?php echo $password1Err; ?></label>
        <br><br>
        Repetir contraseña:* <input type="password" name="password2"
        class="" value="">
        <label><?php echo $password1Err; ?></label>
        <br><br>
        <input class="btn btn-primary" type="submit" value="Enviar">
        <input class="btn btn-secondary" type="reset" value="Limpiar formulario">
    </form>
</body>