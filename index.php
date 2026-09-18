<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AutoMarket</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php">
                🚗 AutoMarket
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="productos/autos.php">
                            🚘 Autos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="productos/repuestos.php">
                            🔧 Repuestos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            🛒 Carrito (0)
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            Ingresar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">
                            Registrarse
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


    <!-- PRESENTACIÓN -->

    <section class="bg-primary text-white py-5">

        <div class="container text-center">

            <h1 class="display-4 fw-bold">
                AutoMarket
            </h1>

            <p class="lead">
                Venta de autos y repuestos.
            </p>

            <a href="productos/autos.php" class="btn btn-light btn-lg">
                Ver productos
            </a>

        </div>

    </section>


    <!-- CATEGORÍAS -->

    <section class="container py-5">

        <h2 class="text-center mb-4">
            Categorías
        </h2>

        <div class="row g-4">


            <!-- AUTOS -->

            <div class="col-md-6">

                <div class="card h-100 shadow">

                    <div class="card-body text-center">

                        <div class="fs-1">
                            🚘
                        </div>

                        <h3 class="card-title">
                            Autos
                        </h3>

                        <p class="card-text">
                            Encontrá autos nuevos y usados.
                        </p>

                        <a href="productos/autos.php"
                           class="btn btn-primary">
                            Ver autos
                        </a>

                    </div>

                </div>

            </div>


            <!-- REPUESTOS -->

            <div class="col-md-6">

                <div class="card h-100 shadow">

                    <div class="card-body text-center">

                        <div class="fs-1">
                            🔧
                        </div>

                        <h3 class="card-title">
                            Repuestos
                        </h3>

                        <p class="card-text">
                            Repuestos y accesorios para tu vehículo.
                        </p>

                        <a href="productos/repuestos.php"
                           class="btn btn-primary">
                            Ver repuestos
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- AUTOS DESTACADOS -->

    <section class="bg-light py-5">

        <div class="container">

            <h2 class="text-center mb-4">
                🚗 Autos destacados
            </h2>

            <div class="row g-4">


                <div class="col-md-4">

                    <div class="card h-100 shadow">

                        <div class="card-body">

                            <h4>
                                Ford Focus
                            </h4>

                            <p>
                                Motor 2.0
                            </p>

                            <p>
                                <strong>85.000 km</strong>
                            </p>

                            <h4 class="text-primary">
                                $15.000.000
                            </h4>

                            <button class="btn btn-primary">
                                Ver vehículo
                            </button>

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="card h-100 shadow">

                        <div class="card-body">

                            <h4>
                                Volkswagen Golf
                            </h4>

                            <p>
                                Motor 1.4 Turbo
                            </p>

                            <p>
                                <strong>72.000 km</strong>
                            </p>

                            <h4 class="text-primary">
                                $18.500.000
                            </h4>

                            <button class="btn btn-primary">
                                Ver vehículo
                            </button>

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="card h-100 shadow">

                        <div class="card-body">

                            <h4>
                                Chevrolet Cruze
                            </h4>

                            <p>
                                Motor 1.4 Turbo
                            </p>

                            <p>
                                <strong>65.000 km</strong>
                            </p>

                            <h4 class="text-primary">
                                $19.200.000
                            </h4>

                            <button class="btn btn-primary">
                                Ver vehículo
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->

    <footer class="bg-dark text-white text-center py-4">

        <div class="container">

            <h5>
                🚗 AutoMarket
            </h5>

            <p class="mb-0">
                Venta de autos y repuestos.
            </p>

            <small>
                © 2026 AutoMarket - E-commerce educativo
            </small>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>