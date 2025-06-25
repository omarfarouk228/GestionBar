<?php

$host = "localhost";
$dbName = "gestion_bar";
$username = "user_gestion_bar";
$password = "DZ.AYQRYh5GcJvHI";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    // Définir le mode d'ereur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}
