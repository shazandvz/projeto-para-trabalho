<?php
session_start();
include('conexao.php');

// Verifica se o usuário está autenticado e é um administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'admin') {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);  // Hash da senha para segurança
    
    // Insere o novo vendedor no banco de dados
    $sql = "INSERT INTO vendedores (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nome, $email, $senha])) {
        $sucesso = 'Vendedor cadastrado com sucesso!';
    } else {
        $erro = 'Erro ao cadastrar vendedor!';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Vendedor</title>
    <link rel="stylesheet" href="style-painel.css">
</head>
<body>

<div class="painel">
    <div class="menu">
        <a href="painel.php">Painel</a>
        <a href="clientes.php">Clientes</a>
        <a href="produtos.php">Produtos</a>
        <a href="vendedores.php">Vendedores</a>
        <a href="vendas.php">Vendas</a>
        <a href="logout.php">Sair</a>
    </div>

    <div class="conteudo">
        <h2>Cadastrar Vendedor</h2>
        <?php if (isset($sucesso)) { echo "<p style='color:green'>$sucesso</p>"; } ?>
        <?php if (isset($erro)) { echo "<p style='color:red'>$erro</p>"; } ?>
        
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome do Vendedor" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar Vendedor</button>
        </form>
    </div>
</div>

</body>
</html>
