<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>I Nostri Chef - La Maison</title>
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
    <img src="../CartellaImage/chef.jpg" alt="I nostri chef">
    <div class="pagina-hero-overlay">
        <p class="etichetta-pagina">La Brigata</p>
        <h1 class="titolo-pagina">I nostri chef</h1>
    </div>
</div>

<div class="contenitore-pagina">
    
    <p class="intro-grande">
        Talento, passione e tecnica al servizio della cucina.
    </p>
    
    <div class="divisore-oro"></div>
    
    <div class="chef-lista">
        
        <div class="chef-item">
            <h2 class="chef-nome">Chef Matteo Bellini</h2>
            <p class="chef-ruolo">Executive Chef</p>
            <p class="chef-bio">
                Con oltre 15 anni di esperienza, Chef Matteo porta una visione contemporanea della cucina italiana 
                basata sul rispetto degli ingredienti e sull'equilibrio tra tradizione e innovazione.
            </p>
        </div>
        
        <div class="chef-item">
            <h2 class="chef-nome">Chef Laura Ferri</h2>
            <p class="chef-ruolo">Sous Chef</p>
            <p class="chef-bio">
                Specializzata nella preparazione di primi piatti e risotti, Chef Laura rende ogni piatto 
                un'esperienza unica grazie alla sua attenzione alla mantecatura e alla scelta delle materie prime.
            </p>
        </div>
        
        <div class="chef-item">
            <h2 class="chef-nome">Chef Andrea Costa</h2>
            <p class="chef-ruolo">Pastry Chef</p>
            <p class="chef-bio">
                Vincitore di premi internazionali, Chef Andrea guida il laboratorio di pasticceria 
                creando dessert che uniscono tecnica francese e ingredienti italiani.
            </p>
        </div>
        
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