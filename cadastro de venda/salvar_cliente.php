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
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Verifica se o CPF já existe no banco
    $sql = "SELECT * FROM clientes WHERE cpf = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cpf]);
    $clienteExistente = $stmt->fetch();
    
    if ($clienteExistente) {
        $erro = 'Este CPF já está cadastrado!';
    } else {
        // Insere o novo cliente
        $sql = "INSERT INTO clientes (nome, cpf, email, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $cpf, $email, $telefone, $data_nascimento])) {
            $sucesso = 'Cliente cadastrado com sucesso!';
        } else {
            $erro = 'Erro ao cadastrar cliente!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
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
        <h2>Cadastrar Cliente</h2>
        <?php if (isset($sucesso)) { echo "<p style='color:green'>$sucesso</p>"; } ?>
        <?php if (isset($erro)) { echo "<p style='color:red'>$erro</p>"; } ?>
        
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome do Cliente" required>
            <input type="text" name="cpf" placeholder="CPF (Somente números)" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="telefone" placeholder="Telefone" required>
            <input type="date" name="data_nascimento" placeholder="Data de Nascimento" required>
            <button type="submit">Cadastrar Cliente</button>
        </form>
    </div>
</div>

</body>
</html>
