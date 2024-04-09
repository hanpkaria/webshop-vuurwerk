<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

// Establishing a connection using object-oriented style
$conn = new mysqli("localhost", "root", "", "webshop");


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected succesfully";