<?php
/*
  Explicação rápida:
  - $_SERVER["REQUEST_METHOD"] == "POST": Verifica se o formulário foi enviado via POST.
  - $_POST["nome"] ?? '': Se "nome" não estiver definido, usa string vazia.
  - isset($_POST["estado_civil"]) ? "Casado(a)" : "Solteiro(a)": Verifica se a checkbox de estado civil foi marcada.
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? '';

    if (!empty($nome)) {
        $endereco = $_POST["endereco"] ?? '';
        $telefone = $_POST["telefone"] ?? '';
        $email = $_POST["email"] ?? '';
        $estado_civil = isset($_POST["estado_civil"]) ? "Casado(a)" : "Solteiro(a)";

        echo "<h2>Dados Recebidos:</h2>";
        echo "<hr>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Endereço:</strong> $endereco</p>";
        echo "<p><strong>Telefone:</strong> $telefone</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Estado Civil:</strong> $estado_civil</p>";
    } else {
        echo "<p>Favor preencher o campo nome.</p>";
    }
} else {
    echo "<p>Formulário não enviado corretamente.</p>";
}
?>
    