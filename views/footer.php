<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
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
    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <footer class="d-flex justify-content-around mt-2">
                <!-- Lista Usuario -->
                <ul class="list-unstyled">
                    <li class="fw-bold">Usuario</li>
                    <li><a class="text-decoration-none text-white linkHover" href="#">Mi cuenta</a></li>
                    <li><a class="text-decoration-none text-white linkHover" href="#">Mis datos</a></li>
                </ul>

                <!-- Lista Pedido -->
                <ul class="list-unstyled">
                    <li class="fw-bold boldHover">Pedido</li>
                    <li><a class="text-decoration-none text-white linkHover" href="#">Rastrear mi pedido</a></li>
                    <li><a class="text-decoration-none text-white linkHover" href="#">Mis pedidos</a></li>
                </ul>

                <!-- Lista Producto -->
                <ul class="list-unstyled">
                    <li class="fw-bold">Producto</li>
                    <li><a class="text-decoration-none text-white linkHover" href="#">Productos mas comprados</a></li>
                    <li><a class="text-decoration-none text-white linkHover" href="#">Mis productos guardados</a></li>
                </ul>

                <!-- Lista Comunidad -->
                <ul class="list-unstyled">
                    <li class="fw-bold">Comunidad</li>
                    <!--LOGOS DE REDES SOCIALES-->
                    <div class="d-flex justify-content-around">
                        <!--LOGO INSTAGRAM-->
                        <li>
                            <a class="text-decoration-none text-white linkHover" href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>

                        <!--LOGO X-->
                        <li>
                            <a class="text-decoration-none text-white linkHover" href="#">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>

                        <!--LOGO TIKTOK-->
                        <li>
                            <a class="text-decoration-none text-white linkHover" href="#">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                        </li>
                    </div>
                    <div class="d-flex justify-content-around">
                        <!--LOGO FACEBOOK-->
                        <li>
                            <a class="text-decoration-none text-white linkHover" href="#">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </li>

                        <!--LOGO TELEGRAM-->
                        <li>
                            <a class="text-decoration-none text-white linkHover" href="#">
                                <i class="fa-brands fa-telegram"></i>
                            </a>
                        </li>

                        <!--LOGO YOUTUBE-->
                        <li>
                            <a class="text-decoration-none text-white linkHover" href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    </div>
                </ul>
            </footer>
        </div>
    </div>
</body>
</html>