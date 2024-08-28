<?php 
    require_once("includes/config_session.inc.php");
    require_once("includes/change_pwd_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovering password</title>
</head>
<body>
    <div>
            <?php 
               display_inputs();
            ?> 
            <?php
                display_errors();
            ?>
    </div>
</body>
</html>