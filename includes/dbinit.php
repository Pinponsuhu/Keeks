<?php
$servername = "localhost";
$username = "pinponsuhu";
$password = "Pinponsuhu11";
$db_name = "bolajiKeeks";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE  IF NOT EXISTS " . $db_name;
if ($conn->query($sql) === TRUE) {
    $conn = new mysqli($servername, $username, $password, $db_name);
} else {
    echo "Error creating database: " . $conn->error;
}

$tableName = "shoes";
$shoeTable = "CREATE TABLE IF NOT EXISTS $tableName (
        shoeID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        shoeName VARCHAR(30) NOT NULL,
        shoeSize VARCHAR(30) NOT NULL,
        description VARCHAR(250) NOT NULL,
        quantityAvailable INT(6) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        productAddedBy VARCHAR(255) DEFAULT 'Bolaji Owokoniran' NOT NULL
    )";
if ($conn->query($shoeTable) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();