<?php 
    require_once("includes/config_session.inc.php");
    require_once("includes/signup_view.inc.php");
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
    <h1>Sign up</h1>

    <div>
    <form action="user_signup.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="firstName" placeholder="First name...">

        <button>Sign up!</button>
    </form>

    </div>
</div>
    

</body>
</html>