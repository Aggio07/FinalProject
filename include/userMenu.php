<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
</head>
<body>

<nav class="navbar scrolled" id="navbar">
    <a href="../index.php" class="navbar-logo">
        <img src="../CartellaImage/logo.png" alt="La Maison">
    </a>
    <ul class="navbar-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="menu.php">Menù</a></li>
        <li><a href="recensioni.php">Recensioni</a></li>
        <li><a href="shop.php">Negozio</a></li>
    </ul>
    <div class="navbar-auth">
        <?php if (isset($_SESSION['idUtente'])): ?>
            <span class="utente-icona">● <?= htmlspecialchars($_SESSION['nome']) ?></span>
            <a href="../autenticazione/logout.php" class="navbar-btn">Esci</a>
        <?php else: ?>
            <a href="../autenticazione/login.php" class="navbar-btn">Accedi</a>
        <?php endif; ?>
    </div>
</nav>