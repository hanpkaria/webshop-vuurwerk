<?php
// Verbinding maken met de database
$conn = new mysqli("localhost", "root", "", "webshop");

// Controleren op databasefouten
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ontvang de gegevens van het formulier
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];

// SQL-query om het product toe te voegen
$sql = "INSERT INTO product (product_name, description, price, stock_quantity) VALUES ('$product_name', '$description', '$price', '$stock_quantity')";

// Uitvoeren van de SQL-query
if ($conn->query($sql) === TRUE) {
    echo "Product succesvol toegevoegd<br>";
    echo '<a href="assortiment.php">Terug naar het assortiment</a>'; // Knop om terug te gaan naar het assortiment
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Sluit de databaseverbinding
$conn->close();
?>
