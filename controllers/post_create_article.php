<?php
session_start();
require_once '../config/database.php';


$title = $_POST["title"];
$price = $_POST["price"];
$description = $_POST["description"];
$user_id = $_SESSION['user_id'];
$path = NULL;

// Vérifier si l'image a été uploadé sans erreur
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    try {
        $uploads = '../uploads/'; // Dossier où les images seront stockées

        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $uploadFile = $uploads . $fileName;

        // Déplacer le fichier vers notre dossier
        $move = move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

        if ($move) {
            $path = $uploadFile;
        }
    } catch (Exception $e) {
        echo $e;
    }
}


// Insertion dans la base de données
$sqlInsertArticle = "INSERT INTO articles(title, description, price, image_path, user_id) VALUES(?,?,?,?,?)";
$stmt = $pdo->prepare($sqlInsertArticle);
$result = $stmt->execute([$title, $description, $price, $path, $user_id]);

if ($result) {
    // Enregistrement effectué
    header('Location: ../pages/articles/create.php?success=1');
} else {
    // Enregistrement non effectué
    header('Location: ../pages/articles/create.php?success=0');
}
