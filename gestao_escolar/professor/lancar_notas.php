<?php
require '../auth/check_login.php';
if ($_SESSION['tipo'] != 'professor') {
    header("Location: ../login.php");
    exit;
}
echo "<h1>Área do Professor - Lançar Notas</h1>";
?>