<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de arrary_associativo</title>
</head>
<body>

<?php
// Array associativo multidimensional com vários clientes
$clientes = [
    "cliente1" => [
        "nome" => "João",
        "idade" => 30,
        "email" => "joao@examplo.com"
    ],
    "cliente2" => [
        "nome" => "Maria",
        "idade" => 25,
        "email" => "maria@examplo.com"
    ],
    "cliente3" => [
        "nome" => "Carlos",
        "idade" => 28,
        "email" => "carlos@examplo.com"
    ]
];

// Exibindo os dados de todos os clientes
foreach ($clientes as $id => $dados) {
    echo "<strong>$id</strong><br>";
    foreach ($dados as $chave => $valor) {
        echo ucfirst($chave) . ": " . $valor . "<br>";
    }
    echo "<br>";
}
?>
</body>
</html>
