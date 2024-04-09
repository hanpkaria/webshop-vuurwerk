<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assortiment Vuurwerk</title>
    <style>
        /* Voeg hier eventuele CSS-stijlen toe */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .product {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .product:last-child {
            border-bottom: none;
        }
        .product img {
            max-width: 100px;
            vertical-align: middle;
        }
        .product-info {
            display: inline-block;
            vertical-align: middle;
            margin-left: 20px;
        }
        .product-name {
            font-weight: bold;
        }
        .product-price {
            color: #007bff;
        }
        .add-product-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Assortiment Vuurwerk</h1>
        <button class="add-product-button" onclick="window.location.href='add_product.php'">Voeg nieuw product toe</button>
        
        <?php
        // Verbinding maken met de database
        $conn = new mysqli("localhost", "root", "", "webshop");

        // Controleren op databasefouten
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL-query om alle producten op te halen
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        // Controleren of er resultaten zijn
        if ($result->num_rows > 0) {
            // Producten weergeven
            while($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<img src="afbeelding.jpg" alt="' . $row["product_name"] . '">';
                echo '<div class="product-info">';
                echo '<div class="product-name">' . $row["product_name"] . '</div>';
                echo '<div class="product-price">€' . $row["price"] . '</div>';
                echo '<div class="product-description">' . $row["description"] . '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Geen producten gevonden";
        }

        // Sluit de databaseverbinding
        $conn->close();
        ?>
    </div>
</body>
</html>