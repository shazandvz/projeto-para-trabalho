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
    $preco = $_POST['preco'];
    
    // Insere o novo produto no banco de dados
    $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nome, $preco])) {
        $sucesso = 'Produto cadastrado com sucesso!';
    } else {
        $erro = 'Erro ao cadastrar produto!';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
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
        <h2>Cadastrar Produto</h2>
        <?php if (isset($sucesso)) { echo "<p style='color:green'>$sucesso</p>"; } ?>
        <?php if (isset($erro)) { echo "<p style='color:red'>$erro</p>"; } ?>
        
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <input type="number" name="preco" placeholder="Preço" required>
            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</div>

</body>
</html>
