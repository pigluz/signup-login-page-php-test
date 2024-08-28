<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        unset($_SESSION["login_errors"]);
    } else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br>";
        echo "<p>Logged in successfully as <b>" . $_SESSION["user_username"] . "</b> <i>(" . $_SESSION["user_firstname"] . ")</i>!</p>";
        show_log_off_button();
    } else if (isset($_GET["logged_off"]) && $_GET["logged_off"] === "true") {
        echo "<br>";
        echo "<p>Logged off successfully.</p>";
    }
}

function show_log_off_button()
{
    echo
    '<form action="includes/user_logoff.inc.php" method="POST">
        <button>Log off!</button>
    </form>';
}

function if_changing_pwd_success() {
    if (isset($_GET["password_changed"]) && $_GET["password_changed"] === "true") {
        echo "<br>";
        echo "<p>Successfully changed the password!";
    }
}