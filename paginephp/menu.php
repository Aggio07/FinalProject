<?php
$pdo = DBHandler::getPDO();

$antipasti = $pdo->query("SELECT Nome, Descrizione, Prezzo FROM PIATTO WHERE Tipo = 'Antipasto' ORDER BY Prezzo")->fetchAll();
$primi = $pdo->query("SELECT Nome, Descrizione, Prezzo FROM PIATTO WHERE Tipo = 'Primo' ORDER BY Prezzo")->fetchAll();
$secondi = $pdo->query("SELECT Nome, Descrizione, Prezzo FROM PIATTO WHERE Tipo = 'Secondo' ORDER BY Prezzo")->fetchAll();
$dolci = $pdo->query("SELECT Nome, Descrizione, Prezzo FROM PIATTO WHERE Tipo = 'Dolce' ORDER BY Prezzo")->fetchAll();
?>

<link rel="stylesheet" href="../css/menu.css">

<section class="pagina-menu">

    <p class="menu-etichetta">La Maison</p>
    <h1 class="menu-titolo">Il nostro menù</h1>

    <p class="menu-intro">
        Una selezione di piatti della tradizione italiana preparati con ingredienti freschi e di qualità.
    </p>

    <!-- ANTIPASTI -->
    <?php if (!empty($antipasti)): ?>
    <div class="menu-sezione">
        <h2 class="menu-categoria">Antipasti</h2>
        <div class="piatti-lista">
            <?php foreach ($antipasti as $p): ?>
            <div class="piatto-card">
                <div class="piatto-header">
                    <h3 class="piatto-nome"><?= htmlspecialchars($p['Nome']) ?></h3>
                    <span class="piatto-prezzo"><?= number_format($p['Prezzo'], 2) ?> €</span>
                </div>
                <p class="piatto-descrizione"><?= htmlspecialchars($p['Descrizione']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- PRIMI -->
    <?php if (!empty($primi)): ?>
    <div class="menu-sezione">
        <h2 class="menu-categoria">Primi Piatti</h2>
        <div class="piatti-lista">
            <?php foreach ($primi as $p): ?>
            <div class="piatto-card">
                <div class="piatto-header">
                    <h3 class="piatto-nome"><?= htmlspecialchars($p['Nome']) ?></h3>
                    <span class="piatto-prezzo"><?= number_format($p['Prezzo'], 2) ?> €</span>
                </div>
                <p class="piatto-descrizione"><?= htmlspecialchars($p['Descrizione']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- SECONDI -->
    <?php if (!empty($secondi)): ?>
    <div class="menu-sezione">
        <h2 class="menu-categoria">Secondi Piatti</h2>
        <div class="piatti-lista">
            <?php foreach ($secondi as $p): ?>
            <div class="piatto-card">
                <div class="piatto-header">
                    <h3 class="piatto-nome"><?= htmlspecialchars($p['Nome']) ?></h3>
                    <span class="piatto-prezzo"><?= number_format($p['Prezzo'], 2) ?> €</span>
                </div>
                <p class="piatto-descrizione"><?= htmlspecialchars($p['Descrizione']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- DOLCI -->
    <?php if (!empty($dolci)): ?>
    <div class="menu-sezione">
        <h2 class="menu-categoria">Dolci</h2>
        <div class="piatti-lista">
            <?php foreach ($dolci as $p): ?>
            <div class="piatto-card">
                <div class="piatto-header">
                    <h3 class="piatto-nome"><?= htmlspecialchars($p['Nome']) ?></h3>
                    <span class="piatto-prezzo"><?= number_format($p['Prezzo'], 2) ?> €</span>
                </div>
                <p class="piatto-descrizione"><?= htmlspecialchars($p['Descrizione']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
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

</body>
</html>