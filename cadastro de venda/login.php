<?php
session_start();
$erro = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar ao banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=aulabd1703', 'root', ''); // 'root' sem senha no XAMPP
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o usuário existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o usuário existe e a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario; // Armazenar o usuário na sessão
        header("Location: index.php"); // Redirecionar para o índice
        exit();
    } else {
        $erro = "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Vendas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <?php if ($erro): ?>
            <p class="error"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
