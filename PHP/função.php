<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função</title>
</head>
<body>
<?php

$estoque = [];

function adicionarProduto(&$estoque, $nome, $quantidade) {
    if (isset($estoque[$nome])) {
        $estoque[$nome] += $quantidade;
    } else {
        $estoque[$nome] = $quantidade;
    }
    echo "✅ Produto '$nome' adicionado com sucesso! Estoque: {$estoque[$nome]} unidades.<br>";
}

function removerProduto(&$estoque, $nome, $quantidade) {
    if (!isset($estoque[$nome])) {
        echo "❌ Produto '$nome' não encontrado no estoque.<br>";
        return;
    }

    if ($estoque[$nome] < $quantidade) {
        echo "⚠️ Não há quantidade suficiente de '$nome' para remover.<br>";
        return;
    }

    $estoque[$nome] -= $quantidade;
    echo "🗑️ Produto '$nome' removido. Estoque restante: {$estoque[$nome]} unidades.<br>";

    if ($estoque[$nome] == 0) {
        unset($estoque[$nome]);
    }
}

function listarEstoque($estoque) {
    echo "📦 Estoque Atual:<br>";
    if (empty($estoque)) {
        echo "Nenhum produto no estoque.<br>";
    } else {
        foreach ($estoque as $produto => $quantidade) {
            echo "- $produto: $quantidade unidades<br>";
        }
    }
}

// Simulação
adicionarProduto($estoque, "Ração", 10);
adicionarProduto($estoque, "Coleira", 5);
removerProduto($estoque, "Ração", 4);
listarEstoque($estoque);

?>
</body>
</html>