<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once("../dbh.inc.php");
        require_once("login_model.inc.php");
        require_once("login_contr.inc.php");

        //error handling
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        };

        $result = get_user($pdo, $username);

        if (!is_input_empty($username, $pwd) && is_username_invalid($result)) {
            $errors["invalid_username"] = "Invalid login info!";
        };

        if (!is_input_empty($username, $pwd) && !is_username_invalid($result) && is_password_invalid($pwd, $result["pwd"])) {
            $errors["invalid_pwd"] = "Invalid login info!";
        };

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../../index.php");
            die();
        }

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["user_firstname"] = htmlspecialchars($result["firstname"]);
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["last_regeneration"] = time();

        $pdo = null;
        $stmt = null;

        header("Location: ../../userpage.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}
