<?php
require "database.php";
if (isset($_POST['update'])) {
    $connection = connect();
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contact = $_POST['contactnumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "UPDATE tbl_info SET firstname='$firstname', lastname='$lastname', gender='$gender', contact='$contact', email='$email' WHERE id=$id";
    mysqli_query($connection, $sql);
    header('location: /project_it106/main.php?success=true');
} else {
    header('location: /project_it106/main.php');
}
?>