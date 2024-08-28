<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    try {
        require_once("../config_session.inc.php");
        require_once("../dbh.inc.php");
        require_once("change_pwd_model.inc.php");
        require_once("change_pwd_contr.inc.php");

        //error handling
        $errors = [];

        if(is_value_null($email)) {
            $errors["null_value"] = "Please fill the field!";
        }
        if(!is_value_null($email) && is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!"; 
        }
        if(!is_value_null($email) && !is_email_invalid($email) && is_email_nonexisting(check_email($pdo, $email))) { 
            $errors["nonexisting_email"] = "Email doesn't exist in the database!";
        }

        require_once("../config_session.inc.php");

        if($errors) {
            $_SESSION["change_pwd_errors"] = $errors;
            header("Location: ../../forgot_password.php");
            die(); 
        }
        $_SESSION["user_email"] = $email;
        header("Location: ../../forgot_password.php?checkemail");
    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}
