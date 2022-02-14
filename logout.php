<?php
session_start();
session_unset();
if (session_destroy()) {
    if (isset($_COOKIE["email"])) {
        setcookie("email", "");
    }
    if (isset($_COOKIE["password"])) {
        setcookie("password", "");
    }
    header("location:signin.php");
}
