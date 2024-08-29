<?php

require_once("../config_session.inc.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_id"];

    try {
        require_once("../dbh.inc.php");
        require_once("userpage_model.inc.php");
        require_once("userpage_contr.inc.php");

        delete_account($pdo, $user_id);

        session_start();
        session_unset();
        session_destroy();
    
        header("Location: ../../index.php?deleted_account");
        die();
    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
} else {    
    header("Location: ../../index.php");
    die();
}