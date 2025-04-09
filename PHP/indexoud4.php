<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Estilizado</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h2>Cadastro de Informações Pessoais</h2>
        <form action="processa.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <div class="checkbox">
                <input type="checkbox" id="estado_civil" name="estado_civil">
                <label for="estado_civil">Casado(a)?</label>
            </div>

            <button type="submit">Confirmar</button>
        </form>
    </div>
   
</body>
</html>
