<?php
require "database.php";
$connection = connect();
$id = $_GET['get_id'];
if (!empty($id)) {
    $sql = "DELETE FROM tbl_info WHERE id=$id";
    $query = mysqli_query($connection, $sql);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted!</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-repeat: no-repeat;
            background-color: black;
        }

        img {
            position: fixed;
            left: 47.5rem;
        }

        a,
        body:hover {
            background-image: url('../img/ricardo.gif');
        }

        h1 {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 15rem;
        }
    </style>
</head>

<body>
    <h1>Touch or hover the cat..........</h1>
    <a href="../main.php"><img src="../img/cry.png" alt=""></a>
</body>

</html>