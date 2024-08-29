<?php

require_once("../config_session.inc.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_id"];
    $new_pwd = $_POST["new_pwd"];

    try {
        require_once("../dbh.inc.php");
        require_once("userpage_model.inc.php");
        require_once("userpage_contr.inc.php");

        $errors = [];
        if(is_input_empty($new_pwd)) {
            $errors["input_empty"] = "Fill in the field!";
        }
        if($errors) {
            $_SESSION["userpage_error"] = $errors;
            header("Location: ../../userpage.php");
            die();
        }

        change_pwd($pdo, $user_id, $new_pwd);

        $stmt = null;
        $pdo = null;

        header("Location: ../../userpage.php?changed_successfully=pwd");
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}