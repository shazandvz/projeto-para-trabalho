<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo com POST</title>
</head>
<body>
    <?php
    if (isset($_POST['palavra'])) { ?>
        <h3>Buscar por: <?= htmlspecialchars($_POST['palavra']) ?></h3>
    <?php
    }
    ?>
    <form method="post">
        <p>Digite uma palavra:</p>
        <input type="text" name="palavra" id="palavra">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
