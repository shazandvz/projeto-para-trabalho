<?php
require 'conexao.php';

$vendedores = $pdo->query("SELECT id, nome FROM vendedores")->fetchAll(PDO::FETCH_ASSOC);
$clientes = $pdo->query("SELECT id, nome FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
$produtos = $pdo->query("SELECT id, nome, preco FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Registrar Venda</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f2f2f2;
      padding: 40px;
    }

    form {
      background-color: #fff;
      padding: 25px;
      max-width: 600px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 20px;
      padding: 12px;
      width: 100%;
      background-color: #2ecc71;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>

<h2 style="text-align: center;">Registrar Venda</h2>

<form action="salvar_venda.php" method="POST">
  <label for="data_venda">Data da Venda:</label>
  <input type="date" name="data_venda" required>

  <label for="vendedor_nome">Vendedor:</label>
  <input list="lista_vendedores" name="vendedor_nome" required>
  <datalist id="lista_vendedores">
    <?php foreach($vendedores as $v): ?>
      <option value="<?= htmlspecialchars($v['nome']) ?>">
    <?php endforeach; ?>
  </datalist>

  <label for="cliente_nome">Cliente:</label>
  <input list="lista_clientes" name="cliente_nome" required>
  <datalist id="lista_clientes">
    <?php foreach($clientes as $c): ?>
      <option value="<?= htmlspecialchars($c['nome']) ?>">
    <?php endforeach; ?>
  </datalist>

  <label for="produto_nome">Produto:</label>
  <input list="lista_produtos" name="produto_nome" required>
  <datalist id="lista_produtos">
    <?php foreach($produtos as $p): ?>
      <option value="<?= htmlspecialchars($p['nome']) ?>">
    <?php endforeach; ?>
  </datalist>

  <label for="quantidade">Quantidade Vendida:</label>
  <input type="number" name="quantidade" min="1" required>

  <label for="valor_total">Valor da Venda (R$):</label>
  <input type="number" name="valor_total" step="0.01" required>

  <button type="submit">Confirmar Venda</button>
</form>

<script>
document.querySelector("form").addEventListener("submit", function(e) {
  const vendedorInput = document.querySelector("input[name='vendedor_nome']");
  const clienteInput = document.querySelector("input[name='cliente_nome']");
  const produtoInput = document.querySelector("input[name='produto_nome']");
  const quantidade = parseInt(document.querySelector("input[name='quantidade']").value);
  const valor = parseFloat(document.querySelector("input[name='valor_total']").value);

  const vendedorValido = Array.from(document.getElementById("lista_vendedores").options)
                              .some(option => option.value === vendedorInput.value);
  const clienteValido = Array.from(document.getElementById("lista_clientes").options)
                              .some(option => option.value === clienteInput.value);
  const produtoValido = Array.from(document.getElementById("lista_produtos").options)
                              .some(option => option.value === produtoInput.value);

  if (!vendedorValido) {
    e.preventDefault();
    Swal.fire("Erro", "Selecione um vendedor válido da lista.", "error");
    return;
  }

  if (!clienteValido) {
    e.preventDefault();
    Swal.fire("Erro", "Selecione um cliente válido da lista.", "error");
    return;
  }

  if (!produtoValido) {
    e.preventDefault();
    Swal.fire("Erro", "Selecione um produto válido da lista.", "error");
    return;
  }

  if (quantidade < 1) {
    e.preventDefault();
    Swal.fire("Erro", "Quantidade deve ser pelo menos 1.", "error");
    return;
  }

  if (isNaN(valor) || valor <= 0) {
    e.preventDefault();
    Swal.fire("Erro", "Informe um valor válido para a venda.", "error");
    return;
  }
});
</script>

</body>
</html>
