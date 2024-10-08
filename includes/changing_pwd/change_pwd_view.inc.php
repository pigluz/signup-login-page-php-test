<?php

declare(strict_types= 1);

function display_errors() {
    if(isset($_SESSION["change_pwd_errors"])) {
        $errors = $_SESSION["change_pwd_errors"];
        echo "<br>";
        foreach($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        unset($_SESSION["change_pwd_errors"]);
    }
}

function display_inputs() {
    if (!isset($_GET['checkemail']) && !isset($_GET['correctPin'])) {
        echo '<form action="includes/changing_pwd/user_change_password.inc.php" method="POST">';
        echo '<label for="email">Please enter your email:</label>';
        echo '<input type="text" name="email" placeholder="Email...">';
        echo '<button>Submit</button>';
        echo '</form>';
    }
    else if(isset($_GET['checkemail'])) {
        show_generated_code();
        echo '<form action="includes/changing_pwd/check_code.inc.php" method="POST">';
        echo "<p>Enter the code we've sent to your email (check console.log)</p>";
        echo '<input type="text" name="code_input" placeholder="Code...">';
        echo '<button>Submit</button>';
        echo '</form>';
    } else if(isset($_GET["correctPin"]) && $_GET["correctPin"] === "false") {
        show_generated_code();
        echo '<form action="includes/changing_pwd/check_code.inc.php" method="POST">';
        echo "<p>Enter the code we've sent to your email (check console.log)</p>";
        echo '<input type="text" name="code_input" placeholder="Code...">';
        echo '<button>Submit</button>';
        echo '<p>You inserted a wrong code! Try again';
        echo '</form>'; 
    }
    else if(isset($_SESSION["change_pwd_error"]) && isset($_GET["correctPin"]) && $_GET["correctPin"] === "true") {
        $error = $_SESSION["change_pwd_error"];
        unset($_SESSION["change_pwd_error"]);
        foreach($error as $err) {
            echo '<p>' . $err .'</p>';
        }
        echo '<form action="includes/changing_pwd/change_password.inc.php" method="POST">';
        echo '<label for="pwd">Please enter your new password</label>';
        echo '<input type="password" name="pwd" placeholder="New password...">';
        echo '<button>Change password</button>';
        echo '</form>';
    }
    else if (isset($_GET["correctPin"]) && $_GET["correctPin"] === "true") { 
        echo '<form action="includes/changing_pwd/change_password.inc.php" method="POST">';
        echo '<label for="pwd">Please enter your new password</label>';
        echo '<input type="password" name="pwd" placeholder="New password...">';
        echo '<button>Change password</button>';
        echo '</form>';
    } 
} 

function show_generated_code() {
    $code = rand(100000, 999999);
    echo '<script>console.log(' . $code . ')</script>';
    $_SESSION["change_pwd_code"] = $code;
}

// mea culpa, mea culpa, mea maxima culpa.