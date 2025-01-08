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
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <style>
        body {
            display: grid;
            height: 130vh;
            grid-template-rows: auto 1fr auto;
            margin: 0;
        }

        .carousel-item {
        transition: transform 0.5s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .radius{
      border-radius: 15px;
    }

    .hr-mg{
      margin-top: -50px;
    }

    .carousel{
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    </style>
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
                  <img src="./views/img/Teclado.png" class="d-block" alt="...">
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
          <div class="hr-mg gallery d-flex justify-content-center align-items-center">
            <div class=" gap-3 d-flex justify-content-between align-items-center" style="width: 1560px; height: 500px;">
            <div class="bg-info radius" style="width: 300px; height: 250px;">
                <img src="./views/img/SinFondo/G413TKL.png" alt="" style="width: 200px; height: 150px;">
                <span class="text-muted">Portatiles</span>
                <p>Descripcion del producto</p>
                <span class="text-decoration-line-through text-muted">749,99 &nbsp;€</span>
                <p class="fw-bold text-danger">549,99 &nbsp;€</p>
              </div>
              <div class="bg-info radius" style="width: 300px; height: 250px;">
                <img src="./views/img/SinFondo/RazerDeathAdderEssential.png" alt="" style="width: 200px; height: 150px;">
                <span class="text-muted">Portatiles</span>
                <p>Descripcion del producto</p>
                <span class="text-decoration-line-through text-muted">749,99 &nbsp;€</span>
                <p class="fw-bold text-danger">549,99 &nbsp;€</p>
              </div>
              <div class="bg-info radius" style="width: 300px; height: 250px;">
                <img src="./views/img/SinFondo/NeoPC.png" alt="" style="width: 200px; height: 150px;">
                <span class="text-muted">Portatiles</span>
                <p>Descripcion del producto</p>
                <span class="text-decoration-line-through text-muted">749,99 &nbsp;€</span>
                <p class="fw-bold text-danger">549,99 &nbsp;€</p>
              </div>
              <div class="bg-info radius" style="width: 300px; height: 250px;">
                <img src="./views/img/SinFondo/HPEliteDesk800G1.png" alt="" style="width: 200px; height: 150px;">
                <span class="text-muted">Portatiles</span>
                <p>Descripcion del producto</p>
                <span class="text-decoration-line-through text-muted">749,99 &nbsp;€</span>
                <p class="fw-bold text-danger">549,99 &nbsp;€</p>
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