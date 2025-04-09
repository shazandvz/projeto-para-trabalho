<?php
// Definição de estilos
echo "<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        text-align: center;
        margin: 30px;
    }
    .container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: auto;
    }
    h2 {
        color: #333;
    }
    .box {
        padding: 15px;
        margin: 10px 0;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
    }
    .success { background-color: #d4edda; color: #155724; }
    .warning { background-color: #fff3cd; color: #856404; }
    .danger { background-color: #f8d7da; color: #721c24; }
    .info { background-color: #cce5ff; color: #004085; }
</style>";

echo "<div class='container'>";
echo "<h2>Entendendo if e else em PHP</h2>";

// 🔹 Exemplo 1: Verificando se a pessoa é maior de idade
$idade = 20;
echo "<div class='box " . ($idade >= 18 ? "success" : "danger") . "'>";
echo ($idade >= 18) ? "✅ Você é maior de idade!" : "❌ Você é menor de idade!";
echo "</div>";

// 🔹 Exemplo 2: Nível de desconto do cartão da loja
$temCartao = true;
$nivelCartao = "prata";

echo "<div class='box info'>";
if ($temCartao) {
    echo "✅ Cliente possui cartão da loja.<br>";
    if ($nivelCartao == "bronze") {
        echo "🟫 Nível: Bronze - 5% de desconto.";
    } elseif ($nivelCartao == "prata") {
        echo "⚪ Nível: Prata - 10% de desconto.";
    } elseif ($nivelCartao == "ouro") {
        echo "🟡 Nível: Ouro - 20% de desconto.";
    } else {
        echo "❌ Nível de cartão inválido.";
    }
} else {
    echo "❌ Cliente não possui cartão da loja. Cadastre-se para obter descontos!";
}
echo "</div>";

// 🔹 Exemplo 3: Classificação de notas de alunos
$nota = 8.5;
$classificacao = "";
$classeCSS = "";

if ($nota >= 9) {
    $classificacao = "🏆 Excelente! Parabéns!";
    $classeCSS = "success";
} elseif ($nota >= 7) {
    $classificacao = "👍 Bom! Continue assim!";
    $classeCSS = "info";
} elseif ($nota >= 5) {
    $classificacao = "⚠️ Regular! Precisa melhorar.";
    $classeCSS = "warning";
} else {
    $classificacao = "❌ Reprovado! Estude mais.";
    $classeCSS = "danger";
}

echo "<div class='box $classeCSS'>$classificacao (Nota: $nota)</div>";

// 🔹 Exemplo 4: Verificação de estoque
$estoque = 0;
$mensagemEstoque = $estoque > 10 ? "📦 Temos muitos produtos disponíveis!" : ($estoque > 0 ? "⚠️ Poucos produtos em estoque!" : "❌ Produto esgotado!");
$classeEstoque = $estoque > 10 ? "success" : ($estoque > 0 ? "warning" : "danger");

echo "<div class='box $classeEstoque'>$mensagemEstoque</div>";

// 🔹 Exemplo 5: Número par ou ímpar
$numero = 15;
$mensagemNumero = ($numero % 2 == 0) ? "✅ O número $numero é par." : "❌ O número $numero é ímpar.";
$classeNumero = ($numero % 2 == 0) ? "success" : "danger";

echo "<div class='box $classeNumero'>$mensagemNumero</div>";

echo "</div>"; // Fecha a div container
?>
