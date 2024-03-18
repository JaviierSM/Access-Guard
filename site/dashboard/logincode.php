<?php
use Kreait\Firebase\Auth;

session_start();
include ('dbcon.php');

// Initialize Firebase Authentication service
$auth = $factory->createAuth();

if (isset ($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    try {
        $user = $auth->getUserByEmail("$email");

        try {
            $signInResult = $auth->signInWithEmailAndPassword($email, $pass);

            $idTokenString = $signInResult->idToken(); // string|null

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $_SESSION['verified_user_id'] = $verifiedIdToken->claims()->get('sub');
                $_SESSION['idTokenString'] = $idTokenString;
                $_SESSION['email'] = $email;

            } catch (InvalidToken $e) {
                echo 'The token is invalid: ' . $e->getMessage();
            } catch (\InvalidArgumentException $e) {
                echo 'The token could not be parsed: ' . $e->getMessage();
            }

            $uid = $verifiedIdToken->claims()->get('sub');

            $user = $auth->getUser($uid);

            $_SESSION['status'] = "Bienvenido";
            header('Location:index.php');
        } catch (Exception $e) {
            echo $e->getMessage();
            $_SESSION['status'] = "Usuario no encontrado";
            header('Location:login.php');
            exit();
        }

    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        echo $e->getMessage();
        $_SESSION['status'] = "Usuario no encontrado";
        header('Location:login.php');
        exit();
    }
} else {
    $_SESSION['status'] = "No tienes acceso a esta página. Por favor inicia sesión.";
    header('Location:login.php');
    exit();
}
?>