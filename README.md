EMPRESA DEDICADA A VENTA DE ORDENADORES ONLINE:

La aplicación web será una plataforma de gestión para una empresa de ordenadoreS.
Permitirá a los usuarios registrados explorar un catálogo de Ordenadores.
Ademas podremos gestionar los usuarios (crear, leer, actualizar y eliminar), y realizar operaciones básicas de administración. El sistema incluirá un registro e inicio de sesión para los usuarios.


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
        
        
Modelo Entidad-Relación

Usuarios:
        nombre
        email (PK)
        contraseña (hash)

Productos:
        id (PK)
        nombre
        descripcion
        precio
        stock

Pedidos:
        id (PK)
        usuarioId (FK -> Usuarios.id)
        fecha

PedidoProducto:
        idPedido (FK) — referencia a la clase Pedido.
        idProducto (FK) — referencia a la clase Producto.
        cantidad — para manejar la cantidad de productos en ese pedido.



UML:
Usuario
        -nombre
        -email
        -contraseña
        +registrarUsuario()
        +iniciarSesion()

Pedido:
        -id
        -usuarioId
        -fecha
        -productos:List<Producto>
        +crearPedido()
        +leerPedido()
        +actualizarPedido()

Producto (abstract)
        -id
        -nombre
        -descripcion
        -precio
        -stock
        +crearProducto()
        +actualizarProducto()
        +eliminarProducto()
   HIJOS:
        -Ordenador:
                -ram

        -Monitor:
                -hz
                
        -Periferico


POO:
Producto-clase Abstracta
        -Ordenador-ram
        -Monitor-hercios
        -Periferico
Usuario
Pedido
