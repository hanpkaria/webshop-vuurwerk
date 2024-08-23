<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Product Toevoegen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
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
        <h1>Nieuw Product Toevoegen</h1>
        <form action="add_product_process.php" method="post">
            <label for="product_name">Naam:</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="description">Beschrijving:</label>
            <input type="text" id="description" name="description">

            <label for="price">Prijs:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="stock_quantity">Voorraad:</label>
            <input type="number" id="stock_quantity" name="stock_quantity" required>

            <input type="submit" value="Product Toevoegen">
        </form>
    </div>
</body>
</html>
