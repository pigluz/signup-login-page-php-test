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

        <div>
            <?php 
            if_changing_pwd_success();
            ?>
            <h1>Sign up</h1>
            <div>
                <div>
                    <form action="includes/signup/user_signup.inc.php" method="POST">
                        <?php
                        show_inputs_fields();
                        ?>

                        <button>Sign up!</button>
                    </form>

                    <div>
                        <?php
                        check_signup_errors();
                        ?>
                    </div>
                </div>
            </div>
            
            <div>
                <h1>Log in</h1>
                <div>
                    <div>
                        <form action="includes/login/user_login.inc.php" method="POST">
                            <input type="text" name="username" placeholder="Username...">
                            <input type="password" name="pwd" placeholder="Password...">

                            <button>Log in!</button>
                            <a href="forgot_password.php">Forgot password?</a>
                        </form>

                        <div>
                            <?php
                            check_login_errors();
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</body>

</html>