<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli("localhost", "root", "", "webshop");


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Geconnecteerd";
