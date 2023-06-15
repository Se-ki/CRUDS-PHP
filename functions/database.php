<?php
function connect()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "user";
    $port = 3307; //remove this if there is an error occur
    $connect = new mysqli($host, $user, $password, $database, $port); //also this $port delete this
    if (!$connect) {
        die();
    }
    return $connect;
}
?>