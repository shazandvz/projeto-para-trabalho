<?php
session_start();
session_destroy(); // Destrói todas as variáveis da sessão
header("Location: index.php"); // Redireciona de volta para a página inicial
exit();
?>
