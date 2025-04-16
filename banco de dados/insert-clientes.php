<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $nome = trim($_POST["nome"] ?? '');
        $login = trim($_POST["login"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $senha = $_POST["senha"] ?? '';
        $administrador = isset($_POST["administrador"]) ? 1 : 0;

        if (empty($nome) || empty($login) || empty($email) || empty($senha)) {
            throw new Exception("Todos os campos são obrigatórios.");
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, login, email, senha, administrador)
                VALUES (:nome, :login, :email, :senha, :administrador)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':administrador', $administrador);
        $stmt->execute();

        echo "<h2>Usuário cadastrado com sucesso!</h2>";
        echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
        echo "<p><strong>Login:</strong> " . htmlspecialchars($login) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Administrador:</strong> " . ($administrador ? "Sim" : "Não") . "</p>";
    } catch (PDOException $e) {
        echo "Erro no banco: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>
