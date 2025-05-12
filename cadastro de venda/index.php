<?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Início - Sistema de Vendas</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      background: linear-gradient(to right, #3498db, #2ecc71);
      margin: 0;
      padding: 0;
    }

    /* Painel Lateral */
    .sidebar {
      width: 250px;
      height: 100%;
      background-color: #333;
      color: white;
      padding-top: 20px;
      position: fixed;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 10px;
      text-align: center;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      display: block;
    }

    .sidebar ul li a:hover {
      background-color: #575757;
    }

    /* Conteúdo Principal */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      flex-grow: 1;
    }

    header {
      background-color: #2c3e50;
      padding: 20px;
      color: white;
      text-align: center;
      position: relative;
    }

    /* Dropdown de conta */
    .account-menu {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #34495e;
      color: white;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #34495e;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #2ecc71;
    }

    .account-menu:hover .dropdown-content {
      display: block;
    }

    nav {
      display: flex;
      justify-content: center;
      background-color: #34495e;
    }

    nav a {
      color: white;
      padding: 15px 25px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    nav a:hover {
      background-color: #2ecc71;
    }

    .container {
      padding: 40px;
      text-align: center;
      color: white;
    }

    .usuario-logado {
      margin-top: 20px;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <!-- Painel Lateral -->
  <div class="sidebar">
    <h2>Painel Administrativo</h2>
    <ul>
      <li><a href="index.php">Início</a></li>
      <li><a href="cadastro.php">Conta</a></li>
      <li><a href="produtos.php">Produtos</a></li>
      <li><a href="vendas.php">Vendas</a></li>
      <?php if ($usuario): ?>
        <li><a href="logout.php">Sair</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <!-- Conteúdo Principal -->
  <div class="main-content">
    <header>
      <h1>Bem-vindo ao Sistema de Vendas</h1>
      
      <!-- Menu de Conta -->
      <?php if ($usuario): ?>
        <div class="account-menu">
          <?= htmlspecialchars($usuario['nome']) ?> 
          <div class="dropdown-content">
            <a href="configuracao.php">Configurar</a>
            <a href="logout.php">Sair</a>
          </div>
        </div>
      <?php endif; ?>
    </header>

    <nav>
      <a href="produtos.php">Produtos</a>
      <a href="vendas.php">Vendas</a>
    </nav>

    <div class="container">
      <h2>Escolha uma opção no menu acima para começar</h2>

      <?php if ($usuario): ?>
        <p class="usuario-logado">
          Você está logado como <strong><?= htmlspecialchars($usuario['nome']) ?></strong> (<?= $usuario['tipo'] ?>)
        </p>
      <?php else: ?>
        <p class="usuario-logado">
          Faça login ou cadastre-se para acessar os recursos.
        </p>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>
