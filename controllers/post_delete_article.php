<?php

require_once '../config/database.php';

$article_id = $_GET['id'];

$sql = "DELETE FROM articles WHERE id = ?";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$article_id]);

if ($result) {
    header('Location: ../pages/articles/index.php');
}
