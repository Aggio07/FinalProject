<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>La Sala - La Maison</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../css/pagine-semplici.css">
</head>
<body>

<nav class="navbar scrolled">
    <a href="../index.php" class="navbar-logo">
        <img src="../CartellaImage/logo.png" alt="La Maison">
    </a>
    <ul class="navbar-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="menu.php">Menù</a></li>
        <li><a href="recensioni.php">Recensioni</a></li>
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
</nav>

<div class="pagina-hero">
    <img src="../CartellaImage/sfondohome.jpg" alt="La sala">
    <div class="pagina-hero-overlay">
        <p class="etichetta-pagina">Ristorazione</p>
        <h1 class="titolo-pagina">La sala</h1>
    </div>
</div>

<div class="contenitore-pagina">
    
    <p class="intro-grande">
        Un ambiente elegante e raccolto, perfetto per ogni occasione speciale.
    </p>
    
    <div class="divisore-oro"></div>
    
    <div class="testo-corpo">
        <p>
            La sala de La Maison è stata progettata per accogliere fino a 120 coperti, garantendo privacy e intimità. 
            Ogni tavolo è curato nei minimi dettagli, dalla mise en place alla scelta delle luci soffuse che accompagnano la serata.
        </p>
        
        <p>
            Le ampie vetrate regalano una vista suggestiva sul centro di Milano, mentre l'arredamento in legno e acciaio 
            crea un equilibrio perfetto tra tradizione e modernità.
        </p>
        
        <p>
            Che si tratti di una cena romantica, un anniversario o un evento aziendale, 
            la nostra sala saprà rendere ogni occasione speciale e memorabile.
        </p>
    </div>

</div>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-col">
            <img src="../CartellaImage/logo.png" alt="La Maison" class="footer-logo">
            <p>Via Eleganza 10<br>Milano<br>Tel. 02 3456789</p>
        </div>
        <div class="footer-col">
            <p class="footer-titolo">Ristorante</p>
            <a href="menu.php">Menù</a>
            <a href="recensioni.php">Recensioni</a>
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