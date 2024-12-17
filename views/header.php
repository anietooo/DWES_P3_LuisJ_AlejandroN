<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
      body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      }
      
      .linkHover:hover{
        color: rgb(231, 218, 218) !important;
      }
    </style>
</head>
<body>
  <header class="container-fluid bg-primary py-3">
    <!--Row del header-->
    <div class="row">
      <!--Lista a la izquierda-->
      <div class="col-12 col-sm-10 mt-3">
        <ul class="list-unstyled d-flex justify-content-center justify-content-sm-start">
          <li class="fs-4 text-white">
            <a class="text-decoration-none text-white linkHover" href="#"><i class="fas fa-home"></i>&nbsp;Inicio</a>
          </li>
          <li class="fs-4 mx-3 text-white">
            <a class="text-decoration-none text-white linkHover" href="#"><i class="fa-solid fa-phone"></i>&nbsp;Contacto</a>
          </li>
          <li class="fs-4 mx-3 text-white">
            <a class="text-decoration-none text-white linkHover" href="/signup.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;Registrarse</a>
          </li>
        </ul>
      </div>
  
      <!--Lista a la derecha-->
      <div class="col-12 col-sm-2 mt-3">
        <ul class="list-unstyled d-flex justify-content-center justify-content-sm-end">
          <li class="fs-4 mx-3 text-white">
            <a class="text-decoration-none text-white linkHover d-flex align-items-center" href="/login.php">
              <i class="fa-solid fa-user me-2"></i>Login
            </a>
          </li>
          
          <li class="fs-4 mx-3 text-white">
            <a class="text-decoration-none text-white linkHover d-flex align-items-center" href="/database/usuarioDB.php">
              <i class="fa-solid fa-shop"></i>&nbsp;Pedido
            </a>
          </li>
          
          <li class="fs-4 mx-3 text-white">
            <a class="text-decoration-none text-white linkHover d-flex align-items-center" href="/database/usuarioDB.php">
              <i class="fa-brands fa-product-hunt"></i>&nbsp;Producto
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</body>
</html>