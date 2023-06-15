<?php
session_start();
if ($_SESSION['username'] && $_SESSION['password']) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header('location: /project_it106/login-signup.php');
}
?>