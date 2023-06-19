<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "respaldo";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>
