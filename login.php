<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="autenticazione.css">
</head>
<body>

<div class="contenitore">
    <div class="titolo">Login</div>

    <div class="box">
        <form action="logincheck.php" method="POST">

            <div class="riga">
                <label class="etichetta">Email</label>
                <input class="input" type="email" name="email" required>
            </div>

            <div class="riga">
                <label class="etichetta">Password</label>
                <input class="input" type="password" name="password" required>
            </div>

            <button class="bottone" type="submit">Accedi</button>
        </form>

        <div class="link-sotto">
            Non hai un account? <a href="signup.php">Registrati</a>
        </div>
    </div>
</div>

</body>
</html>