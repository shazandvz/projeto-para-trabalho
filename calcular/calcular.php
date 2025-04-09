<?php
$valor1 = $_POST['valor1'] ?? null;
$valor2 = $_POST['valor2'] ?? null;
$operacao = $_POST['operacao'] ?? null;

function exibirResultado($mensagem, $erro = false) {
    $cor = $erro ? 'red' : 'green';
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <title>Resultado</title>
        <link rel='stylesheet' href='style.css'>
        <style>
            .container { text-align: center; }
            .resultado { color: $cor; font-size: 20px; margin-top: 20px; }
            a { display: block; margin-top: 15px; text-decoration: none; color: #007bff; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Resultado</h2>
            <p class='resultado'>$mensagem</p>
            <a href='calcular.html'>Nova operação</a>
        </div>
    </body>
    </html>";
    exit;
}

if ($valor1 === null || $valor1 === '' || $valor2 === null || $valor2 === '') {
    exibirResultado("Por favor, preencha os dois campos.", true);
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
            exibirResultado("Erro: divisão por zero!", true);
        }
        $resultado = $valor1 / $valor2;
        $simbolo = '÷';
        break;
    default:
        exibirResultado("Operação inválida.", true);
}

$mensagem = "{$valor1} {$simbolo} {$valor2} = <strong>{$resultado}</strong>";
exibirResultado($mensagem);
?>
