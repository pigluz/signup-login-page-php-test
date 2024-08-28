<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_code = $_POST["code_input"];
    $code = $_SESSION["change_pwd_code"];

    if($code != $user_code) {
        header("Location: ../forgot_password.php?correctPin=true");
    } else {
        header("Location: ../forgot_password.php?correctPin=false");
    }
    unset($_SESSION["change_pwd_code"]);
    die();
} else {
    header("Location: ../index.php");
    die();
}
