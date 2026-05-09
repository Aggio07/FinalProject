<?php
$pdo = DBHandler::getPDO();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['idUtente'])) {
    $sth = $pdo->prepare("INSERT INTO RECENSIONE (IdUtente, IdPiatto, Voto, Data, Testo) VALUES (?, ?, ?, CURDATE(), ?)");
    $sth->execute([
        $_SESSION["idUtente"],
        (int)$_POST["idPiatto"],
        (int)$_POST["voto"],
        htmlspecialchars(trim($_POST["testo"]))
    ]);
    header("Location: recensioni.php");
    exit();
}

$recensioni = $pdo->query("
    SELECT R.Voto, R.Testo, R.Data, R.RispostaAdmin, U.Nome, U.Cognome, P.Nome AS Piatto
    FROM RECENSIONE R
    JOIN UTENTE U ON R.IdUtente = U.IdUtente
    JOIN PIATTO P ON R.IdPiatto = P.IdPiatto
    ORDER BY R.Data DESC
")->fetchAll();

$mediaVoti = $pdo->query("SELECT ROUND(AVG(Voto),1) FROM RECENSIONE")->fetchColumn();
$piatti = $pdo->query("SELECT IdPiatto, Nome FROM PIATTO")->fetchAll();
?>

<link rel="stylesheet" href="../css/recensioni.css">

<section class="pagina-recensioni">

    <p class="rec-etichetta">La Maison</p>
    <h1 class="rec-titolo">Recensioni</h1>

    <?php if ($mediaVoti): ?>
        <p class="rec-media">Media: <?= $mediaVoti ?> / 5 ⭐</p>
    <?php endif; ?>

    <div class="rec-lista">
        <?php if (empty($recensioni)): ?>
            <p class="rec-vuoto">Nessuna recensione ancora.</p>
        <?php endif; ?>

        <?php foreach ($recensioni as $r): ?>
        <div class="rec-card">
            <div class="rec-card-header">
                <span class="rec-autore"><?= htmlspecialchars($r['Nome']) ?> <?= htmlspecialchars($r['Cognome']) ?></span>
                <span class="rec-stelle"><?= str_repeat('★', $r['Voto']) ?><?= str_repeat('☆', 5 - $r['Voto']) ?></span>
            </div>
            <p class="rec-piatto"><?= htmlspecialchars($r['Piatto']) ?> — <?= $r['Data'] ?></p>
            <p class="rec-testo"><?= htmlspecialchars($r['Testo']) ?></p>

            <?php if ($r['RispostaAdmin']): ?>
            <div class="rec-risposta">
                <p class="rec-risposta-label">Risposta de La Maison</p>
                <p class="rec-risposta-testo"><?= htmlspecialchars($r['RispostaAdmin']) ?></p>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <?php if (isset($_SESSION['idUtente'])): ?>
    <div class="rec-form-wrapper">
        <p class="rec-etichetta">La tua opinione</p>
        <h2 class="rec-form-titolo">Scrivi una recensione</h2>
        <form action="recensioni.php" method="POST" class="rec-form">
            <div class="rec-form-gruppo">
                <label class="rec-label">Piatto</label>
                <select name="idPiatto" required class="rec-input">
                    <option value="">Seleziona</option>
                    <?php foreach ($piatti as $p): ?>
                        <option value="<?= $p['IdPiatto'] ?>"><?= htmlspecialchars($p['Nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="rec-form-gruppo">
                <label class="rec-label">Voto</label>
                <select name="voto" required class="rec-input">
                    <option value="5">5 ★★★★★</option>
                    <option value="4">4 ★★★★☆</option>
                    <option value="3">3 ★★★☆☆</option>
                    <option value="2">2 ★★☆☆☆</option>
                    <option value="1">1 ★☆☆☆☆</option>
                </select>
            </div>
            <div class="rec-form-gruppo">
                <label class="rec-label">Testo</label>
                <textarea name="testo" rows="4" required class="rec-input rec-textarea"></textarea>
            </div>
            <button type="submit" class="rec-bottone">Pubblica</button>
        </form>
    </div>
    <?php else: ?>
        <p class="rec-login"><a href="../autenticazione/login.php">Accedi</a> per recensire.</p>
    <?php endif; ?>

</section>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-col">
            <img src="../CartellaImage/logo.png" alt="La Maison" class="footer-logo">
            <p>Via Eleganza 10<br>Milano<br>Tel. 02 3456789</p>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Ristorante</p>
            <a href="chiSiamo.php">Chi siamo</a>
            <a href="menu.php">Menù</a>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Shop</p>
            <a href="shop.php">Shop</a>
            <a href="vini.php">Vini</a>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Account</p>
            <a href="../autenticazione/login.php">Accedi</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© <?= date('Y') ?> La Maison</p>
    </div>
</footer>

<script>
    document.getElementById('hamburger').addEventListener('click', () => {
        document.getElementById('mobileOverlay').classList.add('attivo');
    });
    document.getElementById('chiudiMobile').addEventListener('click', () => {
        document.getElementById('mobileOverlay').classList.remove('attivo');
    });
</script>

</body>
</html>