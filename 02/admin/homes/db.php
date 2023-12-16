<?php

function getPdo() {
    $dbHost = 'localhost';
    $dbName = 'users';
    $dbUser = 'alli';
    $dbPassword = 'Alli2002!';

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPassword);
        // Set PDO to throw exceptions on errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        // Handle connection errors
        die("Connection failed: " . $e->getMessage());
    }
}

$pdo = getPdo();

?>
