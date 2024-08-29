<?php 
    require_once("includes/config_session.inc.php");
    require_once("includes/changing_pwd/change_pwd_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovering password</title>
    <link rel="stylesheet" href="css/recover.css">
</head>
<body>
    <div id="container">
    <center><h1>Changing your password</h1>
        <div id="real_container">
            <?php 
               display_inputs();
            ?> 
            <br>
            <?php
                display_errors();
            ?>
        </div>
    </div>
    </center>
</body>
</html>