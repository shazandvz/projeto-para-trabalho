<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    
</body>
</html>

<?php
$valor1 = $_POST['valor1'] ?? null;
$valor2 = $_POST['valor2'] ?? null;
$operacao = $_POST['operacao'] ?? null;

if ($valor1 === null || $valor1 === '' || $valor2 === null || $valor2 === '') {
    echo "<p style='color:red;'>Por favor, preencha os dois campos.</p>";
    echo "<a href='calcular.html'>Voltar</a>";
    exit;
}

switch ($operacao) {
    case 'adicao':
        $resultado = $valor1 + $valor2;
        $simbolo = '+';
        break;
    case 'subtracao':
        $resultado = $valor1 - $valor2;
        $simbolo = '-';
        break;
    case 'multiplicacao':
        $resultado = $valor1 * $valor2;
        $simbolo = '×';
        break;
    case 'divisao':
        if ($valor2 == 0) {
            echo "<p style='color:red;'>Erro: divisão por zero!</p>";
            echo "<a href='calcular.html'>Voltar</a>";
            exit;
        }
        $resultado = $valor1 / $valor2;
        $simbolo = '÷';
        break;
    default:
        echo "<p style='color:red;'>Operação inválida.</p>";
        echo "<a href='calcular.html'>Voltar</a>";
        exit;
}

echo "<h2>Resultado</h2>";
echo "<p>{$valor1} {$simbolo} {$valor2} = <strong>{$resultado}</strong></p>";
echo "<br><a href='calcular.html'>Nova operação</a>";
?>
</head>
<body>