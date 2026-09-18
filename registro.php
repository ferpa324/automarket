<?php
require "config/database.php";
require "includes/header.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($nombre == "" || $email == "" || $password == "") {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El email no es válido.";
    } elseif (strlen($password) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $error = "Ese email ya está registrado.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare(
                "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)"
            );
            $stmt->execute([$nombre, $email, $hash]);

            header("Location: login.php?registro=ok");
            exit;
        }
    }
}
?>

<div class="formulario">
    <h1>Crear cuenta</h1>
    <br>

    <?php if ($error): ?>
        <div class="alerta"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button class="btn" type="submit">Registrarme</button>
    </form>
</div>

<?php require "includes/footer.php"; ?>
