<?php
session_start();
require_once '../config/database.php';


$title = $_POST["title"];
$price = $_POST["price"];
$description = $_POST["description"];

$user_id = $_SESSION['user_id'];


// Insertion dans la base de données
$sqlInsertArticle = "INSERT INTO articles(title, description, price, user_id) VALUES(?,?,?,?)";
$stmt = $pdo->prepare($sqlInsertArticle);
$result = $stmt->execute([$title, $description, $price, $user_id]);

if ($result) {
    // Enregistrement effectué
    header('Location: ../pages/articles/create.php?success=1');
} else {
    // Enregistrement non effectué
    header('Location: ../pages/articles/create.php?success=0');
}
