<?php

require_once("../config_session.inc.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_id"];
    $new_firstname = $_POST["new_firstname"];

    try {
        require_once("../dbh.inc.php");
        require_once("userpage_model.inc.php");
        require_once("userpage_contr.inc.php");

        $errors = [];
        if(is_input_empty($new_firstname)) {
            $errors["input_empty"] = "Fill in the field!";
        }
        if($errors) {
            $_SESSION["userpage_error"] = $errors;
            header("Location: ../../userpage.php");
            die();
        }

        change_firstname($pdo, $user_id, $new_firstname);

        $_SESSION["user_firstname"] = $new_firstname;

        $stmt = null;
        $pdo = null;

        header("Location: ../../userpage.php?changed_successfully=firstname");
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}