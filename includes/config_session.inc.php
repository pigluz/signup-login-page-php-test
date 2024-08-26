<?php
ini_set("session.use_only_cookies",1);
ini_set("session.use_strict_mode",1);

session_get_cookie_params([
    "httponly" => "true",
    "secure" => "true",
    "lifetime" => 1800,
    "path" => "/",
    "domain" => "localhost"
]);

session_start();

if(!isset($_SESSION["last_regeneration"])) {
    regenerate_id();
} else {
    $interval = 60 * 30;
    if(time() - $_session["last_regeneration" >= $interval]) {
        regenerate_id();
    }
}

function regenerate_id() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}