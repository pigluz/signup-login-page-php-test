<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        unset($_SESSION["login_errors"]);
    } 
}

function login_status() {
    if (isset($_GET["password_changed"]) && $_GET["password_changed"] === "true") {
        echo "<br>";
        echo "<p>Successfully changed the password!";
    }
    if (isset($_GET["logged_off"]) && $_GET["logged_off"] === "true") {
        echo "<br>";
        echo "<p>Logged off successfully.</p>";
    }
    if (isset($_GET["deleted_account"])) {
        echo "<br>";
        echo "<p>Account deleted successfully.</p>";
    }
    if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<p>Signed up successfully!</p>";
    }
}