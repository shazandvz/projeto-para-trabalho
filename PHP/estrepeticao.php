<?php
// Inicializando a soma
$soma = 0;

// Laço de repetição 'for'
echo "<h2>Exemplo com For:</h2>";
for ($i = 1; $i <= 10; $i++) {
    // Contagem crescente (1 até 5)
    if ($i <= 5) {
        echo "Número crescente: $i <br>";
    }

    // Contagem regressiva (5 até 1)
    if ($i >= 6 && $i <= 10) {
        echo "Contagem regressiva: " . (11 - $i) . "<br>";
    }

    // Soma dos números de 1 até 10
    $soma += $i;
}

// Exibindo a soma final com 'for'
echo "A soma dos números de 1 a 10 com 'for' é: $soma <br><br>";

// Resetando a soma para o próximo exemplo
$soma = 0;

// Laço de repetição 'while'
echo "<h2>Exemplo com While:</h2>";
$i = 1; // Inicializando a variável de controle para o loop 'while'
while ($i <= 10) {
    // Contagem crescente (1 até 5)
    if ($i <= 5) {
        echo "Número crescente: $i <br>";
    }

    // Contagem regressiva (5 até 1)
    if ($i >= 6 && $i <= 10) {
        echo "Contagem regressiva: " . (11 - $i) . "<br>";
    }

    // Soma dos números de 1 até 10
    $soma += $i;

    // Incrementando o valor de $i a cada iteração
    $i++;
}

// Exibindo a soma final com 'while'
echo "A soma dos números de 1 a 10 com 'while' é: $soma";
?>
