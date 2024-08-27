<?php
    require_once("includes/config_session.inc.php");
    require_once("includes/signup_view.inc.php");
    require_once("includes/login_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div>

        <div>
            <h1>Sign up</h1>
            <div>
                <div>
                    <form action="includes/user_signup.inc.php" method="POST">
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
                        <form action="includes/user_login.inc.php" method="POST">
                            <input type="text" name="username" placeholder="Username...">
                            <input type="password" name="pwd" placeholder="Password...">

                            <button>Log in!</button>
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