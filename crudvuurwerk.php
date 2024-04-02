<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop CRUD</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
// Verbinding maken met de database
$servername = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$dbname = "webshop";




// CRUD-operaties

// Functie om alle klanten op te halen
function getKlanten($conn) {
    $sql = "SELECT * FROM klant";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Klantcode</th><th>Klantnaam</th><th>Klantadres</th><th>Klantplaats</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["klantcode"]."</td><td>".$row["klantnaam"]."</td><td>".$row["klantadres"]."</td><td>".$row["klantplaats"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Geen klanten gevonden.";
    }
}

// Functie om een nieuwe klant toe te voegen...

function addKlant($conn, $klantnaam, $klantadres, $klantplaats) {
    $sql = "INSERT INTO klant (klantnaam, klantadres, klantplaats) VALUES ('$klantnaam', '$klantadres', '$klantplaats')";
    if ($conn->query($sql) === TRUE) {
        echo "Nieuwe klant toegevoegd.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Functie om een klant te verwijderen
function deleteKlant($conn, $klantcode) {
    $sql = "DELETE FROM klant WHERE klantcode=$klantcode";
    if ($conn->query($sql) === TRUE) {
        echo "Klant verwijderd.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Als er een formulier is ingediend, voer dan de bijbehorende actie uit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addKlant"])) {
        addKlant($conn, $_POST["klantnaam"], $_POST["klantadres"], $_POST["klantplaats"]);
    } elseif (isset($_POST["deleteKlant"])) {
        deleteKlant($conn, $_POST["klantcode"]);
    }
}

// HTML-formulier om een nieuwe klant toe te voegen
?>
<form method="post">
    <h2>Nieuwe klant toevoegen</h2>
    Klantnaam: <input type="text" name="klantnaam"><br>
    Klantadres: <input type="text" name="klantadres"><br>
    Klantplaats: <input type="text" name="klantplaats"><br>
    <input type="submit" name="addKlant" value="Klant Toevoegen">
</form>

<?php
// Laat alle klanten zien
echo "<h2>Alle klanten</h2>";
getKlanten($conn);

$conn->close();
?>
</body>
</html>