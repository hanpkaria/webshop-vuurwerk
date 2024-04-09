<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - SkyBlaze FireWorks</title>
</head>
<body>
    <h1>Registreren bij SkyBlaze FireWorks</h1>
    <form action="register_process.php" method="post">
        <label for="first_name">Voornaam:</label><br>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <label for="last_name">Achternaam:</label><br>
        <input type="text" id="last_name" name="last_name" required><br><br>
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Registreren">
    </form>
    <p>Heb je al een account? <a href="login.php">Log hier in</a>.</p>
</body>
</html>