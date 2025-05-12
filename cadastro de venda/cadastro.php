<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = 'usuario';

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nome, $email, $senha, $tipo])) {
        $_SESSION['usuario'] = ['nome' => $nome, 'email' => $email, 'tipo' => $tipo];
        header('Location: conta.php');
        exit;
    } else {
        $erro = "Erro ao cadastrar usuário.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo do corpo */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container centralizado */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        /* Formulário de cadastro */
        .form-cadastro {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: white;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f7f7f7;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #3498db;
            background: #fff;
            outline: none;
        }

        button {
           
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2980b9;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: #3498db;
        }

        /* Animação do fade-in */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-cadastro">
        <h2>Cadastro</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit">Cadastrar</button>
        </form>
        <?= isset($erro) ? "<p style='color: red;'>$erro</p>" : '' ?>
        <a href="login.php">Já tem conta? Entrar</a>
    </div>
</div>

</body>
</html>
