<?php
session_start();
include ('dbcon.php');

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