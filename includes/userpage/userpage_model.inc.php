<?php

declare(strict_types= 1);

function change_username(object $pdo, string $user_id, string $new_username) {
    $query = "UPDATE users SET username = :new_username WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":new_username", $new_username);
    $stmt->bindValue(":user_id", $user_id);
    $stmt->execute();
};

function change_pwd(object $pdo, string $user_id, string $new_pwd) {
    $options = ['cost' => 12];
    $new_hashedPwd = password_hash($new_pwd, PASSWORD_DEFAULT, $options);

    $query = "UPDATE users SET pwd = :new_pwd WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":new_pwd", $new_hashedPwd);
    $stmt->bindValue(":user_id", $user_id);
    $stmt->execute();
};

function change_email(object $pdo, string $user_id, string $new_email) {
    $query = "UPDATE users SET email = :new_email WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":new_email", $new_email);
    $stmt->bindValue(":user_id", $user_id);
    $stmt->execute();
};

function change_firstname(object $pdo, string $user_id, string $new_firstname) {
    $query = "UPDATE users SET firstname = :new_firstname WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":new_firstname", $new_firstname);
    $stmt->bindValue(":user_id", $user_id);
    $stmt->execute();
};

function delete_account(object $pdo, string $user_id) {
    $query = "DELETE FROM users WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":user_id", $user_id);
    $stmt->execute();
}

function check_email(object $pdo, string $email) { 
    $query = "SELECT * FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}