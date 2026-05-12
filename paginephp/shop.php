<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - La Maison</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../css/shop.css">
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
        <li><a href="shop.php" class="attivo">Negozio</a></li>
    </ul>
    <div class="navbar-auth">
        <?php if (isset($_SESSION['idUtente'])): ?>
            <span class="utente-icona">● <?= htmlspecialchars($_SESSION['nome']) ?></span>
            <?php if ($_SESSION['ruolo'] === 'admin'): ?>
                <a href="statistiche.php" class="navbar-btn">Admin</a>
            <?php endif; ?>
            <a href="../autenticazione/logout.php" class="navbar-btn">Esci</a>
        <?php else: ?>
            <a href="../autenticazione/login.php" class="navbar-btn">Accedi</a>
        <?php endif; ?>
    </div>
</nav>

<section class="pagina-shop">

    <p class="sottotitolo-categoria">La Maison</p>
    <h1 class="titolo-shop">Il nostro shop</h1>

    <p class="testo-shop">
        Una selezione di prodotti firmati La Maison pensata per portare a casa
        l'eleganza, i sapori e la qualità del nostro ristorante.
    </p>

    <div class="griglia-categorie">

        <a href="pasticceria.php" class="scheda-categoria">
            <img src="../CartellaImage/pasticceria.jpg" alt="La nostra pasticceria">
            <div class="contenuto-categoria">
                <p class="categoria-piccola">Il Laboratorio</p>
                <h2>La nostra pasticceria</h2>
                <p>Dolci artigianali, panettoni, biscotti e creazioni della casa preparate con ingredienti selezionati.</p>
                <span class="link-categoria">Scopri di più →</span>
            </div>
        </a>

        <a href="vini.php" class="scheda-categoria">
            <img src="../CartellaImage/vino.jpg" alt="I nostri vini">
            <div class="contenuto-categoria">
                <p class="categoria-piccola">La Cantina</p>
                <h2>Vini pregiati</h2>
                <p>Una selezione di bottiglie scelte per accompagnare l'esperienza gastronomica del nostro ristorante.</p>
                <span class="link-categoria">Scopri di più →</span>
            </div>
        </a>

        <a href="gourmet.php" class="scheda-categoria">
            <img src="../CartellaImage/gourmet.jpg" alt="Prodotti gourmet">
            <div class="contenuto-categoria">
                <p class="categoria-piccola">Eccellenze</p>
                <h2>Prodotti gourmet</h2>
                <p>Olio, pasta artigianale, sughi e specialità selezionate per portare La Maison anche a casa.</p>
                <span class="link-categoria">Scopri di più →</span>
            </div>
        </a>

    </div>

</section>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-col">
            <img src="../CartellaImage/logo.png" alt="La Maison" class="footer-logo">
            <p>Via Eleganza 10<br>20100 Milano<br>Tel. 02 3456789</p>
            <p style="margin-top:12px;">info@lamaison.it</p>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Il ristorante</p>
            <a href="menu.php">Il menù</a>
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
            <a href="recensioni.php">Recensioni</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© <?= date('Y') ?> La Maison. Tutti i diritti riservati.</p>
    </div>
</footer>

</body>
</html>