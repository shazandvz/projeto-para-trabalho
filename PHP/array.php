<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Criando um array com alguns elementos
$frutas = array("Maçã", "Banana", "Laranja", "Manga");

// Acessando e exibindo um elemento específico do array
echo "A primeira fruta é: " . $frutas[0] . "<br>"; // Índice 0: Maçã
echo "A segunda fruta é: " . $frutas[1] . "<br>"; // Índice 1: Banana

// Adicionando uma nova fruta ao array
$frutas[] = "Abacaxi";  // Adiciona no final

// Exibindo todas as frutas com um loop
echo "<br>Frutas disponíveis:<br>";
foreach ($frutas as $fruta) {
    echo $fruta . "<br>";
}

// Usando a função count() para obter o número de elementos no array
echo "<br>Total de frutas: " . count($frutas) . "<br>";
?>

</body>
</html>