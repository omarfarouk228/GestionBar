<?php

function checkEmailInDatabase($pdo, $email)
{
    // Requête préparée pour vérifier si l'adresse mail existe
    $sqlCheckEmail = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sqlCheckEmail);
    $stmt->execute([$email]);

    return $stmt->fetch();
}
