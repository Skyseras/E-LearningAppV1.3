<?php
session_start();
if (isset($_SESSION['email'])) {
    if ((time() - $_SESSION['last_login_timestamp']) > 300) {
        header("location:logout2.php");
    }
} else {
    header("location:signin.php");
}
