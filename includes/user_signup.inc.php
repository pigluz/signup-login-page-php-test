<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $firstname = $_POST["firstName"];

    try {
        require_once("dbh.inc.php");
        require_once("signup_model.inc.php");
        require_once("signup_contr.inc.php");

        //error handlers
        $errors = [];

        if (is_input_empty($username, $pwd, $email, $firstname)) {
            $errors["empty_input"] = "Fill in all fields!";
        };

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        };

        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        };

        if (is_email_taken($pdo, $email)) {
            $errors["email_taken"] = "Email already registered!";
        };

        require_once("config_session.inc.php");

        if ($errors) {
            $_SESSION["signup_errors"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email,
                "firstName" => $firstname,
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $username, $pwd, $email, $firstname);

        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
