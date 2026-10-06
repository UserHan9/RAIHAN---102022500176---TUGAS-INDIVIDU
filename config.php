<?php

$server   = "localhost";
$user     = "root";
$password = "";
$db_name  = "crud_native";

$db = mysqli_connect($server, $user, $password, $db_name);

if (!$db) {
    echo("NEEEINNNNNNN " . mysqli_connect_error());
}

?>