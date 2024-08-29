<?php

declare(strict_types= 1);

function is_input_empty(string $input) {
    if (empty($input)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) { 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
} else {
    return false;
} 
}

function is_email_taken(object $pdo, string $email) {
    if(check_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}