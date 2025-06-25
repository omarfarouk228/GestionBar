<?php
session_start();
require_once '../config/database.php';
require_once '../functions.php';

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];

// Hachage du mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if (checkEmailInDatabase($pdo, $email)) {
    // L'adresse mail existe déjà
    header('Location: ../register.php?error=1');
} else {
    // Insertion de l'utilisateur dans la base
    $sqlInsertUser = "INSERT INTO users(fullname, email, password) VALUES(?, ?, ?)";
    $stmtInsert = $pdo->prepare($sqlInsertUser);
    $result = $stmtInsert->execute([$fullname, $email, $hashedPassword]);
    if ($result) {
        // Enregistrement effectué
        $user = checkEmailInDatabase($pdo, $email);

        // Sauvegarde de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;

        header('Location: ../dashboard.php');
    } else {
        // Enregistrement échoué
        header('Location: ../register.php?error=2');
    }
}
