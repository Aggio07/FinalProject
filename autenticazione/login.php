<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi - La Maison</title>
    <link rel="stylesheet" href="autenticazione.css">
</head>
<body>

<div class="auth-box">

    <div class="auth-header">
        <p class="auth-etichetta">La Maison</p>
        <h1 class="auth-titolo">Accedi</h1>
    </div>

    <form action="logincheck.php" method="POST">
        <div class="riga">
            <label class="etichetta">Email</label>
            <input class="input" type="email" name="email" required autofocus>
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

</body>
</html>