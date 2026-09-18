<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$carritoCantidad = isset($_SESSION["carrito"]) ? array_sum($_SESSION["carrito"]) : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoMarket</title>
    <link rel="stylesheet" href="/automarket/css/style.css">
</head>
<body>
<header class="header">
    <div class="logo"><a href="/automarket/index.php">AutoMarket</a></div>
    <nav>
        <a href="/automarket/index.php">Inicio</a>
        <a href="/automarket/productos.php?tipo=auto">Autos</a>
        <a href="/automarket/productos.php?tipo=repuesto">Repuestos</a>
        <a href="/automarket/carrito.php">🛒 Carrito (<?= $carritoCantidad ?>)</a>
        <?php if (isset($_SESSION["usuario"])): ?>
            <a href="/automarket/logout.php">Salir</a>
        <?php else: ?>
            <a href="/automarket/login.php">Ingresar</a>
            <a href="/automarket/registro.php">Registrarse</a>
        <?php endif; ?>
    </nav>
</header>
<main class="container">
