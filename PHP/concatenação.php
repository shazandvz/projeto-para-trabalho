<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concatenação</title>
</head>
<body>

<?php
$nome = "João da Silva";
$idade = 30;
$peso = 80.5; // Kg
$altura = 1.75; // Metros
$fuma = false;
$profissao = "Engenheiro";
$endereco = "Rua das Flores, 123 - São Paulo, SP";
$corPreferencia = "Azul"; // Adicionando a variável faltante

// Corrigindo a concatenação
echo "Olá " . $nome . ", vi que a sua cor de preferência é " . $corPreferencia .  ", você tem " . $idade . " anos e pesa " . $peso . " kg.";
echo "<br>";
echo "Aprendendo a concatenar strings no PHP.";
?>

</body>
</html>
