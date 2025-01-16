<?php
$host = 'localhost';
$dbname = 'headline_generator';
$username = 'root';  // Change to your MySQL username
$password = '';      // Change to your MySQL password

try {
    // Create a PDO instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
