<?php
require "database.php";
$connection = connect();
$id = $_GET['get_id'];
if (!empty($id)) {
    $sql = "DELETE FROM tbl_info WHERE id=$id";
    $query = mysqli_query($connection, $sql);
    header('location: /project_it106/main.php?delete=true');
} else {
    header('location: /project_it106/login-signup.php');
}
?>