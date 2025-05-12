
<?php
require 'conexao.php';

$data_venda = $_POST['data_venda'];
$vendedor_nome = trim($_POST['vendedor_nome']);
$cliente_nome = trim($_POST['cliente_nome']);
$produto_nome = trim($_POST['produto_nome']);
$quantidade = (int)$_POST['quantidade'];
$valor_total = (float)$_POST['valor_total'];

// Validar e obter ID de vendedor
$stmt = $pdo->prepare("SELECT id FROM vendedores WHERE nome = ?");
$stmt->execute([$vendedor_nome]);
$vendedor = $stmt->fetch();
if (!$vendedor) {
  exit("Vendedor inválido.");
}

// Validar e obter ID de cliente
$stmt = $pdo->prepare("SELECT id FROM clientes WHERE nome = ?");
$stmt->execute([$cliente_nome]);
$cliente = $stmt->fetch();
if (!$cliente) {
  exit("Cliente inválido.");
}

// Validar e obter ID de produto
$stmt = $pdo->prepare("SELECT id FROM produtos WHERE nome = ?");
$stmt->execute([$produto_nome]);
$produto = $stmt->fetch();
if (!$produto) {
  exit("Produto inválido.");
}

// Inserir venda
$stmt = $pdo->prepare("INSERT INTO vendas (data_venda, id_vendedor, id_cliente, id_produto, quantidade, valor_total)
                       VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
  $data_venda,
  $vendedor['id'],
  $cliente['id'],
  $produto['id'],
  $quantidade,
  $valor_total
]);

echo "Venda registrada com sucesso!";
?>
