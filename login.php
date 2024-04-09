<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen - Firework Ablaze</title>
</head>
<body>
    <h1>Inloggen bij Firework Ablaze</h1>
    <form action="login_process.php" method="post">
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Inloggen">
    </form>
    <p>Nog geen account? <a href="register.php">Registreer hier</a>.</p>
</body>
</html>