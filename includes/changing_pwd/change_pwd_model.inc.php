<?php

declare(strict_types= 1);

function check_email(object $pdo, string $email) {
    $query = "SELECT * FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result; 
}

function change_password(object $pdo, string $password, string $email) { 
    $options = ['cost' => 12];
    $hashedPWD = password_hash($password, PASSWORD_DEFAULT, $options);

    $query = "UPDATE users SET pwd = :pwd WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pwd", $hashedPWD);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}