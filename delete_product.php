<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assortiment Vuurwerk</title>
    <style>
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
        .delete-product-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .back-to-assortment-button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
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

        // Controleren of er een product-ID is ontvangen via POST
        if(isset($_POST['product_id'])) {
            // Product-ID ophalen uit de POST-gegevens
            $product_id = $_POST['product_id'];

            // SQL-query om het product te verwijderen
            $sql = "DELETE FROM product WHERE id = $product_id";

            // Het product verwijderen
            if ($conn->query($sql) === TRUE) {
                echo "Product succesvol verwijderd";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Geen product-ID ontvangen";
        }

        // Sluit de databaseverbinding
        $conn->close();
        ?>

        <a href="assortiment.php" class="back-to-assortment-button">Terug naar assortiment</a>
    </div>
</body>
</html>
