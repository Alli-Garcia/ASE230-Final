<?php
$dbHost = 'localhost';
$dbName = 'users';
$dbUser = 'alli';
$dbPassword = 'Alli2002!';

$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
