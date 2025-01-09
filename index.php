<?php
require_once("./views/header.php")
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
</head>

<body>
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <nav class="d-flex justify-content-center align-items-center">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./views/img/Banner_Pagina.jpg" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./views/img/Shotout.jpg" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <a href="https://www.youtube.com/watch?v=w_0a1_eqlwg">
                  <img src="./views/img/Teclado.png" class="d-block" alt="...">
                </a>

              </div>
            </div>
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

    <div class="row mt-5">
      <div class="col-12">
        <h2 class="text-center">Productos destacados</h2>
        <p class="text-center">Los productos mas comprados</p>
        <hr>
        <div class="hr-mg gallery d-flex justify-content-center align-items-center mt-5">
          <div class="gap-3 d-flex justify-content-between align-items-center flex-wrap" style="width: 1560px; height: 500px;">
            <div class="d-flex flex-column align-items-center" style="width: 300px;">
              <div class="radius img-container">
                <img src="./views/img/SinFondo/G413TKL.png" alt="" style="width: 200px; height: 150px;">
              </div>
              <div class="text-center mt-2" style="width: 100%; height: 200px;">
                <span class="text-muted">Teclado</span>
                <p style="word-wrap: break-word;">Logitech G413 TKL</p>
                <span class="text-decoration-line-through text-muted">149,99 &nbsp;€</span>
                <p class="fw-bold text-danger">109,99 &nbsp;€</p>
                <a href="./PaginaProducto.php">
                  <input type="button" class="btn btn-outline-primary" value="Comprar ahora" name="buy-product" id="buy-product">
                </a>
              </div>
            </div>
            <div class="d-flex flex-column align-items-center" style="width: 300px;">
              <div class="radius img-container">
                <img src="./views/img/SinFondo/RazerDeathAdderEssential.png" alt="" style="width: 200px; height: 150px;">
              </div>
              <div class="text-center mt-2" style="width: 100%; height: 200px;">
                <span class="text-muted">Ratón</span>
                <p style="word-wrap: break-word;">Razer DeathAdder Essential</p>
                <span class="text-decoration-line-through text-muted">79,99 &nbsp;€</span>
                <p class="fw-bold text-danger">49,99 &nbsp;€</p>
                <a href="./PaginaProducto.php">
                  <input type="button" class="btn btn-outline-primary" value="Comprar ahora" name="buy-product" id="buy-product">
                </a>
              </div>
            </div>
            <div class="d-flex flex-column align-items-center" style="width: 300px;">
              <div class="radius img-container">
                <img src="./views/img/SinFondo/NeoPC.png" alt="" style="width: 200px; height: 150px;">
              </div>
              <div class="text-center mt-2" style="width: 100%; height: 200px;">
                <span class="text-muted">Ordenador</span>
                <p style="word-wrap: break-word;">Neo PC</p>
                <span class="text-decoration-line-through text-muted">749,99 &nbsp;€</span>
                <p class="fw-bold text-danger">549,99 &nbsp;€</p>
                <a href="./PaginaProducto.php">
                  <input type="button" class="btn btn-outline-primary" value="Comprar ahora" name="buy-product" id="buy-product">
                </a>
              </div>
            </div>
            <div class="d-flex flex-column align-items-center" style="width: 300px;">
              <div class="radius img-container">
                <img src="./views/img/SinFondo/HPEliteDesk800G1.png" alt="" style="width: 200px; height: 150px;">
              </div>
              <div class="text-center mt-2" style="width: 100%; height: 200px;">
                <span class="text-muted">Ordenador</span>
                <p style="word-wrap: break-word;">Ordenador de sobremesa</p>
                <span class="text-decoration-line-through text-muted">399,99 &nbsp;€</span>
                <p class="fw-bold text-danger">199,99 &nbsp;€</p>
                <a href="./PaginaProducto.php">
                  <input type="button" class="btn btn-outline-primary" value="Comprar ahora" name="buy-product" id="buy-product">
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row h-25">
  <div class="col-12">
    <h2 class="text-center">Por qué comprar?</h2>
    <div class="d-flex justify-content-center gap-3 mt-5">
      <div class="bg-customWhite d-flex flex-column align-items-center" style="width: 320px;">
        <div class="text-center mt-2 d-flex flex-column justify-content-center" style="width: 220px; height: 180px;">
        <i class="fa-solid fa-rotate-right fa-2x"></i>
          <p class="fs-5 mt-2">14 días de desistimiento</p>
        </div>
      </div>
      <div class="bg-customWhite d-flex flex-column align-items-center" style="width: 320px;">
        <div class="text-center mt-2 d-flex flex-column justify-content-center" style="width: 220px; height: 180px;">
          <i class="fas fa-home fa-2x"></i>
          <p class="fs-5 mt-2">Envío gratuito</p>
        </div>
      </div>
      <div class="bg-customWhite d-flex flex-column align-items-center" style="width: 320px;">
        <div class="text-center mt-2 d-flex flex-column justify-content-center" style="width: 220px; height: 180px;">
        <i class="fa-regular fa-envelope fa-2x"></i>
          <p class="fs-5 mt-2">Soporte 24/7</p>
        </div>
      </div>
      <div class="bg-customWhite d-flex flex-column align-items-center" style="width: 320px;">
        <div class="text-center mt-2 d-flex flex-column justify-content-center" style="width: 220px; height: 180px;">
          <i class="fas fa-phone fa-2x"></i>
          <p class="fs-5 mt-2">Atención telefonica</p>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</body>

</html>
<?php
require_once("./views/footer.php")
?>