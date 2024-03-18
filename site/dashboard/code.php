<?php
session_start();
include ('dbcon.php');
if (isset ($_POST['delete-user'])) {
    $id = $_POST['id'];
    $ref_table = "usuariosPuerta/" . $id;
    $deleteData = $database->getReference($ref_table)->remove();
    if ($deleteData) {
        $_SESSION['status'] = "Usuario eliminado";
    } else {
        $_SESSION['status'] = "Usuario no eliminado";
    }
    header('Location: door-users.php');
}

if (isset ($_POST['update-user'])) {
    $id = $_POST['id'];
    $name = $_POST['full-name'];
    $pass = $_POST['pass'];

    $ref_table = "usuariosPuerta/" . $id;
    $postRef_result = $database->getReference($ref_table)
        ->set([
            'nombre' => $name,
            'passcode' => $pass,
        ]);
    if ($postRef_result) {
        $_SESSION['status'] = "Usuario actualizado";
    } else {
        $_SESSION['status'] = "Usuario no actualizado";
    }
    header('Location: door-users.php');
}

if (isset ($_POST['save-user'])) {
    $id = $_POST['id'];
    $name = $_POST['full-name'];
    $pass = $_POST['pass'];

    $ref_table = "usuariosPuerta/" . $id;
    $postRef_result = $database->getReference($ref_table)
        ->set([
            'nombre' => $name,
            'passcode' => $pass,
        ]);
    if ($postRef_result) {
        $_SESSION['status'] = "Usuario añadido";
    } else {
        $_SESSION['status'] = "Usuario no añadido";
    }
    header('Location: door-users.php');
}
?>