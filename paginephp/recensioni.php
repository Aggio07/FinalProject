<?php
session_start();
require_once "../autenticazione/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['idUtente'])) {
    $sth = $conn->prepare("INSERT INTO RECENSIONE (IdUtente, IdPiatto, Voto, Data, Testo) VALUES (:u, :p, :v, CURDATE(), :t)");
    $sth->execute([
        ":u" => $_SESSION["idUtente"],
        ":p" => (int)$_POST["idPiatto"],
        ":v" => (int)$_POST["voto"],
        ":t" => htmlspecialchars(trim($_POST["testo"]))
    ]);
    header("Location: recensioni.php");
    exit();
}

$recensioni = $conn->query("
    SELECT R.Voto, R.Testo, R.Data, R.RispostaAdmin, U.Nome, U.Cognome, P.Nome AS Piatto
    FROM RECENSIONE R
    JOIN UTENTE U ON R.IdUtente = U.IdUtente
    JOIN PIATTO P ON R.IdPiatto = P.IdPiatto
    ORDER BY R.Data DESC
")->fetchAll(PDO::FETCH_ASSOC);

$mediaVoti = $conn->query("SELECT ROUND(AVG(Voto),1) FROM RECENSIONE")->fetchColumn();
$piatti    = $conn->query("SELECT IdPiatto, Nome FROM PIATTO")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni - La Maison</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../css/recensioni.css">
</head>
<body>

<nav class="navbar scrolled" id="navbar">
    <a href="../index.php" class="navbar-logo">
        <img src="../CartellaImage/logo.png" alt="La Maison">
    </a>
    <ul class="navbar-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="menu.php">Menù</a></li>
        <li><a href="prenotaTavolo.php">Prenota</a></li>
        <li><a href="recensioni.php" class="attivo">Recensioni</a></li>
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
    <button class="navbar-hamburger" id="hamburger">☰</button>
</nav>

<div class="mobile-overlay" id="mobileOverlay">
    <nav class="mobile-menu">
        <a href="../index.php">Home</a>
        <a href="menu.php">Menù</a>
        <a href="prenotaTavolo.php">Prenota</a>
        <a href="recensioni.php">Recensioni</a>
        <a href="shop.php">Negozio</a>
        <hr>
        <?php if (isset($_SESSION['idUtente'])): ?>
            <a href="../autenticazione/logout.php">Esci</a>
        <?php else: ?>
            <a href="../autenticazione/login.php">Accedi</a>
        <?php endif; ?>
        <button id="chiudiMobile">Chiudi</button>
    </nav>
</div>

<section class="pagina-recensioni">

    <p class="rec-etichetta">La Maison</p>
    <h1 class="rec-titolo">Recensioni</h1>

    <?php if ($mediaVoti): ?>
        <p class="rec-media">Media: <?= $mediaVoti ?> / 5 ⭐</p>
    <?php endif; ?>

    <div class="rec-lista">
        <?php if (empty($recensioni)): ?>
            <p class="rec-vuoto">Nessuna recensione ancora. Sii il primo!</p>
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
                    <option value="">Seleziona un piatto</option>
                    <?php foreach ($piatti as $p): ?>
                        <option value="<?= $p['IdPiatto'] ?>"><?= htmlspecialchars($p['Nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="rec-form-gruppo">
                <label class="rec-label">Voto</label>
                <select name="voto" required class="rec-input">
                    <option value="5">5 — Eccellente ★★★★★</option>
                    <option value="4">4 — Ottimo ★★★★☆</option>
                    <option value="3">3 — Buono ★★★☆☆</option>
                    <option value="2">2 — Sufficiente ★★☆☆☆</option>
                    <option value="1">1 — Scarso ★☆☆☆☆</option>
                </select>
            </div>
            <div class="rec-form-gruppo">
                <label class="rec-label">Testo</label>
                <textarea name="testo" rows="4" required class="rec-input rec-textarea"></textarea>
            </div>
            <button type="submit" class="rec-bottone">Pubblica recensione</button>
        </form>
    </div>
    <?php else: ?>
        <p class="rec-login"><a href="../autenticazione/login.php">Accedi</a> per lasciare una recensione.</p>
    <?php endif; ?>

</section>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-col">
            <img src="../CartellaImage/logo.png" alt="La Maison" class="footer-logo">
            <p>Via Eleganza 10<br>20100 Milano<br>Tel. 02 3456789</p>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Il ristorante</p>
            <a href="chiSiamo.php">Chi siamo</a>
            <a href="menu.php">Il menù</a>
            <a href="prenotaTavolo.php">Prenota</a>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Esplora</p>
            <a href="shop.php">Shop</a>
            <a href="vini.php">Vini</a>
            <a href="pasticceria.php">Pasticceria</a>
            <a href="gourmet.php">Gourmet</a>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Account</p>
            <a href="../autenticazione/login.php">Accedi</a>
            <a href="../autenticazione/signup.php">Registrati</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© <?= date('Y') ?> La Maison. Tutti i diritti riservati.</p>
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