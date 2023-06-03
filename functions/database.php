<?php
function connect()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "user";
    $port = 3307;

    $connect = new mysqli($host, $user, $password, $database, $port);
    if (!$connect) {
        die();
    }
    return $connect;
}
?>