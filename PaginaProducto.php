<?php
include_once("./database/conexion.php");
include_once("./database/productoDB.php");
include_once("./model/Ordenador.php");
include_once("./model/Monitor.php");
require_once("./views/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Producto</title>
</head>
<style>
    body {
        display: grid;
        height: 100dvh;
        grid-template-rows: auto 1fr auto;
    }

    iframe {
        display: none;
        /* Oculta el iframe */
    }
</style>

<body>
    <?php
    // insertarProducto(new Ordenador(8, 1, "HP EliteDesk 800 G1", "Potente productividad:Esta Ordenador Portátil con Win 11 de 14 pulgadas está equipada con el rendimiento del procesador", 500, 100));
    // insertarProducto(new Ordenador(16, 2, "Ordenador", "Ordenador de sobremesa", 500, 10));
    // insertarProducto(new Ordenador(32, 3, "Neo PC", "para ofrecer una muy buena experiencia gaming, equipado con un procesador de ordenador AMD Ryzen 5 4600G que en modo turbo llega a 4.2 GHz, y una memoria RAM de 8 GB con una velocidad de 3200 MHz y con una potente tarjeta grafica Radeon Vega 7, te ofrecerá una potencia informática muy adecuada para navegar, jugar utilizar programas de edición de vídeo, imágenes y realizar múltiples tareas sin contratiempos.", 700, 42));

    // insertarProducto(new Monitor(170, 4, "ASUS VG27AQ1A", "Monitor IPS WQHD (2560x1440) de 27” con 170 Hz de refresco* diseñado para gamers profesionales y disfrutar de una experiencia de juego envolvente.La tecnología ASUS Extreme Low Motion Blur (ELMB) elimina los defectos gráficos y hacen que las escenas borrosas cobren nitidez.", 100, 5));
    // insertarProducto(new Monitor(180, 5, "LG 24GS50F-B", "Cuando juegas a 180 Hz y 1 ms, cambia la historia.Frecuencia de actualización de 180 Hz y 1ms (GtG) de velocidad de respuesta. Disfruta de una experiencia visual más inmersiva y con colores vibrantes gracias a NTSC 72%. La tecnología AMD FreeSync minimiza la fragmentación de la imagen disfrutando de movimientos más fluidos.", 150, 5));
    // insertarProducto(new Monitor(360, 6, "BenQ ZOWIE XL2411P", "Monitor de 1 ms con una frecuencia de refresco de 144 Hz que ofrece una experiencia muy suave en juegos de disparos en primera persona (FPS) y juegos de campo de batalla multijugador en línea (MOBA) ", 200, 5));

    // insertarProducto(new Periferico("Raton", "Razer", 7, "DeathAdder Essential", "Gran resistencia en un ratón de juegos diseñado para durar: El Razer DeathAdder Essential cuenta con una gran durabilidad para mantener un alto rendimiento de calidad que aguante las intensas sesiones de juego, sus 5 botones Hyperesponse se han probado en el laboratorio para asegurar una durabilidad de hasta 10 millones de clics para asegurar que el Razer DeathAdder Essential es el ratón más resistente", 70, 55));
    // insertarProducto(new Periferico("Teclado", " Corsair", 8, "K70 RGB PRO", "La leyenda continúa: El K70 RGB PRO conserva los elementos icónicos del galardonado K70 RGB con una estructura de aluminio duradera, interruptores de teclas mecánicos CHERRY MX y retroiluminación RGB.", 70, 55));
    // insertarProducto(new Periferico("Teclado", "Logitech", 9, "G413 TKL", "Que tus habilidades gaming pasen a otro nivel: Logitech G413 TKL SE es un teclado con diez teclas menos con funciones para gaming con la resistencia y el rendimiento necesarios para competir", 65, 105));
    ?>

    <div class="container mt-5">
        <div class="row">
            <?php
            $productos = leerProducto();
            foreach ($productos as $producto) {
                // Define la URL de la imagen para cada producto
                $imagenUrl = "";
                switch ($producto['id']) {
                    case 1:
                        $imagenUrl = "./views/img/HPEliteDesk800G1.webp";
                        break;
                    case 2:
                        $imagenUrl = "ruta/a/imagen2.webp"; // Poner una foto aqui
                        break;
                    case 3:
                        $imagenUrl = "./views/img/NeoPC.webp";
                        break;
                    case 4:
                        $imagenUrl = "./views/img/ASUSVG27AQ1A.webp";
                        break;
                    case 5:
                        $imagenUrl = "./views/img/LG24GS50F-B.webp";
                        break;
                    case 6:
                        $imagenUrl = "./views/img/BenQZOWIEXL2411P.webp";
                        break;
                    case 7:
                        $imagenUrl = "./views/img/RazerDeathAdderEssential.webp";
                        break;
                    case 8:
                        $imagenUrl = "./views/img/K70RGBPRO.webp";
                        break;
                    case 9:
                        $imagenUrl = "./views/img/G413TKL.webp";
                        break;
                    default:
                        $imagenUrl = "ruta/a/imagen_default.jpg";
                        break;
                }

                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<img src="' . $imagenUrl . '" class="card-img-top" alt="' . $producto['nombre'] . '">'; // Añadir imagen
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
                echo '<p class="card-text">' . $producto['descripcion'] . '</p>';
                echo '<p class="card-text">Precio: ' . $producto['precio'] . '€</p>';
                echo '<p class="card-text">Stock: ' . ($producto['stock'] ? "Disponible" : "No disponible") . '</p>'; // Mostrar el mensaje de stock
                echo '<form action="PaginaPedido.php" method="post" target="hidden_iframe">';
                echo '<input type="hidden" name="id" value="' . $producto['id'] . '">';
                echo '<input type="hidden" name="nombre" value="' . $producto['nombre'] . '">';
                echo '<input type="hidden" name="descripcion" value="' . $producto['descripcion'] . '">';
                echo '<input type="hidden" name="precio" value="' . $producto['precio'] . '">';
                echo '<input type="hidden" name="stock" value="' . $producto['stock'] . '">';
                echo '<button type="submit" class="btn btn-primary">Añadir producto</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <iframe name="hidden_iframe"></iframe> <!-- Iframe oculto -->
</body>

</html>
<?php
require_once("./views/footer.php");
?>