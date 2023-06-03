<?php
session_start();
if (session_destroy()) {
    session_unset();
    header('location: /project_it106/login-signup.php');
}
?>