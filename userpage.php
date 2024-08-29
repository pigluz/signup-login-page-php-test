<?php 
    require_once("includes/config_session.inc.php");
    require_once("includes/userpage/userpage_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link rel="stylesheet" href="css/userpage.css">
</head>
<body>
    <div id="container">
    <center>
    <?php 
        status_info();
    ?>
        <br>
    <?php
        display_user_info(); 
    ?>
    </center>
    <div id="form_container">
    <h3>Choose your action:</h3>
    <form action="includes/userpage/userpage_change_username.inc.php" method="POST">
        <input type="text" name="new_username" placeholder="New username...">
        <button>Change username</button>
    </form>

    <form action="includes/userpage/userpage_change_pwd.inc.php" method="POST">
        <input type="password" name="new_pwd" placeholder="New password...">
        <button>Change password</button>
    </form>

    <form action="includes/userpage/userpage_change_email.inc.php" method="POST">
        <input type="text" name="new_email" placeholder="New email...">
        <button>Change email</button>
    </form>

    <form action="includes/userpage/userpage_change_firstname.inc.php" method="POST">
        <input type="text" name="new_firstname" placeholder="New first name...">
        <button>Change first name</button>
    </form>

    <center>
    <form action="includes/userpage/userpage_delete_account.inc.php" method="POST">
        <button id="delete_button">Delete your account</button>
    </form>
    <?php
        show_log_off_button(); 
    ?>
    </center>
    </div>
</body>
</html>