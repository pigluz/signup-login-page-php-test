<?php

declare(strict_types= 1);

function is_value_null(string $email) {
    if(empty($email)) {
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

function is_email_nonexisting(array|bool $result) {
    if(!$result) {
        return true;
    } else {
        return false;
    }

}

function is_pwd_empty(string $pwd) {
    if(empty($pwd)) {
        return true;
    } else {
        return false;
    }
}