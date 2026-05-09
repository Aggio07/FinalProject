<?php
if (!isset($_SESSION['idUtente']) || $_SESSION['ruolo'] !== 'admin') {
    header("Location: ../autenticazione/login.php");
    exit();
}

$pdo = DBHandler::getPDO();

if (isset($_GET['elimina'])) {
    $pdo->exec("DELETE FROM RECENSIONE WHERE IdRecensione = " . (int)$_GET['elimina']);
    header("Location: gestisciRecensioni.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sth = $pdo->prepare("UPDATE RECENSIONE SET RispostaAdmin = ? WHERE IdRecensione = ?");
    $sth->execute([
        htmlspecialchars(trim($_POST['risposta'])),
        (int)$_POST['idRecensione']
    ]);
    header("Location: gestisciRecensioni.php");
    exit();
}

$recensioni = $pdo->query("
    SELECT R.IdRecensione, R.Voto, R.Testo, R.Data, R.RispostaAdmin,
           U.Nome, U.Cognome, U.Email, P.Nome AS Piatto
    FROM RECENSIONE R
    JOIN UTENTE U ON R.IdUtente = U.IdUtente
    JOIN PIATTO P ON R.IdPiatto = P.IdPiatto
    ORDER BY R.Data DESC
")->fetchAll();
?>

<div class="admin-wrapper">

    <div class="admin-header">
        <div>
            <p class="admin-label">Area admin</p>
            <h1 class="admin-titolo">Gestisci recensioni</h1>
        </div>
        <p class="admin-data">Totale: <?= count($recensioni) ?></p>
    </div>

    <div class="admin-sezioni">

        <?php if (empty($recensioni)): ?>
        <div class="admin-box">
            <p class="vuoto">Nessuna recensione.</p>
        </div>
        <?php endif; ?>

        <?php foreach ($recensioni as $r): ?>
        <div class="admin-box">

            <div class="admin-box-header">
                <div class="rec-intestazione">
                    <span class="rec-nome"><?= $r['Nome'] ?> <?= $r['Cognome'] ?></span>
                    <span class="rec-email"><?= $r['Email'] ?></span>
                </div>
                <a href="?elimina=<?= $r['IdRecensione'] ?>"
                   onclick="return confirm('Eliminare?')"
                   class="btn-elimina">Elimina</a>
            </div>

            <div class="rec-corpo">
                <div class="rec-meta">
                    <span class="voto-badge voto-<?= $r['Voto'] ?>"><?= $r['Voto'] ?>/5</span>
                    <span class="rec-piatto"><?= $r['Piatto'] ?> — <?= $r['Data'] ?></span>
                </div>

                <p class="rec-testo"><?= $r['Testo'] ?></p>

                <?php if ($r['RispostaAdmin']): ?>
                <div class="risposta-esistente">
                    <p class="risposta-label">Risposta La Maison</p>
                    <p class="risposta-testo"><?= $r['RispostaAdmin'] ?></p>
                </div>
                <?php endif; ?>

                <form method="POST" class="form-risposta">
                    <input type="hidden" name="idRecensione" value="<?= $r['IdRecensione'] ?>">
                    <textarea name="risposta" rows="2" class="risposta-input"><?= $r['RispostaAdmin'] ?? '' ?></textarea>
                    <button type="submit" class="risposta-btn">
                        <?= $r['RispostaAdmin'] ? 'Aggiorna' : 'Rispondi' ?>
                    </button>
                </form>
            </div>

        </div>
        <?php endforeach; ?>

    </div>

</div>

</body>
</html>