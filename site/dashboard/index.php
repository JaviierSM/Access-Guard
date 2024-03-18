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


<?php
if (isset ($_SESSION['status'])) {
    echo "<h5 class='alert alert-success '>" . $_SESSION['status'] . "</h5>";
    unset($_SESSION['status']);
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="./door-users.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-users fa-sm text-white-50"></i> Gestionar
            usuarios de la puerta</a>
    </div>
    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Accesos en los últimos días
                    </h6>
                </div>
                <div style="display: none">
                    <?php
                    include 'dbcon.php';
                    $ref_table = 'acceso';
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    $todayMinus5 = 0;
                    $todayMinus4 = 0;
                    $todayMinus3 = 0;
                    $todayMinus2 = 0;
                    $todayMinus1 = 0;
                    $todayMinus0 = 0;

                    if ($fetchdata) {
                        foreach ($fetchdata as $key => $row) {
                            if ($key != '0') {
                                $accessDate = new DateTime($row['fecha']);
                                $today = new DateTime();
                                $interval = $today->diff($accessDate);

                                switch ($interval->days) {
                                    case 5:
                                        $todayMinus5++;
                                        break;
                                    case 4:
                                        $todayMinus4++;
                                        break;
                                    case 3:
                                        $todayMinus3++;
                                        break;
                                    case 2:
                                        $todayMinus2++;
                                        break;
                                    case 1:
                                        $todayMinus1++;
                                        break;
                                    case 0:
                                        $todayMinus0++;
                                        break;
                                }
                            }
                        }
                    }

                    echo "<span id='todayMinus5'>" . $todayMinus5 . "</span>";
                    echo "<span id='todayMinus4'>" . $todayMinus4 . "</span>";
                    echo "<span id='todayMinus3'>" . $todayMinus3 . "</span>";
                    echo "<span id='todayMinus2'>" . $todayMinus2 . "</span>";
                    echo "<span id='todayMinus1'>" . $todayMinus1 . "</span>";
                    echo "<span id='todayMinus0'>" . $todayMinus0 . "</span>"; ?>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Tasa de ingresos exitosos
                    </h6>
                </div>
                <!-- Card Body -->
                <?php
                $ref_table = 'acceso';
                $fetchdata = $database->getReference($ref_table)->getValue();

                $countSuccess = 0;
                $countFailed = 0;
                $countApp = 0;

                if ($fetchdata) {
                    foreach ($fetchdata as $key => $row) {
                        if ($key != '0') {
                            if ($row['status'] === 'true') {
                                $countSuccess++;
                            } elseif ($row['status'] === 'false') {
                                $countFailed++;
                            } elseif ($row['status'] === 'app') {
                                $countApp++;
                            }
                        }
                    }
                } ?>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"><span id="ingresosExitosos" style="display: none">
                                    <?= $countSuccess; ?>
                                </span></i>
                            Exitoso
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"><span id="ingresosFallidos" style="display: none">
                                    <?= $countFailed; ?>
                                </span></i>
                            Fallido
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"><span id="ingresosApp" style="display: none">
                                    <?= $countApp; ?>
                                </span></i>
                            App Móvil
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Historial de Accesos
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $ref_table = 'acceso';
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
                                            <?php
                                            if ($row['status'] == "app") {
                                                echo "Apertura desde la app";
                                            } elseif ($row['status'] == "true") {
                                                echo "Acceso permitido";
                                            } elseif ($row['status'] == "false" && $row['nombre'] != "Desconocido") {
                                                echo "Contraseña incorrecta";
                                            } else {
                                                echo "Acceso denegado";
                                            } ?>
                                        </td>

                                        <td>
                                            <?= $row['fecha']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php
include 'template/footer.php';