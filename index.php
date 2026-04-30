<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Maison - Restaurant</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <!-- NAVBAR ORIZZONTALE -->
    <nav class="navbar" id="navbar">
        <a href="index.php" class="navbar-logo">
            <img src="CartellaImage/logo.png" alt="La Maison">
        </a>
        <ul class="navbar-links">
            <li><a href="index.php" class="attivo">Home</a></li>
            <li><a href="paginephp/menu.php">Menù</a></li>
            <li><a href="paginephp/prenotaTavolo.php">Prenota</a></li>
            <li><a href="paginephp/recensioni.php">Recensioni</a></li>
            <li><a href="paginephp/shop.php">Negozio</a></li>
        </ul>
        <div class="navbar-auth">
            <?php if (isset($_SESSION['idUtente'])): ?>
                <span class="utente-icona">● <?= htmlspecialchars($_SESSION['nome']) ?></span>
                <?php if ($_SESSION['ruolo'] === 'admin'): ?>
                    <a href="paginephp/statistiche.php" class="navbar-btn">Admin</a>
                <?php endif; ?>
                <a href="autenticazione/logout.php" class="navbar-btn">Esci</a>
            <?php else: ?>
                <a href="autenticazione/login.php" class="navbar-btn">Accedi</a>
            <?php endif; ?>
        </div>
        <button class="navbar-hamburger" id="hamburger">☰</button>
    </nav>

    <!-- MENU MOBILE -->
    <div class="mobile-overlay" id="mobileOverlay">
        <nav class="mobile-menu">
            <a href="index.php">Home</a>
            <a href="paginephp/menu.php">Menù</a>
            <a href="paginephp/prenotaTavolo.php">Prenota</a>
            <a href="paginephp/recensioni.php">Recensioni</a>
            <a href="paginephp/shop.php">Negozio</a>
            <hr>
            <?php if (isset($_SESSION['idUtente'])): ?>
                <a href="autenticazione/logout.php">Esci</a>
            <?php else: ?>
                <a href="autenticazione/login.php">Accedi</a>
            <?php endif; ?>
            <button id="chiudiMobile">Chiudi</button>
        </nav>
    </div>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-testo">
            <p class="hero-label">Restaurant · Milano</p>
            <h1>Un'esperienza<br>indimenticabile</h1>
            <p class="hero-sub">L'incontro dei sapori più pregiati</p>
            <div class="hero-cta">
                <a href="paginephp/prenotaTavolo.php" class="btn-gold">Prenota un tavolo</a>
                <a href="paginephp/menu.php" class="btn-outline">Scopri il menù</a>
            </div>
        </div>
        <a href="#storia" class="scroll-down">
            <span>Scopri</span>
            <div class="scroll-line"></div>
        </a>
    </section>

    <!-- SEZIONE STORIA 1 -->
    <section class="sezione-split" id="storia">
        <div class="split-testo">
            <p class="etichetta">La nostra storia</p>
            <h2>Nati dalla passione<br>per la cucina</h2>
            <div class="divisore"></div>
            <p>La Maison nasce nel cuore di Milano come luogo dove la tradizione italiana incontra l'eleganza contemporanea. Ogni piatto racconta una storia, ogni ingrediente è scelto con cura dai migliori produttori locali.</p>
            <p>Dalla fondazione ad oggi, il nostro impegno è rimasto invariato: offrire un'esperienza gastronomica che resti nel ricordo di chi ci sceglie.</p>
            <a href="paginephp/chiSiamo.php" class="link-testo">Chi siamo →</a>
        </div>
        <div class="split-immagine">
            <img src="CartellaImage/sfondohome.jpg" alt="La Maison - Il ristorante">
        </div>
    </section>

    <!-- SEZIONE NUMERI -->
    <section class="sezione-numeri">
        <div class="numeri-grid">
            <div class="numero-item">
                <span class="numero-valore">15</span>
                <span class="numero-label">Anni di storia</span>
            </div>
            <div class="numero-item">
                <span class="numero-valore">3</span>
                <span class="numero-label">Chef premiati</span>
            </div>
            <div class="numero-item">
                <span class="numero-valore">120</span>
                <span class="numero-label">Coperti</span>
            </div>
            <div class="numero-item">
                <span class="numero-valore">800+</span>
                <span class="numero-label">Etichette in cantina</span>
            </div>
        </div>
    </section>

    <!-- SEZIONE CUCINA -->
    <section class="sezione-split inversa">
        <div class="split-testo">
            <p class="etichetta">La nostra cucina</p>
            <h2>Ingredienti selezionati,<br>sapori autentici</h2>
            <div class="divisore"></div>
            <p>Ogni mattina selezioniamo gli ingredienti migliori dai produttori del territorio. La nostra cucina è un omaggio alla tradizione lombarda, interpretata con tecnica e creatività contemporanea.</p>
            <a href="paginephp/menu.php" class="link-testo">Vedi il menù →</a>
        </div>
        <div class="split-immagine">
            <img src="CartellaImage/piattoStellato.jpg" alt="La nostra cucina">
        </div>
    </section>

    <!-- CITAZIONE -->
    <section class="sezione-citazione">
        <blockquote>"La cucina è l'arte di trasformare gli ingredienti in emozioni"</blockquote>
        <cite>— Chef La Maison</cite>
    </section>

    <!-- ESPERIENZE -->
    <section class="sezione-esperienze">
        <div class="esperienze-header">
            <p class="etichetta">Esplora</p>
            <h2>Le nostre esperienze</h2>
        </div>
        <div class="esperienze-grid">

            <a href="paginephp/menu.php" class="exp-card">
                <div class="exp-img" style="background-image:url('CartellaImage/sfondohome.jpg')"></div>
                <div class="exp-body">
                    <p class="etichetta">Ristorazione</p>
                    <h3>La sala</h3>
                    <p>Un ambiente elegante e raccolto, perfetto per ogni occasione speciale.</p>
                </div>
            </a>

            <a href="paginephp/chiSiamo.php" class="exp-card">
                <div class="exp-img" style="background-image:url('CartellaImage/chef.jpg')"></div>
                <div class="exp-body">
                    <p class="etichetta">La brigata</p>
                    <h3>I nostri chef</h3>
                    <p>Talento, passione e tecnica: scopri le persone che ogni giorno danno vita alla cucina La Maison.</p>
                </div>
            </a>

            <a href="paginephp/prenotaTavolo.php" class="exp-card">
                <div class="exp-img" style="background-image:url('CartellaImage/occasioni.jpg')"></div>
                <div class="exp-body">
                    <p class="etichetta">Momenti speciali</p>
                    <h3>Occasioni speciali</h3>
                    <p>Compleanni, anniversari, cene di lavoro: affidaci il tuo momento e lo renderemo indimenticabile.</p>
                </div>
            </a>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-col">
                <img src="CartellaImage/logo.png" alt="La Maison" class="footer-logo">
                <p>Via Eleganza 10<br>20100 Milano<br>Tel. 02 3456789</p>
                <p style="margin-top:12px;">info@lamaison.it</p>
            </div>
            <div class="footer-col">
                <p class="footer-titolo">Il ristorante</p>
                <a href="paginephp/chiSiamo.php">Chi siamo</a>
                <a href="paginephp/storia.php">La nostra storia</a>
                <a href="paginephp/menu.php">Il menù</a>
                <a href="paginephp/prenotaTavolo.php">Prenota un tavolo</a>
            </div>
            <div class="footer-col">
                <p class="footer-titolo">Esplora</p>
                <a href="paginephp/shop.php">Shop</a>
                <a href="paginephp/vini.php">Vini</a>
                <a href="paginephp/pasticceria.php">Pasticceria</a>
                <a href="paginephp/gourmet.php">Gourmet</a>
            </div>
            <div class="footer-col">
                <p class="footer-titolo">Account</p>
                <a href="autenticazione/login.php">Accedi</a>
                <a href="autenticazione/signup.php">Registrati</a>
                <a href="paginephp/recensioni.php">Recensioni</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© <?= date('Y') ?> La Maison. Tutti i diritti riservati.</p>
        </div>
    </footer>

    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });
        document.getElementById('hamburger').addEventListener('click', () => {
            document.getElementById('mobileOverlay').classList.add('attivo');
        });
        document.getElementById('chiudiMobile').addEventListener('click', () => {
            document.getElementById('mobileOverlay').classList.remove('attivo');
        });
    </script>

</body>
</html>