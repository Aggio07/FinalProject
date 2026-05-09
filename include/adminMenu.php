<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<nav class="navbar scrolled">
    <a href="../index.php" class="navbar-logo">
        <img src="../CartellaImage/logo.png" alt="La Maison">
    </a>
    <ul class="navbar-links">
        <li><a href="statistiche.php">Dashboard</a></li>
        <li><a href="gestisciRecensioni.php">Recensioni</a></li>
    </ul>
    <div class="navbar-auth">
        <span class="utente-icona">👑 <?= htmlspecialchars($_SESSION['nome']) ?></span>
        <a href="../autenticazione/logout.php" class="navbar-btn">Esci</a>
    </div>
</nav>