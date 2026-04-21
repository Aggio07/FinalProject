<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <link rel="stylesheet" href="autenticazione.css">
</head>
<body>

<div class="contenitore">
    <div class="titolo">Registrazione</div>

    <div class="box">
        <form action="signupcheck.php" method="POST">

            <div class="riga">
                <label class="etichetta">Nome</label>
                <input class="input" type="text" name="nome" required>
            </div>

            <div class="riga">
                <label class="etichetta">Cognome</label>
                <input class="input" type="text" name="cognome" required>
            </div>

            <div class="riga">
                <label class="etichetta">Email</label>
                <input class="input" type="email" name="email" required>
            </div>

            <div class="riga">
                <label class="etichetta">Password</label>
                <input class="input" type="password" name="password" required>
            </div>

            <div class="riga">
                <label class="etichetta">CAP</label>
                <input class="input" type="text" name="cap">
            </div>

            <div class="riga">
                <label class="etichetta">Data di nascita</label>
                <input class="input" type="date" name="datanascita">
            </div>

            <div class="riga">
                <label class="etichetta">Provincia</label>
                <input class="input" type="text" name="provincia">
            </div>

            <button class="bottone" type="submit">Registrati</button>
        </form>

        <div class="link-sotto">
            Hai già un account? <a href="login.php">Login</a>
        </div>
    </div>
</div>

</body>
</html>