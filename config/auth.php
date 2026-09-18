<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function estaLogueado() {
    return isset($_SESSION["usuario"]);
}

function exigirLogin() {
    if (!estaLogueado()) {
        header("Location: /automarket/login.php");
        exit;
    }
}
?>
