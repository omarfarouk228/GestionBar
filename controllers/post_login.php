<?php
session_start();
require_once '../config/database.php';
require_once '../functions.php';

$email = $_POST["email"];
$password = $_POST["password"];

$user = checkEmailInDatabase($pdo, $email);


// Vérifier si l'utilisateur existe
if ($user) {
    // Vérifier si le mot de passe correspond
    if (password_verify($password, $user["password"])) {
        // Le mot de passe est correct
        $_SESSION['user_id'] = $user["id"];
        $_SESSION['fullname'] =  $user["fullname"];
        $_SESSION['email'] =  $user["email"];
        header('Location: ../dashboard.php');
    } else {
        // Le mot de passe est incorrect
        header('Location: ../index.php?error=2');
    }
} else {
    header('Location: ../index.php?error=1');
}
