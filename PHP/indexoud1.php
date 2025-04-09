<?php
$nome = "João da Silva";
$idade = 30;
$peso = 80.5; // Kg
$altura = 1.75; // Metros
$fuma = false;
$profissao = "Engenheiro";
$endereco = "Rua das Flores, 123 - São Paulo, SP";

// Cálculo do IMC
$imc = $peso / ($altura * $altura);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Cadastral</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 400px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h1, h3 { color: #333; }
        p { font-size: 16px; margin: 5px 0; }
        .highlight { font-weight: bold; color: #007BFF; }
    </style>
</head>
<body>

<div class="container">
    <h1>Ficha Cadastral</h1>
    <h3>Dados Pessoais</h3>

    <p>Nome: <span class="highlight"><?php echo $nome; ?></span></p>
    <p>Idade: <span class="highlight"><?php echo $idade; ?> anos</span></p>
    <p>Endereço: <span class="highlight"><?php echo $endereco; ?></span></p>
    <p>Profissão: <span class="highlight"><?php echo $profissao; ?></span></p>

    <h3>Informações Físicas</h3>
    <p>Peso: <span class="highlight"><?php echo $peso; ?> kg</span></p>
    <p>Altura: <span class="highlight"><?php echo $altura; ?> m</span></p>
    <p>IMC: <span class="highlight"><?php echo number_format($imc, 2); ?></span> 
        (<?php echo ($imc < 18.5) ? "Abaixo do peso" : (($imc < 25) ? "Peso normal" : "Sobrepeso"); ?>)
    </p>
    <p>Fumante: <span class="highlight"><?php echo $fuma ? "Sim" : "Não"; ?></span></p>
</div>

</body>
</html>
