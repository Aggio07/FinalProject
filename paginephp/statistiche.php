<?php
if (!isset($_SESSION['idUtente']) || $_SESSION['ruolo'] !== 'admin') {
    header("Location: ../autenticazione/login.php");
    exit();
}

$pdo = DBHandler::getPDO();

$nClienti = $pdo->query("SELECT COUNT(*) FROM UTENTE WHERE Ruolo = 'cliente'")->fetchColumn();
$nRecensioni = $pdo->query("SELECT COUNT(*) FROM RECENSIONE")->fetchColumn();
$mediaVoti = $pdo->query("SELECT ROUND(AVG(Voto),1) FROM RECENSIONE")->fetchColumn();
?>

<div class="admin-wrapper">

    <div class="admin-header">
        <div>
            <p class="admin-label">Area admin</p>
            <h1 class="admin-titolo">Dashboard</h1>
        </div>
        <p class="admin-data">Oggi: <?= date('d/m/Y') ?></p>
    </div>

    <div class="stat-grid-simple">
        <div class="stat-card">
            <span class="stat-icona">👤</span>
            <span class="stat-numero"><?= $nClienti ?></span>
            <span class="stat-label">Clienti</span>
        </div>
        <div class="stat-card">
            <span class="stat-icona">⭐</span>
            <span class="stat-numero"><?= $nRecensioni ?></span>
            <span class="stat-label">Recensioni</span>
        </div>
        <div class="stat-card">
            <span class="stat-icona">📊</span>
            <span class="stat-numero"><?= $mediaVoti ?? '—' ?></span>
            <span class="stat-label">Media voti</span>
        </div>
    </div>

    <div class="admin-sezioni">
        <div class="admin-box">
            <p class="box-messaggio">Clicca su "Recensioni" per gestirle.</p>
        </div>
    </div>

</div>

</body>
</html>