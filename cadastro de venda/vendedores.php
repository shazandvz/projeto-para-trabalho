<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'admin') {
    header('Location: index.php');
    exit;
}

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO vendedores (email, senha) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$email, $senha])) {
        $sucesso = 'Vendedor cadastrado com sucesso!';
    } else {
        $erro = 'Erro ao cadastrar vendedor!';
    }
}

$vendedores = $pdo->query("SELECT * FROM vendedores")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Vendedores</title>
  <link rel="stylesheet" href="style-painel.css">
</head>
<body>

  <div class="painel">
    <div class="menu">
      <a href="painel.php">Painel</a>
      <a href="clientes.php">Clientes</a>
      <a href="produtos.php">Produtos</a>
      <a href="vendas.php">Vendas</a>
      <a href="logout.php">Sair</a>
    </div>

    <div class="conteudo">
      <h2>Cadastro de Vendedores</h2>
      <?php if (isset($sucesso)) { echo "<p style='color:green'>$sucesso</p>"; } ?>
      <?php if (isset($erro)) { echo "<p style='color:red'>$erro</p>"; } ?>
      <form method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar Vendedor</button>
      </form>

      <h3>Vendedores Cadastrados</h3>
      <table>
        <tr>
          <th>Email</th>
        </tr>
        <?php foreach ($vendedores as $vendedor): ?>
        <tr>
          <td><?php echo htmlspecialchars($vendedor['email']); ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

</body>
</html>
