<?php

// Functie om een nieuwe klant toe te voegen
function addCustomer($conn, $firstName, $lastName, $email, $address) {
    $sql = "INSERT INTO customer (first_name, last_name, email, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $address);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Verbinding maken met de database (voeg je eigen databasegegevens toe)
$conn = new mysqli("localhost", "root", "", "webshop");

// Controleren op databasefouten
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL voor het maken van TABEL
$sql = "
CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL
);

CREATE TABLE IF NOT EXISTS customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address TEXT
);

CREATE TABLE IF NOT EXISTS `order` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE IF NOT EXISTS stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product(id)
);";

// Uitvoeren van SQL-query
if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}

// Sluit de databaseverbinding
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firework Ablaze</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>Welkom bij Firework Ablaze!</h1>
    <p>Ontdek ons uitgebreide assortiment vuurwerkproducten en maak je vieringen spectaculair!</p>
    <h2>Ontdek onze producten:</h2>
    <ul>
        <li><a href="assortiment.php">Bekijk ons assortiment</a></li>
    </ul>
    <h2>Beheer je account:</h2>
    <ul>
        <li><a href="login.php">Inloggen</a></li>
        <li><a href="register.php">Registreren</a></li>
        <!-- Andere links voor accountbeheer kunnen hier worden toegevoegd -->
    </ul>
    <h2>Over ons:</h2>
    <p>Lees meer over Firework Ablaze en ons verhaal.</p>
    <!-- Andere relevante secties of links kunnen hier worden toegevoegd -->
</body>
</html>
