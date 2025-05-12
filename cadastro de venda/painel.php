<?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Vendas</title>
  <link rel="stylesheet" href="style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 220px;
      background-color: #2c3e50;
      padding-top: 30px;
      display: flex;
      flex-direction: column;
    }

    .sidebar a {
      color: white;
      padding: 15px 20px;
      text-decoration: none;
      display: block;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .topbar {
      background-color: #3498db;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }

    .account-menu {
      position: relative;
      display: inline-block;
    }

    .account-dropdown {
      display: none;
      position: absolute;
      right: 0;
      background-color: white;
      color: black;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
      min-width: 150px;
      border-radius: 5px;
    }

    .account-dropdown a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .account-dropdown a:hover {
      background-color: #f1f1f1;
    }

    .account-menu:hover .account-dropdown {
      display: block;
    }

    .content {
      padding: 40px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <a href="cadastro.php">Conta</a>
  <a href="produtos.php">Produto</a>
  <a href="vendas.php">Venda</a>
</div>

<div class="main">
  <div class="topbar">
    <div><strong>Sistema de Vendas</strong></div>
    <div class="account-menu">
      <span>👤 Sua Conta</span>
      <div class="account-dropdown">
        <a href="configurar.php">⚙️ Configurar</a>
        <a href="logout.php">🚪 Sair</a>
      </div>
    </div>
  </div>

  <div class="content">
    <h2>Bem-vindo ao sistema</h2>
    <?php if ($usuario): ?>
      <p>Você está logado como <strong><?= htmlspecialchars($usuario['nome']) ?></strong> (<?= $usuario['tipo'] ?>)</p>
    <?php else: ?>
      <p>Faça login para acessar os recursos.</p>
    <?php endif; ?>
  </div>
</div>

</body>
</html>
