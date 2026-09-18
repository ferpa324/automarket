<?php
require "config/database.php";
require "includes/header.php";

$carrito = $_SESSION["carrito"] ?? [];
$productos = [];
$total = 0;

if (!empty($carrito)) {
    $ids = array_keys($carrito);
    $placeholders = implode(",", array_fill(0, count($ids), "?"));

    $stmt = $pdo->prepare("SELECT * FROM productos WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Mi carrito</h1>
<br>

<?php if (empty($productos)): ?>
    <p>El carrito está vacío.</p>
    <br>
    <a class="btn" href="productos.php">Ver productos</a>
<?php else: ?>

<table>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
    </tr>

<?php foreach ($productos as $producto):
    $cantidad = $carrito[$producto["id"]];
    $subtotal = $cantidad * $producto["precio"];
    $total += $subtotal;
?>
    <tr>
        <td><?= htmlspecialchars($producto["nombre"]) ?></td>
        <td><?= $cantidad ?></td>
        <td>$<?= number_format($producto["precio"], 2, ",", ".") ?></td>
        <td>$<?= number_format($subtotal, 2, ",", ".") ?></td>
    </tr>
<?php endforeach; ?>
</table>

<br>
<h2>Total: $<?= number_format($total, 2, ",", ".") ?></h2>
<br>

<?php if (isset($_SESSION["usuario"])): ?>
    <a class="btn" href="finalizar_compra.php">Finalizar compra</a>
<?php else: ?>
    <p>Tenés que iniciar sesión para finalizar la compra.</p>
    <br>
    <a class="btn" href="login.php">Iniciar sesión</a>
<?php endif; ?>

<?php endif; ?>

<?php require "includes/footer.php"; ?>
