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
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div id="login_status">
        <?php
        login_status();
        ?>
    </div>

    <div id="container">
        <div id="sign_up_div"  class="form_container">
            <h1>Sign up</h1>

            <form action="includes/signup/user_signup.inc.php" method="POST">
                <?php
                show_inputs_fields();
                ?>
        <br>
                <button>Sign up!</button>
            </form>

            <center>
            <?php
            check_signup_errors();
            ?>
            </center>

        </div>
        <div id="log_in_div" class="form_container">
            <h1>Log in</h1>

            <form action="includes/login/user_login.inc.php" method="POST">
                <input type="text" name="username" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <center><a href="forgot_password.php">Forgot password?</a></center>
                <br>
                <button>Log in!</button>

            </form>
            <center>
            <?php
            check_login_errors();
            ?>
            </center>

        </div>
    </div>
</body>

</html>