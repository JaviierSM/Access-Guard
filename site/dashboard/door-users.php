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
        <div class="col-md-6">
            <?php
            if (isset ($_SESSION['status'])) {
                echo "<h5 class='alert alert-success '>" . $_SESSION['status'] . "</h5>";
                unset($_SESSION['status']);
            }
            ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Usuarios con Acceso Biometrico</h4>
                    <a href="add-door-user.php" class="btn btn-primary">Añadir usuario</a>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ref_table = 'usuariosPuerta';
                        $fetchdata = $database->getReference($ref_table)->getValue();
                        if ($fetchdata > 0) {
                            foreach ($fetchdata as $key => $row) {
                                if ($key != '0') { // Check if the key is not '0'
                                    ?>
                        <tr>
                            <td>
                                <?= $key; ?>
                            </td>
                            <td>
                                <?= $row['nombre']; ?>
                            </td>
                            <td>
                                <?= $row['passcode']; ?>
                            </td>
                            <td>
                                <a href="door-user-edit.php?id=<?= $key; ?>" class="btn btn-primary btn-sm"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                    </svg></a>
                                <a href="door-user-delete.php?id=<?= $key; ?>" class="btn btn-danger btn-sm"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
                                    </svg></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        } else {
                            ?>
                        <tr>
                            <td colspan="4">No se enocntraron datos</td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'template/footer.php';