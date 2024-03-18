<?php
include ('dbcon.php');
session_start();
if (!isset ($_SESSION['verified_user_id'])) {
    $_SESSION['status'] = "No tienes acceso a esta página. Por favor inicia sesión.";
    header('Location:login.php');
    exit();
}
if (isset ($_GET['id'])) {
    $id = $_GET['id'];
    include 'template/navbar.php';
    ?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="m-0">Editar Usuario
                            <?= $id; ?>
                        </h4>

                        <a href="door-users.php" class="btn btn-danger">Cancelar</a>


                    </div>
                    <div class="card-body">
                        <?php
                        $ref_table = 'usuariosPuerta/' . $id;
                        $fetchdata = $database->getReference($ref_table)->getValue();

                        if ($fetchdata > 0) {
                            ?>
                            <form action="code.php" method="post">
                                <input type="hidden" value="<?= $id; ?>" name="id">
                                <div class="form-group mb-3">
                                    <label for="">Nombre completo</label>
                                    <input type="text" name="full-name" value="<?= $fetchdata['nombre']; ?>"
                                        class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Clave de 6 dígitos</label>
                                    <input type="text" name="pass" id="password" value="<?= $fetchdata['passcode']; ?>"
                                        class="form-control" maxlength="6">
                                </div>
                                <button type="button" onclick="generatePassword()" class="btn btn-primary">Generar nueva
                                    clave</button>
                                <button type="submit" name="update-user" class="btn btn-success">Actualizar</button>
                            </form>
                            <?php
                        } else {
                            $_SESSION['status'] = "ID no encontrado";
                            header('Location: door-users.php');
                            exit();
                        }
} else {
    $_SESSION['status'] = "No se encontró el usuario";
    header('Location: door-users.php');
    exit();
}
?>

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
<?php
include 'template/footer.php';