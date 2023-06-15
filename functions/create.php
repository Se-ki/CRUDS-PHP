<?php
session_start();
require "database.php";
function signup($firstname, $lastname, $username, $password)
{
    $connection = connect();
    $sql = "INSERT INTO `login` VALUES(0, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssss', $firstname, $lastname, $username, $password);
    $stmt->execute();
    header('location: /project_it106/login-signup.php');
}
function login($input_username, $input_password)
{
    $connection = connect();
    $sql = "SELECT * FROM `login` WHERE username='$input_username' AND `password`='$input_password'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        header('location: /project_it106/main.php');
    } else {
        header('location: /project_it106/login-signup.php?err=Incorrect email and password');
    }
}
if (isset($_POST['signup'])) {
    signup($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password']);
} else if (isset($_POST['login'])) {
    login($_POST['input-username'], $_POST['input-password']);
} else {
    header('location: /project_it106/login-signup.php');
}
?>