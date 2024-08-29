<?php

declare(strict_types= 1);

function show_log_off_button()
{
    echo
    '<form action="includes/userpage/user_logoff.inc.php" method="POST">
        <button>Log off!</button>
    </form>';
}

function display_user_info() {
    echo '<h1>You are logged as ' . $_SESSION["user_username"] . '!</h1>';
    echo '<p>Your email: ' . $_SESSION["user_email"] . '</p>';
    echo '<p>Your first name: ' . $_SESSION["user_firstname"] . '</p>';
}

function status_info() {
    if(isset($_SESSION["userpage_error"])) { 
        $errors = $_SESSION["userpage_error"];
        unset($_SESSION["userpage_error"]);
        foreach($errors as $error) {
         echo "<p>" . $error . "</p>";
    }

    if(isset($_GET["changed_successfully"]) && $_GET["changed_successfully"] === "username") {
        echo "<p>Successfully changed the username!</p>";
    }
    else if(isset($_GET["changed_successfully"]) && $_GET["changed_successfully"] === "email") {
        echo "<p>Successfully changed the email!</p>";
    }
    else if(isset($_GET["changed_successfully"]) && $_GET["changed_successfully"] === "pwd") {
        echo "<p>Successfully changed the password!</p>";
    }
    else if(isset($_GET["changed_successfully"]) && $_GET["changed_successfully"] === "firstname") {
        echo "<p>Successfully changed the first name!</p>";
    }
}

}