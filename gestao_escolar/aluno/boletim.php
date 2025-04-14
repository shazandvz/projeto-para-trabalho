<?php
require '../auth/check_login.php';
if ($_SESSION['tipo'] != 'aluno') {
    header("Location: ../login.php");
    exit;
}
echo "<h1>Área do Aluno - Boletim</h1>";
?>