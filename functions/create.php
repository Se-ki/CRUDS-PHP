<?php
session_start();
require "database.php";
function signup($firstname, $lastname, $gender, $contactnumber, $email, $password)
{
    $connection = connect();
    $sql = "INSERT INTO tbl_info VALUES(0,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssssss', $firstname, $lastname, $gender, $contactnumber, $email, $password);
    $stmt->execute();
    header('location: /project_it106/login-signup.php');
}
function login($input_email, $input_password)
{
    $connection = connect();
    $sql = "SELECT * FROM tbl_info WHERE email='$input_email' AND password='$input_password'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query)) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['firstname'] = $row['firstname'];
        header('location: /project_it106/main.php');
    } else {
        header('location: /project_it106/login-signup.php?err=Incorrect email and password');
    }
}
if (isset($_POST['signup'])) {
    signup($_POST['fname'], $_POST['lname'], $_POST['gender'], $_POST['contactnumber'], $_POST['email'], $_POST['password']);
} else if (isset($_POST['login'])) {
    login($_POST['input-email'], $_POST['input-password']);
} else {
    header('location: /project_it106/login-signup.php');
}
?>