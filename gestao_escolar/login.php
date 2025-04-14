<?php
session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['tipo'] = $user['tipo'];

        if ($user['tipo'] == 'admin') {
            header("Location: admin/alunos.php");
        } elseif ($user['tipo'] == 'professor') {
            header("Location: professor/lancar_notas.php");
        } else {
            header("Location: aluno/boletim.php");
        }
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Gestão Escolar</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<h2>Login</h2>
<form method="POST">
    <input type="text" name="usuario" placeholder="Usuário" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button type="submit">Entrar</button>
</form>
<?php if (!empty($erro)) echo "<p>$erro</p>"; ?>
</body>
</html>