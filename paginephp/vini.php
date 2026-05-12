<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vini - La Maison</title>
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
            <a href="../autenticazione/logout.php" class="navbar-btn">Esci</a>
        <?php else: ?>
            <a href="../autenticazione/login.php" class="navbar-btn">Accedi</a>
        <?php endif; ?>
    </div>
</nav>

<div class="hero-pagina" style="background-image: url('../CartellaImage/vino.jpg')">
    <div class="hero-pagina-testo">
        <p class="hero-pagina-label">La Cantina</p>
        <h1>I nostri vini</h1>
    </div>
</div>

<section class="pagina-prodotti">

    <p class="testo-shop">
        Una selezione di etichette scelte per accompagnare i piatti del nostro ristorante
        e valorizzare ogni esperienza a tavola.
    </p>

    <div class="breadcrumb">
        <a href="shop.php">Shop</a> <span>/ Vini</span>
    </div>

    <div class="griglia-prodotti">

        <div class="prodotto">
            <img src="../CartellaImage/vinorosso.jpg" alt="Vino rosso">
            <div class="prodotto-body">
                <h2>Vino rosso della casa</h2>
                <p>Rosso intenso perfetto per carni e piatti strutturati.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">22 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/vinobianco.jpg" alt="Vino bianco">
            <div class="prodotto-body">
                <h2>Vino bianco selezionato</h2>
                <p>Bianco fresco e profumato ideale per piatti delicati.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">20 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/spumante.jpg" alt="Spumante">
            <div class="prodotto-body">
                <h2>Spumante brut</h2>
                <p>Elegante e raffinato, perfetto per aperitivi.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">28 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/champagne.jpg" alt="Champagne">
            <div class="prodotto-body">
                <h2>Champagne sélection</h2>
                <p>Bottiglia prestigiosa per occasioni speciali.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">45 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/rose.jpg" alt="Rosé">
            <div class="prodotto-body">
                <h2>Rosé elegante</h2>
                <p>Note fresche e floreali, ideale per aperitivi e antipasti.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">24 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/passito.jpg" alt="Passito">
            <div class="prodotto-body">
                <h2>Passito da dessert</h2>
                <p>Vino dolce perfetto per accompagnare la pasticceria.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">26 €</span>
                </div>
            </div>
        </div>

    </div>

    <div class="sezione-finale">
        <h2>Una bottiglia per ogni momento</h2>
        <p>Dalla tavola quotidiana alle occasioni più speciali, la nostra selezione è pensata per accompagnare con stile ogni esperienza.</p>
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

</body>
</html>