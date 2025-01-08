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
            height: 100vh;
            grid-template-rows: auto 1fr auto;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <nav class="d-flex justify-content-center align-items-center">
            <img src="./views/img/Banner_Pagina.jpg" alt="" />
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="gallery d-flex justify-content-center align-items-center gap-2">
            <img src="./views/img/MejoresPortatiles.webp" alt="" style="width: auto; height: 350px" />
            <img src="./views/img/MejoresPortatiles.webp" alt="" style="width: auto; height: 350px" />
            <img src="./views/img/MejoresPortatiles.webp" alt="" style="width: auto; height: 350px" />
            <img src="./views/img/MejoresPortatiles.webp" alt="" style="width: auto; height: 350px" />
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php
require_once("./views/footer.php")
?>