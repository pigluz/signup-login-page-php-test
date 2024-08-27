<?php 

declare(strict_types=1);


function show_inputs_fields() {
    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["signup_errors"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username..." value="' . $_SESSION["signup_data"]["username"] . '" >';
    } else {
        echo '<input type="text" name="username" placeholder="Username...">';
    } 
    
    echo '<input type="password" name="pwd" placeholder="Password...">';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_errors"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="Email..." value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="Email...">';
    }

    if(isset($_SESSION["signup_data"]["firstname"])) {
        echo '<input type="text" name="firstName" placeholder="First name..." value="' . $_SESSION["signup_data"]["firstname"] . '">';
    } else {
        echo '<input type="text" name="firstName" placeholder="First name...">';
    }
}


function check_signup_errors() {
    if(isset($_SESSION["signup_errors"])) {
        $errors = $_SESSION["signup_errors"];

        echo "<br>";
        foreach($errors as $error) {
            echo "<p>" . $error ."</p>";
        }

        unset($_SESSION["signup_errors"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo "<p>Signed up successfully!</p>";
    }
}