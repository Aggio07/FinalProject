<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati - La Maison</title>
    <link rel="stylesheet" href="autenticazione.css">
</head>
<body>

<div class="auth-box">

    <div class="auth-header">
        <p class="auth-etichetta">La Maison</p>
        <h1 class="auth-titolo">Registrati</h1>
    </div>

    <?php if (isset($_GET['errore'])): ?>
        <div class="messaggio-errore">Email già registrata o errore. Riprova.</div>
    <?php endif; ?>

    <form action="signupcheck.php" method="POST">
        <div class="riga-doppia">
            <div>
                <label class="etichetta">Nome</label>
                <input class="input" type="text" name="nome" required>
            </div>
            <div>
                <label class="etichetta">Cognome</label>
                <input class="input" type="text" name="cognome" required>
            </div>
        </div>
        <div class="riga">
            <label class="etichetta">Email</label>
            <input class="input" type="email" name="email" required>
        </div>
        <div class="riga">
            <label class="etichetta">Password</label>
            <input class="input" type="password" name="password" required>
        </div>
        <div class="riga-doppia">
            <div>
                <label class="etichetta">CAP</label>
                <input class="input" type="text" name="cap">
            </div>
            <div>
                <label class="etichetta">Provincia</label>
                <input class="input" type="text" name="provincia">
            </div>
        </div>
        <div class="riga">
            <label class="etichetta">Data di nascita</label>
            <input class="input" type="date" name="datanascita">
        </div>
        <button class="bottone" type="submit">Crea account</button>
    </form>

    <div class="link-sotto">
        Hai già un account? <a href="login.php">Accedi</a>
    </div>

</div>

</body>
</html>