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
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                session_start();
                if (isset ($_SESSION['status'])) {
                    echo "<h5 class='alert alert-success '>" . $_SESSION['status'] . "</h5>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Usuarios con Acceso Biometrico<a href="add-door-user.php" class="btn btn-primary float-end">
                                Añadir usuario</a>
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>