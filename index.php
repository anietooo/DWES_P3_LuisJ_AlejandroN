<?php
session_start();
require_once("./views/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./views/index.css">
  <style>
    .zoom-text:hover {
      transform: scale(1.1);
      transition: transform 0.3s ease-in-out;
    }
  </style>
</head>

<body>
  <div class="container-fluid mt-5">
    <!-- Carousel -->
    <div class="row">
      <div class="col-12">
        <nav class="d-flex justify-content-center align-items-center zoom-text">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- Botones de abajo (Indicadores) -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- Imagenes del carousel-->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./views/img/Banner_Pagina.jpg" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./views/img/Shotout.jpg" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <a href="https://www.youtube.com/watch?v=w_0a1_eqlwg">
                  <img src="./views/img/Teclado.png" class="d-block w-100 img-fluid" alt="...">
                </a>
              </div>
            </div>
            <!-- Botones de control del carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </nav>
      </div>
    </div>

    <!-- Productos Destacados -->
    <div class="row mt-5">
      <div class="col-12 text-center">
        <h2>Productos destacados</h2>
        <p>Los productos más comprados</p>
        <hr>
      </div>
    </div>
    <!-- Galería de Productos Destacados -->
    <div class="row d-flex justify-content-center mt-4">
      <div class="gallery d-flex justify-content-center align-items-center flex-wrap gap-3">
        <!-- Producto 1 -->
        <div class="d-flex flex-column align-items-center" style="width: 300px;">
          <div class="radius img-container">
            <img src="./views/img/SinFondo/G413TKL.png" alt="" style="width: 200px; height: 150px;">
          </div>
          <div class="text-center mt-2 zoom-text" style="width: 100%; height: 200px;">
            <span class="text-muted">Teclado</span>
            <p style="word-wrap: break-word;">Logitech G413 TKL</p>
            <span class="text-decoration-line-through text-muted">149,99 &nbsp;€</span>
            <p class="fw-bold text-danger">109,99 &nbsp;€</p>
            <a href="./PaginaProducto.php">
              <input type="button" class="btn btn-outline-primary" value="Comprar ahora">
            </a>
          </div>
        </div>
        <!-- Producto 2 -->
        <div class="d-flex flex-column align-items-center" style="width: 300px;">
          <div class="radius img-container">
            <img src="./views/img/SinFondo/RazerDeathAdderEssential.png" alt="" style="width: 200px; height: 150px;">
          </div>
          <div class="text-center mt-2 zoom-text" style="width: 100%; height: 200px;">
            <span class="text-muted">Ratón</span>
            <p style="word-wrap: break-word;">Razer DeathAdder Essential</p>
            <span class="text-decoration-line-through text-muted">79,99 &nbsp;€</span>
            <p class="fw-bold text-danger">49,99 &nbsp;€</p>
            <a href="./PaginaProducto.php">
              <input type="button" class="btn btn-outline-primary" value="Comprar ahora">
            </a>
          </div>
        </div>
        <!-- Producto 3 -->
        <div class="d-flex flex-column align-items-center" style="width: 300px;">
          <div class="radius img-container">
            <img src="./views/img/SinFondo/NeoPC.png" alt="" style="width: 200px; height: 150px;">
          </div>
          <div class="text-center mt-2 zoom-text" style="width: 100%; height: 200px;">
            <span class="text-muted">Ordenador</span>
            <p style="word-wrap: break-word;">Neo PC</p>
            <span class="text-decoration-line-through text-muted">749,99 &nbsp;€</span>
            <p class="fw-bold text-danger">549,99 &nbsp;€</p>
            <a href="./PaginaProducto.php">
              <input type="button" class="btn btn-outline-primary" value="Comprar ahora">
            </a>
          </div>
        </div>
        <!-- Producto 4 -->
        <div class="d-flex flex-column align-items-center" style="width: 300px;">
          <div class="radius img-container">
            <img src="./views/img/SinFondo/HPEliteDesk800G1.png" alt="" style="width: 200px; height: 150px;">
          </div>
          <div class="text-center mt-2 zoom-text" style="width: 100%; height: 200px;">
            <span class="text-muted">Ordenador</span>
            <p style="word-wrap: break-word;">Ordenador de sobremesa</p>
            <span class="text-decoration-line-through text-muted">399,99 &nbsp;€</span>
            <p class="fw-bold text-danger">199,99 &nbsp;€</p>
            <a href="./PaginaProducto.php">
              <input type="button" class="btn btn-outline-primary" value="Comprar ahora">
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Porque Comprar -->
    <div class="row h-25 mt-5">
      <div class="col-12">
        <h2 class="text-center">¿Por qué comprar?</h2>
        <!-- Cajitas de por qué comprar con iconos -->
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-5 ">
          <!-- Caja 1 -->
          <div class="bg-light p-4 text-center zoom-text" style="width: 280px;">
            <i class="fa-solid fa-rotate-right fa-2x"></i>
            <p class="fs-5 mt-3">14 días de desistimiento</p>
          </div>
          <!-- Caja 2 -->
          <div class="bg-light p-4 text-center zoom-text" style="width: 280px;">
            <i class="fas fa-home fa-2x"></i>
            <p class="fs-5 mt-3">Envío gratuito</p>
          </div>
          <!-- Caja 3 -->
          <div class="bg-light p-4 text-center zoom-text" style="width: 280px;">
            <i class="fa-regular fa-envelope fa-2x"></i>
            <p class="fs-5 mt-3">Soporte 24/7</p>
          </div>
          <!-- Caja 4 -->
          <div class="bg-light p-4 text-center zoom-text" style="width: 280px;">
            <i class="fas fa-phone fa-2x"></i>
            <p class="fs-5 mt-3">Atención telefónica</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Script para que al pasar el cursor por encima de las imagenes
   aumente la escala y haga una pequeña transición. Al quitar el cursor de
   encima vuelve como antes -->
  <script>
    document.querySelectorAll('.gallery .img-container').forEach(item => {
      item.addEventListener('mouseover', () => {
        item.style.transform = 'scale(1.1)';
        item.style.transition = 'transform 0.3s ease-in-out';
      });
      item.addEventListener('mouseout', () => {
        item.style.transform = 'scale(1)';
      });
    });
  </script>
</body>

</html>
<?php
require_once("./views/footer.php")
?>