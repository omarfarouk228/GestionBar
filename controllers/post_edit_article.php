<?php
require_once '../config/database.php';

$title = $_POST["title"];
$price = $_POST["price"];
$description = $_POST["description"];
$article_id = $_POST["article_id"];


$sql = "UPDATE articles SET title = ?, description = ?, price = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$title, $description, $price, $article_id]);

if ($result) {
    // Enregistrement effectué
    header('Location: ../pages/articles/index.php');
} else {
    // Enregistrement non effectué
    header("Location: ../pages/articles/edit.php?id=$article_id&error=1");
}
