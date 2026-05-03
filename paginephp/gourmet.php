<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmet - La Maison</title>
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
        <li><a href="prenotaTavolo.php">Prenota</a></li>
        <li><a href="recensioni.php">Recensioni</a></li>
        <li><a href="shop.php" class="attivo">Negozio</a></li>
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

<div class="hero-pagina" style="background-image: url('../CartellaImage/gourmet.jpg')">
    <div class="hero-pagina-testo">
        <p class="hero-pagina-label">Eccellenze</p>
        <h1>Prodotti gourmet</h1>
    </div>
</div>

<section class="pagina-prodotti">

    <p class="testo-shop">
        Una selezione di ingredienti e specialità scelti dal nostro ristorante
        per portare a casa sapori autentici e qualità.
    </p>

    <div class="breadcrumb">
        <a href="shop.php">Shop</a> <span>/ Gourmet</span>
    </div>

    <div class="griglia-prodotti">

        <div class="prodotto">
            <img src="../CartellaImage/olio.jpg" alt="Olio extravergine">
            <div class="prodotto-body">
                <h2>Olio extravergine</h2>
                <p>Olio EVO artigianale dal gusto equilibrato.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">15 €</span>
                    <a class="bottone-shop">Scopri</a>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/pasta.jpg" alt="Pasta artigianale">
            <div class="prodotto-body">
                <h2>Pasta artigianale</h2>
                <p>Pasta prodotta con grani selezionati.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">8 €</span>
                    <a class="bottone-shop">Scopri</a>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/sugo.jpg" alt="Sugo al basilico">
            <div class="prodotto-body">
                <h2>Sugo al basilico</h2>
                <p>Sugo artigianale preparato con pomodoro fresco.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">7 €</span>
                    <a class="bottone-shop">Scopri</a>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/riso.jpg" alt="Riso selezionato">
            <div class="prodotto-body">
                <h2>Riso selezionato</h2>
                <p>Ideale per risotti cremosi e ricette della tradizione.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">9 €</span>
                    <a class="bottone-shop">Scopri</a>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/sale.jpg" alt="Sale aromatico">
            <div class="prodotto-body">
                <h2>Sale aromatico</h2>
                <p>Miscela profumata per completare piatti e degustazioni.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">6 €</span>
                    <a class="bottone-shop">Scopri</a>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/confettura.jpg" alt="Confettura artigianale">
            <div class="prodotto-body">
                <h2>Confettura artigianale</h2>
                <p>Preparata con frutta selezionata e cottura lenta.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">8 €</span>
                    <a class="bottone-shop">Scopri</a>
                </div>
            </div>
        </div>

    </div>

    <div class="sezione-finale">
        <h2>La Maison anche a casa</h2>
        <p>Una selezione di prodotti pensata per portare a tavola i profumi e i sapori del nostro ristorante, anche fuori sala.</p>
    </div>

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
            <p class="footer-titolo">Shop</p>
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