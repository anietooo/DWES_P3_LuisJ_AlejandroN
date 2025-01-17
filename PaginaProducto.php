<?php
session_start();
include_once("./database/conexion.php");
include_once("./database/productoDB.php");
include_once("./model/Ordenador.php");
include_once("./model/Monitor.php");
require_once("./views/header.php");
require_once("./model/Periferico.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            display: grid;
            height: 150dvh;
            grid-template-rows: auto 1fr auto;
        }

        iframe {
            display: none;
            /* Oculta el iframe */
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .product-item {
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            transform: translateY(50px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .product-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .product-item img {
            max-width: 100%;
            height: auto;
        }

        .product-item-btn-animation:hover {
        background-color: #f0f0f0;
        transform: scale(1.05);
        transition: all 0.3s ease;
    }
    </style>
</head>

<body>
    <!--
     Inserción de los productos en la bdd, estan comentados porque lo ejecutamos una vez y ya para
     que no se duplique
    -->
    <?php
    //insertarProducto(new Ordenador(8, 1, "HP EliteDesk 800 G1", "Potente productividad:Esta Ordenador Portátil con Win 11 de 14 pulgadas está equipada con el rendimiento del procesador", 500, 100));
    //insertarProducto(new Ordenador(32, 2, "PcCom Ready", "Intel Core i7-14700KF / 32GB / 1TB SSD / RTX 4060", 1328, 10));
    //insertarProducto(new Ordenador(32, 3, "Neo PC", "para ofrecer una muy buena experiencia gaming, equipado con un procesador de ordenador AMD Ryzen 5 4600G que en modo turbo llega a 4.2 GHz, y una memoria RAM de 8 GB con una velocidad de 3200 MHz y con una potente tarjeta grafica Radeon Vega 7, te ofrecerá una potencia informática muy adecuada para navegar, jugar utilizar programas de edición de vídeo, imágenes y realizar múltiples tareas sin contratiempos.", 700, 42));

    //insertarProducto(new Monitor(170, 4, "ASUS VG27AQ1A", "Monitor IPS WQHD (2560x1440) de 27” con 170 Hz de refresco* diseñado para gamers profesionales y disfrutar de una experiencia de juego envolvente.La tecnología ASUS Extreme Low Motion Blur (ELMB) elimina los defectos gráficos y hacen que las escenas borrosas cobren nitidez.", 100, 5));
    //insertarProducto(new Monitor(180, 5, "LG 24GS50F-B", "Cuando juegas a 180 Hz y 1 ms, cambia la historia.Frecuencia de actualización de 180 Hz y 1ms (GtG) de velocidad de respuesta. Disfruta de una experiencia visual más inmersiva y con colores vibrantes gracias a NTSC 72%. La tecnología AMD FreeSync minimiza la fragmentación de la imagen disfrutando de movimientos más fluidos.", 150, 5));
    //insertarProducto(new Monitor(360, 6, "BenQ ZOWIE XL2411P", "Monitor de 1 ms con una frecuencia de refresco de 144 Hz que ofrece una experiencia muy suave en juegos de disparos en primera persona (FPS) y juegos de campo de batalla multijugador en línea (MOBA) ", 200, 5));

    //insertarProducto(new Periferico("Raton", "Razer", 7, "DeathAdder Essential", "Gran resistencia en un ratón de juegos diseñado para durar: El Razer DeathAdder Essential cuenta con una gran durabilidad para mantener un alto rendimiento de calidad que aguante las intensas sesiones de juego, sus 5 botones Hyperesponse se han probado en el laboratorio para asegurar una durabilidad de hasta 10 millones de clics para asegurar que el Razer DeathAdder Essential es el ratón más resistente", 70, 55));
    //insertarProducto(new Periferico("Teclado", " Corsair", 8, "K70 RGB PRO", "La leyenda continúa: El K70 RGB PRO conserva los elementos icónicos del galardonado K70 RGB con una estructura de aluminio duradera, interruptores de teclas mecánicos CHERRY MX y retroiluminación RGB.", 70, 0));
    //insertarProducto(new Periferico("Teclado", "Logitech", 9, "G413 TKL", "Que tus habilidades gaming pasen a otro nivel: Logitech G413 TKL SE es un teclado con diez teclas menos con funciones para gaming con la resistencia y el rendimiento necesarios para competir", 65, 105));
    ?>

    <div class="container mt-5">
        <div class="product-grid">
            <?php
            $productos = leerProducto();
            foreach ($productos as $producto) {
                // Switch para definir la imagen para cada producto por id
                // Sabemos que lo mejor seria meterlo en la bdd pero como eran
                // pocas imagenes hemos decidido hacerlo así
                $imagenUrl = "";
                switch ($producto['id']) {
                    case 1:
                        $imagenUrl = "./views/img/SinFondo/HPEliteDesk800G1.png";
                        break;
                    case 2:
                        $imagenUrl = "./views/img/SinFondo/Ordenador.png"; // Poner una foto aqui
                        break;
                    case 3:
                        $imagenUrl = "./views/img/SinFondo/NeoPC.png";
                        break;
                    case 4:
                        $imagenUrl = "./views/img/SinFondo/ASUSVG27AQ1A.png";
                        break;
                    case 5:
                        $imagenUrl = "./views/img/SinFondo/LG24GS50F-B.png";
                        break;
                    case 6:
                        $imagenUrl = "./views/img/SinFondo/BenQZOWIEXL2411P.png";
                        break;
                    case 7:
                        $imagenUrl = "./views/img/SinFondo/RazerDeathAdderEssential.png";
                        break;
                    case 8:
                        $imagenUrl = "./views/img/SinFondo/K70RGBPRO.png";
                        break;
                    case 9:
                        $imagenUrl = "./views/img/SinFondo/G413TKL.png";
                        break;
                    default:
                        $imagenUrl = "ruta/a/imagen_default.jpg";
                        break;
                }

                // Si existe stock se pondra la clase btn-primary (azul) y el texto Añadir producto
                // Si no hay stock se activará la clase btn-secondary (gris) y el texto No disponible
                $botonClase = $producto['stock'] > 0 ? 'btn-primary' : 'btn-secondary';
                $botonTexto = $producto['stock'] > 0 ? 'Añadir producto' : 'No disponible';

                // Acceso a los datos para sacarlos por pantalla con echo
                echo '<div class="product-item">';
                echo '<img src="' . $imagenUrl . '" alt="' . $producto['nombre'] . '">';
                echo '<h3>' . $producto['nombre'] . '</h3>';
                echo '<p>' . $producto['descripcion'] . '</p>';
                echo '<p>Precio: ' . $producto['precio'] . '€</p>';
                echo '<p>Stock: ' . ($producto['stock'] ? "Disponible" : "No disponible") . '</p>'; // Mostrar el mensaje de stock
                echo '<form action="PaginaPedido.php" method="post" target="hidden_iframe">';
                echo '<input type="hidden" name="id" value="' . $producto['id'] . '">';
                echo '<input type="hidden" name="nombre" value="' . $producto['nombre'] . '">';
                echo '<input type="hidden" name="descripcion" value="' . $producto['descripcion'] . '">';
                echo '<input type="hidden" name="precio" value="' . $producto['precio'] . '">';
                echo '<input type="hidden" name="stock" value="' . $producto['stock'] . '">';
                // Botón para añadir producto si hay stock, si no hay stock el boton estará deshabilitado
                echo '<button type="submit" name="add_product" class="btn product-item-btn-animation ' . $botonClase . '" ' . ($producto['stock'] > 0 ? '' : 'disabled') . '>';
                echo $botonTexto;
                echo '</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <iframe name="hidden_iframe"></iframe> <!-- Iframe oculto -->
    <script>
        // Script que saca una alerta en caso de que le des al boton de añadir producto
        // Selecciona todos los formularios dentro de los productos
        const productForms = document.querySelectorAll('.product-item form');

        productForms.forEach(form => {
            form.addEventListener('submit', (event) => {
                Swal.fire({
                    title: '¡Producto añadido!',
                    text: 'El producto se ha añadido al carrito correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    form.submit(); // Envía el formulario después de cerrar la alerta
                });
            });
        });

        // Script para el scroll, hace una animacion de los prodcutos de abajo cuando vas scrolleando
        window.addEventListener('scroll', () => {
            const items = document.querySelectorAll('.product-item');
            const triggerBottom = window.innerHeight / 5 * 4;

            items.forEach(item => {
                const itemTop = item.getBoundingClientRect().top;

                if (itemTop < triggerBottom) {
                    item.classList.add('visible');
                } else {
                    item.classList.remove('visible');
                }
            });
        });
    </script>
</body>

</html>
<?php
require_once("./views/footer.php");
?>