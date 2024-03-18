<?php
include 'dbcon.php';
session_start();
if (!isset ($_SESSION['verified_user_id'])) {
    $_SESSION['status'] = "No tienes acceso a esta página. Por favor inicia sesión.";
    header('Location:login.php');
    exit();
}
include 'template/navbar.php';
?>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Agregar usuarios</h4>
                    <a href="door-users.php" class="btn btn-danger">Cancelar</a>

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
                        <button type="button" onclick="generatePassword()" class="btn btn-primary">Generar
                            clave</button>
                        <button type="submit" name="save-user" class="btn btn-success">Subir</button>
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
<?php
include 'template/footer.php';