<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
        $pwd = $_POST["pwd"];

        try {
                require_once("config_session.inc.php");
                require_once("dbh.inc.php");
                require_once("change_pwd_model.inc.php");

                $email = $_SESSION["user_email"];
                unset($_SESSION["user_email"]);
                change_password($pdo, $pwd, $email);
                $stmt = null;
                $pdo = null;
        
                header("Location: ../index.php?password_changed=true");
                die();
        } catch (PDOException $e) {
                die("Query failed: ". $e->getMessage());
        }
} else {
        header("Location: ../index.php");
        die();
}
    

