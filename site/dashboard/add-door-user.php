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
                <div class="card">
                    <div class="card-header">
                        <h4>Agregar ususarios
                            <a href="door-user.php" class="btn btn-danger float-end">Cancelar</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post">
                            <div class="form-group mb-3">
                                <label for="">ID</label>
                                <input type="number" name="id" class="form-control" min="1" max="20">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nombre completo</label>
                                <input type="text" name="full-name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Clave de 6 dígitos</label>
                                <input type="text" name="pass" id="password" class="form-control" maxlength="6">
                            </div>
                            <button type="button" onclick="generatePassword()" class="btn btn-primary">Generate
                                Password</button>
                            <button type="submit" name="save-user" class="btn btn-success">Submit</button>
                        </form>

                        <script>
                        function generatePassword() {
                            let password = "";
                            for (let i = 0; i < 6; i++) {
                                password += Math.floor(Math.random() * 10);
                            }
                            document.getElementById("password").value = password;
                        }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>