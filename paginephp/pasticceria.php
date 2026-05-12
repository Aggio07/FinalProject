<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasticceria - La Maison</title>
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

<div class="hero-pagina" style="background-image: url('../CartellaImage/pasticceria.jpg')">
    <div class="hero-pagina-testo">
        <p class="hero-pagina-label">Il Laboratorio</p>
        <h1>La nostra pasticceria</h1>
    </div>
</div>

<section class="pagina-prodotti">

    <p class="testo-shop">
        Dolci artigianali preparati nel nostro laboratorio con ingredienti di altissima qualità
        e lavorazioni ispirate alla tradizione italiana.
    </p>

    <div class="breadcrumb">
        <a href="shop.php">Shop</a> <span>/ Pasticceria</span>
    </div>

    <div class="griglia-prodotti">

        <div class="prodotto">
            <img src="../CartellaImage/panettone.jpg" alt="Panettone artigianale">
            <div class="prodotto-body">
                <h2>Panettone artigianale</h2>
                <p>Lievitazione naturale e ingredienti selezionati.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">25 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/biscotti.jpg" alt="Biscotti della casa">
            <div class="prodotto-body">
                <h2>Biscotti della casa</h2>
                <p>Biscotti artigianali perfetti per colazione o tè.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">10 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/colomba.jpg" alt="Colomba artigianale">
            <div class="prodotto-body">
                <h2>Colomba artigianale</h2>
                <p>Dolce tradizionale con glassa croccante e mandorle.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">22 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/crostata.jpg" alt="Crostata artigianale">
            <div class="prodotto-body">
                <h2>Crostata artigianale</h2>
                <p>Pasta frolla friabile con confettura selezionata.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">16 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/macarons.jpg" alt="Macarons assortiti">
            <div class="prodotto-body">
                <h2>Macarons assortiti</h2>
                <p>Piccola pasticceria elegante dai gusti delicati.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">18 €</span>
                </div>
            </div>
        </div>

        <div class="prodotto">
            <img src="../CartellaImage/praline.jpg" alt="Praline della maison">
            <div class="prodotto-body">
                <h2>Praline della maison</h2>
                <p>Cioccolateria artigianale con ripieni raffinati.</p>
                <div class="prodotto-footer">
                    <span class="prezzo">14 €</span>
                </div>
            </div>
        </div>

    </div>

    <div class="sezione-finale">
        <h2>Disponibili anche in confezione regalo</h2>
        <p>Le nostre creazioni sono pensate anche per essere regalate o portate a casa come ricordo dell'esperienza La Maison.</p>
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