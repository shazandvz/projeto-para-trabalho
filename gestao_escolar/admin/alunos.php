<?php
require '../auth/check_login.php';
if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
echo "<h1>Área do Administrador - Gerenciar Alunos</h1>";
?>