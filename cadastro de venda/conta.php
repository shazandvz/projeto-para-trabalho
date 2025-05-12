<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head><title>Minha Conta</title></head>
<body>
<h2>Bem-vindo, <?= htmlspecialchars($usuario['nome']) ?>!</h2>
<p>Email: <?= htmlspecialchars($usuario['email']) ?></p>
<p>Tipo: <?= htmlspecialchars($usuario['tipo']) ?></p>
<a href="logout.php">Sair</a>
</body>
</html>
