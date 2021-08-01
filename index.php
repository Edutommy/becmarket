<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEC Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/logito.png" type="image/x-icon">
</head>
<body style="background-image: url(img/fondo.jpg);">
    <!-- BARRA DE NAVEGACION -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo2.png" alt="" width="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pe-5">
                        <a href="registro.php" class="btn btn-outline-light">REGISTRARSE</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-outline-light">INICIAR SESION</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- BARRA DE NAVEGACION -->

    <!-- SECCIÓN 1 -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-sm pt-5" style="background-color: rgba(255, 255, 255, 0.55);">
                <h2 class="display-5">Lorem ipsum dolor sit amet</h2>
                <p class="lead">
                    Informacion general de la aplicación junto con algunos de los negocios ascociados
                </p>
                <div class="row pt-3">
                    <div class="col-sm py-2" style="max-width: 140px;">
                        <img class="card-img" src="img/asd.jpg" alt="">
                    </div>
                    <div class="col-sm">
                        <p class="h6">LOREM IPSUM DOLOR SIT AMET</p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper condimentum ultrices.
                        </p>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-sm py-2" style="max-width: 140px;">
                        <img class="card-img" src="img/asd.jpg" alt="">
                    </div>
                    <div class="col-sm">
                        <p class="h6">LOREM IPSUM DOLOR SIT AMET</p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper condimentum ultrices.
                        </p>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-sm py-2" style="max-width: 140px;">
                        <img class="card-img" src="img/asd.jpg" alt="">
                    </div>
                    <div class="col-sm">
                        <p class="h6">LOREM IPSUM DOLOR SIT AMET</p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper condimentum ultrices.
                        </p>
                        <a href="registro.php" class="btn btn-dark mt-3">REGISTRATE AQUÍ</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div id="carouselExampleControls" class="carousel slide m-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="uploads/papas.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                        <img src="uploads/sushi.jpg" class="d-block w-100" alt="" style="max-height: 550px;">
                        </div>
                        <div class="carousel-item">
                        <img src="uploads/pizza.jpg" class="d-block w-100" alt="" style="max-height: 550px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>    
    </div>
    <!-- FIN SECCIÓN 1 -->

    <!-- SECCION 2 -->
    <div class="container">
        <div class="card-group">
            <div class="card text-center px-5 bg-dark">
                <div class="card-body py-5">
                    <h5 class="card-title text-light display-6 pt-5"><strong>Registra tu negocio</strong></h5>
                    <p class="card-text text-light lead pt-5 px-4">
                        Aca poner puede ser lo de los vendedores, lo que pueden hacer 
                        y eso aksjhd info general sobre las principales funcionalidades pa los vendedores
                        Y el boton que mande un registro para ellos
                    </p>
                    <a href="registronegocio.php" class="btn btn-light mt-4 mb-4"><strong>REGISTRA TU NEGOCIO</strong></a>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title display-6 pt-5"><strong>Trabaja como repartidor</strong></h5>
                    <p class="card-text lead pt-5 px-4">
                        Aca lo mismo que al lado pero para los repartidores, poner como funciones y ventajas no se xd
                        Y el boton que mande el registro para ellos xd
                    </p>
                    <a href="registrorepartidor.php" class="btn btn-dark mt-4 mb-4"><strong>REGISTRATE</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN SECCION 2 -->

    <!-- FOOTER -->
    <?php include_once 'footer.php' ?>
    <!-- FIN FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/40e29f2951.js" crossorigin="anonymous"></script>

</body>
</html>