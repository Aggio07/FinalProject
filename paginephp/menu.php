<?php
$pdo = DBHandler::getPDO();

$piatti = $pdo->query("SELECT Nome, Descrizione, Prezzo FROM PIATTO ORDER BY Prezzo")->fetchAll();
?>

<link rel="stylesheet" href="../css/menu.css">

<section class="pagina-menu">

    <p class="menu-etichetta">La Maison</p>
    <h1 class="menu-titolo">Il nostro menù</h1>

    <p class="menu-intro">
        Una selezione di piatti della tradizione italiana preparati con ingredienti freschi e di qualità.
    </p>

    <div class="piatti-lista">
        <?php if (empty($piatti)): ?>
            <p class="menu-vuoto">Nessun piatto disponibile al momento.</p>
        <?php endif; ?>

        <?php foreach ($piatti as $piatto): ?>
        <div class="piatto-card">
            <div class="piatto-header">
                <h3 class="piatto-nome"><?= htmlspecialchars($piatto['Nome']) ?></h3>
                <span class="piatto-prezzo"><?= number_format($piatto['Prezzo'], 2) ?> €</span>
            </div>
            <p class="piatto-descrizione"><?= htmlspecialchars($piatto['Descrizione']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>

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