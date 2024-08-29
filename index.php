<?php
require_once("includes/config_session.inc.php");
require_once("includes/signup/signup_view.inc.php");
require_once("includes/login/login_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div>
        <?php
        login_status();
        ?>
    </div>

    <div>
        <div>
            <h1>Sign up</h1>

            <form action="includes/signup/user_signup.inc.php" method="POST">
                <?php
                show_inputs_fields();
                ?>

                <button>Sign up!</button>
            </form>

            <?php
            check_signup_errors();
            ?>
        </div>
        <div>
            <h1>Log in</h1>

            <form action="includes/login/user_login.inc.php" method="POST">
                <input type="text" name="username" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <a href="forgot_password.php">Forgot password?</a>
                
                <button>Log in!</button>

            </form>

            <?php
            check_login_errors();
            ?>
        </div>
    </div>
</body>

</html>