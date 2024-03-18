<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Navbar Brand -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="../index.html">
                    <img src="../images/logo/logo-ver2.ico" alt="" style="width: 50px; height: auto;">
                </a>
                <h1 class="navbar-brand mb-0 h1 text-light fw-bold">AccessGuard</h1>
            </div>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.html">¿Quiénes somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../dashboard/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">

                    <?php
                    session_start();
                    if (isset ($_SESSION['status'])) {
                        echo "<h5 class='alert alert-danger '>" . $_SESSION['status'] . "</h5>";
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-header">
                        <h4>Inicia sesión
                            <a href="door-users.php" class="btn btn-danger float-end">Cancelar</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="post">
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>