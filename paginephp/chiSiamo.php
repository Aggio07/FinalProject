<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Chi Siamo - La Maison</title>
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
    <img src="../CartellaImage/sfondohome.jpg" alt="Chi siamo">
    <div class="pagina-hero-overlay">
        <p class="etichetta-pagina">La Maison</p>
        <h1 class="titolo-pagina">Chi siamo</h1>
    </div>
</div>

<div class="contenitore-pagina">
    
    <p class="intro-grande">
        Nel cuore di Milano, dove la tradizione incontra l'innovazione.
    </p>
    
    <div class="divisore-oro"></div>
    
    <div class="testo-corpo">
        <p>
            La Maison nasce nel 2010 dalla passione di tre amici chef che condividevano un sogno: 
            creare un luogo dove la cucina italiana potesse essere celebrata con eleganza e autenticità. 
            Situato in Via Eleganza 10, nel cuore pulsante di Milano, il nostro ristorante è diventato 
            un punto di riferimento per chi cerca un'esperienza gastronomica memorabile.
        </p>
        
        <p>
            Ogni mattina selezioniamo personalmente gli ingredienti dai migliori produttori del territorio lombardo. 
            La nostra filosofia è semplice: rispetto per la materia prima, tecnica impeccabile e creatività controllata. 
            Crediamo che la grande cucina nasca dall'equilibrio tra tradizione e innovazione.
        </p>
        
        <p>
            Con 120 coperti distribuiti in una sala elegante e raccolta, offriamo un'atmosfera intima 
            perfetta per ogni occasione. La nostra cantina conta oltre 800 etichette accuratamente selezionate, 
            mentre il nostro team di tre chef premiati lavora ogni giorno per sorprendere e deliziare i nostri ospiti.
        </p>
        
        <p>
            La Maison non è solo un ristorante: è un'esperienza che coinvolge tutti i sensi, 
            un viaggio attraverso i sapori della tradizione italiana reinterpretati con sensibilità contemporanea.
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