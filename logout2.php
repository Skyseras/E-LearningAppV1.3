<?php
session_start();
session_unset();
if (session_destroy()) {
    header("location:signin.php?close=You were inactive for too long! Try Sign In again.");
}
