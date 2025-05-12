<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'admin') {
    header('Location: index.php');
    exit;
}

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO clientes (nome, cpf, telefone) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nome, $cpf, $telefone])) {
        $sucesso = 'Cliente cadastrado com sucesso!';
    } else {
        $erro = 'Erro ao cadastrar cliente!';
    }
}

$clientes = $pdo->query("SELECT * FROM clientes")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Clientes</title>
  <link rel="stylesheet" href="style-painel.css">
</head>
<body>

  <div class="painel">
    <div class="menu">
      <a href="painel.php">Painel</a>
      <a href="produtos.php">Produtos</a>
      <a href="vendedores.php">Vendedores</a>
      <a href="vendas.php">Vendas</a>
      <a href="logout.php">Sair</a>
    </div>

    <div class="conteudo">
      <h2>Cadastro de Clientes</h2>
      <?php if (isset($sucesso)) { echo "<p style='color:green'>$sucesso</p>"; } ?>
      <?php if (isset($erro)) { echo "<p style='color:red'>$erro</p>"; } ?>
      <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="text" name="telefone" placeholder="Telefone" required>
        <button type="submit">Cadastrar Cliente</button>
      </form>

      <h3>Clientes Cadastrados</h3>
      <table>
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Telefone</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
          <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
          <td><?php echo htmlspecialchars($cliente['cpf']); ?></td>
          <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

</body>
</html>
