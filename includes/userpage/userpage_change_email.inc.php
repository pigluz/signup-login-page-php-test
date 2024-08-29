<?php

require_once("../config_session.inc.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_id"];
    $new_email = $_POST["new_email"];

    try {
        require_once("../dbh.inc.php");
        require_once("userpage_model.inc.php");
        require_once("userpage_contr.inc.php");

        $errors = [];
        if(is_input_empty($new_email)) {
            $errors["input_empty"] = "Fill in the field!";
        }
        if(!is_input_empty($new_email) && is_email_invalid($new_email)) {
            $errors["invalid_email"] = "Invalid email entered!";
        } 
        if(!is_input_empty($new_email) && !is_email_invalid($new_email) && is_email_taken($pdo, $new_email)) {
            $errors["email_taken"] = "The email you entered is already in use!";
        }
        if($errors) {
            $_SESSION["userpage_error"] = $errors;
            header("Location: ../../userpage.php");
            die();
        }

        change_email($pdo, $user_id, $new_email);

        $_SESSION["user_email"] = $new_email;

        $stmt = null;
        $pdo = null;

        header("Location: ../../userpage.php?changed_successfully=email");
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}