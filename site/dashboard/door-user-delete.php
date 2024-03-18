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




                    </div>
                    <div class="card-body">
                        <?php
                        $ref_table = 'usuariosPuerta/' . $id;
                        $fetchdata = $database->getReference($ref_table)->getValue();

                        if ($fetchdata > 0) {
                            ?>
                            <p>¿Seguro que deseas eliminar a
                                <?= $fetchdata['nombre']; ?>?
                            </p>
                            <form action="code.php" method="post">
                                <input type="hidden" value="<?= $id; ?>" name="id">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="door-users.php" class="btn btn-success">Cancelar</a>
                                    <button type="submit" name="delete-user" class="btn btn-danger">Eliminar usuario</button>
                                </div>
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


                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'template/footer.php';