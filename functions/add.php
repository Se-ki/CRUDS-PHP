<?php
session_start();
require "database.php";
function signup($firstname, $lastname, $gender, $contactnumber, $email)
{
    $connection = connect();
    $sql = "INSERT INTO tbl_info VALUES(0,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('sssss', $firstname, $lastname, $gender, $contactnumber, $email);
    $stmt->execute();
    header('location: /project_it106/login-signup.php');
}
if (isset($_POST['save'])) {
    signup($_POST['firstname'], $_POST['lastname'], $_POST['gender'], $_POST['contact'], $_POST['email']);
} else {
    header('location: /project_it106/login-signup.php');
}
?>