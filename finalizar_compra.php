<?php
require "config/database.php";
require "config/auth.php";
exigirLogin();

$carrito = $_SESSION["carrito"] ?? [];

if (empty($carrito)) {
    header("Location: productos.php");
    exit;
}

$pdo->beginTransaction();

try {
    $ids = array_keys($carrito);
    $placeholders = implode(",", array_fill(0, count($ids), "?"));

    $stmt = $pdo->prepare("SELECT * FROM productos WHERE id IN ($placeholders) FOR UPDATE");
    $stmt->execute($ids);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total = 0;

    foreach ($productos as $producto) {
        $cantidad = $carrito[$producto["id"]];

        if ($cantidad > $producto["stock"]) {
            throw new Exception("No hay stock suficiente de " . $producto["nombre"]);
        }

        $total += $cantidad * $producto["precio"];
    }

    $stmt = $pdo->prepare(
        "INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)"
    );
    $stmt->execute([$_SESSION["usuario"]["id"], $total]);

    $pedidoId = $pdo->lastInsertId();

    foreach ($productos as $producto) {
        $cantidad = $carrito[$producto["id"]];

        $stmt = $pdo->prepare(
            "INSERT INTO pedido_detalles (pedido_id, producto_id, cantidad, precio)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([
            $pedidoId,
            $producto["id"],
            $cantidad,
            $producto["precio"]
        ]);

        $stmt = $pdo->prepare(
            "UPDATE productos SET stock = stock - ? WHERE id = ?"
        );
        $stmt->execute([$cantidad, $producto["id"]]);
    }

    $pdo->commit();

    $_SESSION["carrito"] = [];

} catch (Exception $e) {
    $pdo->rollBack();
    die("No se pudo finalizar la compra: " . htmlspecialchars($e->getMessage()));
}
?>

<?php require "includes/header.php"; ?>

<div class="exito">
    <h1>¡Compra realizada!</h1>
    <p>Tu número de pedido es: <strong>#<?= $pedidoId ?></strong></p>
    <p>Total: <strong>$<?= number_format($total, 2, ",", ".") ?></strong></p>
</div>

<a class="btn" href="productos.php">Seguir comprando</a>

<?php require "includes/footer.php"; ?>
