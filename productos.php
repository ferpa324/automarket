<?php
require "config/database.php";
require "includes/header.php";

$tipo = $_GET["tipo"] ?? "";

if ($tipo == "auto" || $tipo == "repuesto") {
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE tipo = ? ORDER BY id DESC");
    $stmt->execute([$tipo]);
} else {
    $stmt = $pdo->query("SELECT * FROM productos ORDER BY id DESC");
}

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Productos</h1>
<br>

<div class="grid">
<?php foreach ($productos as $producto): ?>
    <div class="card">
        <div class="imagen">
            <?= $producto["tipo"] == "auto" ? "🚗" : "🔧" ?>
        </div>

        <h3><?= htmlspecialchars($producto["nombre"]) ?></h3>
        <p><?= htmlspecialchars($producto["descripcion"]) ?></p>
        <p>Stock: <?= $producto["stock"] ?></p>
        <p class="precio">$<?= number_format($producto["precio"], 2, ",", ".") ?></p>

        <?php if ($producto["stock"] > 0): ?>
            <a class="btn" href="agregar_carrito.php?id=<?= $producto["id"] ?>">
                Agregar al carrito
            </a>
        <?php else: ?>
            <strong>Sin stock</strong>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>

<?php require "includes/footer.php"; ?>
