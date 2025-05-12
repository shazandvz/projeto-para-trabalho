<?php
require 'conexao.php';

// Edição de produto (se vindo com ?editar=id)
$produto_editar = null;
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto_editar = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Inserção ou atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;

    if ($nome && $preco > 0) {
        if (isset($_POST['id'])) {
            // Atualizar produto existente
            $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ? WHERE id = ?");
            $stmt->execute([$nome, $preco, $_POST['id']]);
        } else {
            // Inserir novo produto
            $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
            $stmt->execute([$nome, $preco]);
        }
        header("Location: produtos.php");
        exit;
    }
}

// Listar produtos
$produtos = $pdo->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produtos</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      padding: 40px;
    }

    h2 {
      text-align: center;
    }

    form, table {
      background: white;
      padding: 20px;
      max-width: 600px;
      margin: 20px auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 15px;
      padding: 12px;
      width: 100%;
      background-color: #3498db;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #2980b9;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .acoes {
      display: flex;
      gap: 10px;
    }

    .acoes a {
      text-decoration: none;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
    }

    .edit {
      background-color: #f39c12;
    }

    .delete {
      background-color: #e74c3c;
    }
  </style>
</head>
<body>

<h2><?= $produto_editar ? 'Editar Produto' : 'Cadastro de Produtos' ?></h2>

<form method="POST">
  <?php if ($produto_editar): ?>
    <input type="hidden" name="id" value="<?= $produto_editar['id'] ?>">
  <?php endif; ?>
  <label>Nome do Produto:</label>
  <input type="text" name="nome" required value="<?= htmlspecialchars($produto_editar['nome'] ?? '') ?>">

  <label>Preço (R$):</label>
  <input type="number" name="preco" step="0.01" min="0" required value="<?= htmlspecialchars($produto_editar['preco'] ?? '') ?>">

  <button type="submit"><?= $produto_editar ? 'Atualizar Produto' : 'Salvar Produto' ?></button>
</form>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Preço (R$)</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produtos as $produto): ?>
      <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= htmlspecialchars($produto['nome']) ?></td>
        <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
        <td class="acoes">
          <a class="edit" href="produtos.php?editar=<?= $produto['id'] ?>">Editar</a>
          <a class="delete" href="excluir_produto.php?id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>
